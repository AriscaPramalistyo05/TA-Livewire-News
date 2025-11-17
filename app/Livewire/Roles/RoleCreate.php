<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleCreate extends Component
{
    public $name;
    public $permission = [];
    public $allPermissions = [];

    public function mount()
    {
        $this->allPermissions = Permission::all();
    }
    public function render()
    {
        return view('livewire.roles.role-create');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create([
            'name' => $this->name,
        ]);
        $role->syncPermissions($this->permission);

        session()->flash('success', 'Admin created successfully!');
        return $this->redirect(route('roles.index'));
    }
}
