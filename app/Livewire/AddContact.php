<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddContact extends Component
{
    public $name;
    public $phone;
    public $email;

    protected $rules = [
        'name' => 'required|string|min:3',
        'phone' => 'required|string|min:10',
        'email' => 'required|email|unique:contacts,email',
    ];

    public function save()
    {
        $this->validate();

        Contact::create([
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
        ]);

        $this->reset(['name', 'phone', 'email']);

        //  Emit event to refresh contact list
        $this->dispatch('contactAdded');

        session()->flash('success', 'Contact added successfully!');
    }



    public function render()
    {
        return view('livewire.add-contact');
    }
}
