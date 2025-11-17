<?php

namespace App\Livewire\Users;

use Livewire\Component;

class UserShow extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = \App\Models\User::find($id);
    }
    
    public function render()
    {
        return view('livewire.users.user-show');
    }
}
