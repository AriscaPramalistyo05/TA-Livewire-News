<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleEdit extends Component
{
    public $name, $role;
    public $permission = [];
    public $allPermissions = [];

    public function mount($id)
    {
        $this->role = Role::find($id);
        $this->allPermissions = Permission::all();
        $this->name = $this->role->name;
        $this->permission = $this->role->permissions->pluck('name');
    }
    public function render()
    {
        return view('livewire.roles.role-edit');
    }
    public function save()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,' . $this->role->id,
            'permission' => 'required',
        ]);


        $this->role->name = $this->name;
        $this->role->save();
        $this->role->syncPermissions($this->permission);

        session()->flash('success', ' Successfully Update Role');
        return $this->redirect(route('roles.index'));
    }
}
