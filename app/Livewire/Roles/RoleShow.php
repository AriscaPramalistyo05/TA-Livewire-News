<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleShow extends Component
{
    public $role;

    public function mount($id)
    {
        $this->role = Role::with('permissions')->find($id);
    }

    public function render()
    {
        return view('livewire.roles.role-show');
    }
}
