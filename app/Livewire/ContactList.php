<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ContactList extends Component
{
    use WithPagination;

    protected $listeners = ['contactAdded' => '$refresh']; // triggers a re-render automatically

    public $contactId;
    public $name;
    public $phone;
    public $email;
    public $showEditModal = false;

    public function editContact($contactId)
    {
        $this->contactId = $contactId;

        $contact = Contact::find($contactId);

        if ($contact && $contact->user_id === Auth::id()) {
            $this->resetValidation();
            $this->name = $contact->name;
            $this->phone = $contact->phone;
            $this->email = $contact->email;
            $this->showEditModal = true;
        } else {
            session()->flash('error', 'Contact not found or access denied.');
        }
    }

    public function closeModal()
    {
        $this->showEditModal = false;
        $this->reset(['name', 'phone', 'email']);
    }

    public function updateContact()
    {
        $contact = Contact::find($this->contactId);

        if ($contact && $contact->user_id === Auth::id()) {
            $this->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
            ]);

            $contact->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);

            $this->closeModal();
            session()->flash('success', 'Contact updated successfully.');
            $this->resetPage(); // optional: reset pagination to first page
        } else {
            session()->flash('error', 'Contact not found or access denied.');
        }
    }

    public function deleteContact($contactId)
    {
        $contact = Contact::find($contactId);

        if ($contact && $contact->user_id === Auth::id()) {
            $contact->delete();
            session()->flash('success', 'Contact deleted successfully.');
            $this->resetPage();
        } else {
            session()->flash('error', 'Contact not found or access denied.');
        }
    }

    public function render()
    {
        $contacts = Contact::where('user_id', Auth::id())
            ->latest()
            ->paginate(5);

        return view('livewire.contact-list', compact('contacts'));
    }
}
