<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Setting extends Component
{

    public $name;
    public $email;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        try {
            $existingUser = User::where('email', $this->email)
                ->where('id', '!=', auth()->user()->id)
                ->first();

            if ($existingUser) {
                session()->flash('error', 'The email address is already registered.');
                return;
            }

            $user = auth()->user();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->save();

            $this->dispatch('profileUpdated');

            session()->flash('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the profile.');
            return;
        }
    }
    public function render()
    {
        return view('livewire.setting');
    }
}
