<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $confirm_password = '';
    public $allRoles = [];
    public $roles = [];

    public function mount()
    {
        $this->allRoles = Role::all();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'roles' => 'required',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->roles);

        session()->flash('success', 'Admin created successfully!');
        return $this->redirect(route('users.index'));
    }

    public function render()
    {
        return view('livewire.users.user-create');
    }
}
