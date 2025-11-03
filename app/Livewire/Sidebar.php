<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = ['profileUpdated' => 'refreshUserName'];

    public $userName;

    public function mount()
    {
        $this->userName = auth()->user()->name;
    }

    public function refreshUserName()
    {
        $this->userName = auth()->user()->name;
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
