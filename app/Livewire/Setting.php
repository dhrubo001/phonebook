<?php

namespace App\Livewire;

use Hash;
use App\Models\User;
use Livewire\Component;

class Setting extends Component
{

    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

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
                session()->flash('profile_error', 'The email address is already registered.');
                return;
            }

            $user = auth()->user();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->save();

            $this->dispatch('profileUpdated');

            session()->flash('profile_success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            session()->flash('profile_error', 'An error occurred while updating the profile.');
            return;
        }
    }



    public function resetPassword()
    {
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = auth()->user();
            $user->password = Hash::make($this->new_password);
            $user->save();

            // Clear inputs
            $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

            // Logout and redirect
            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();

            return redirect()->route('login')->with('success', 'Password updated successfully. Please log in again.');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while updating the password.');
            return;
        }
    }



    public function render()
    {
        return view('livewire.setting');
    }
}
