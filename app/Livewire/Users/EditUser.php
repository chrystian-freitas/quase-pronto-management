<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditUser extends Component
{
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|string')]
    public $role;
    #[Validate('required|string')]
    public $cpf;
    public $status;
    public $uuid;

    public function mount()
    {
        //get uuid from url
        $this->uuid = request()->route('uuid');

        //get user by uuid
        $user= User::where('uuid', $this->uuid)->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->cpf = $user->cpf;
        $this->status = $user->status;
    }

    public function updateUserInfo()
    {
        $this->validate();

        try {

            $user = User::where('uuid', $this->uuid)->first();

            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
                'cpf' => $this->cpf,
                'status' => $this->status
            ]);

            session()->flash('user-updated', true);

            return redirect()->to('/users');
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'content' => 'Ocorreu um erro ao atualizar esse usuário.'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
