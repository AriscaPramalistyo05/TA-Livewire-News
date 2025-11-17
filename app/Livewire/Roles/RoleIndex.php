<?php

namespace App\Livewire\Roles;

use Spatie\Permission\Models\Role;
use Livewire\Component;



class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::with("permissions")->get();
        return view('livewire.roles.role-index', compact('roles'));
    }
    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        session()->flash('success', 'Role deleted successfully!');
    }
}
