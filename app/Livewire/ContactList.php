<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ContactList extends Component
{
    protected $listeners = ['contactAdded' => 'refreshContacts'];
    public $contactId;
    public $name;
    public $phone;
    public $email;
    public $showEditModal = false;
    public $contacts;

    public function refreshContacts()
    {
        $this->contacts = Contact::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
    }

    public function mount($contacts = null)
    {

        $this->contacts = $contacts ?? collect();
    }

    public function editContact($contactId)
    {

        $this->contactId = $contactId;

        $contact = Contact::find($this->contactId);

        if ($contact && $contact->user_id === Auth::user()->id) {

            // Reset validation errors
            $this->resetValidation();

            $this->name = $contact->name;

            $this->phone = $contact->phone;

            $this->email = $contact->email;

            $this->showEditModal = true;
        } else {
            // Contact not found or access denied
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

        if ($contact && $contact->user_id === Auth::user()->id) {

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

            // Close the modal
            $this->closeModal();

            // Refresh the contacts list
            $this->refreshContacts();

            session()->flash('success', 'Contact updated successfully.');
        } else {

            session()->flash('error', 'Contact not found or access denied.');
        }
    }

    public function deleteContact($contactId)
    {
        $contact = Contact::find($contactId);

        if ($contact && $contact->user_id === Auth::user()->id) {

            $contact->delete();

            // Refresh the contacts list
            $this->refreshContacts();

            session()->flash('success', 'Contact deleted successfully.');
        } else {

            session()->flash('error', 'Contact not found or access denied.');
        }
    }

    public function render()
    {

        return view('livewire.contact-list');
    }
}
