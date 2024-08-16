<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateUser extends Component
{
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|string|min:8')]
    public $password;
    #[Validate('required|string|min:8|same:password')]
    public $password_confirmation;
    #[Validate('required|string')]
    public $role;
    #[Validate('required|string|unique:users,cpf')]
    public $cpf;

    protected $messages = [
        '*.required' => 'Esse campo é obrigatório.',
        'email.email' => 'Informe um email válido.',
        'email.unique' => 'Esse email já está em uso.',
        'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
        'password.same' => 'As senhas não conferem.',
        'role.string' => 'O valor informado não é válido.',
        'cpf.unique' => 'Esse CPF já está em uso.'
    ];

    public function storeUser()
    {
        $this->validate();

        try {
            $user = User::Create([
                'uuid' => Str::uuid(),
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
                'cpf' => $this->cpf
            ]);

            if ($user) {

                session()->flash('user-created', true);

                return redirect()->to('/users');
            }

            $this->dispatch('notify', [
                'type' => 'error',
                'content' => 'Ocorreu um erro ao criar esse usuário.'
            ]);

        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'content' => 'Ocorreu um erro ao criar esse usuário.'
            ]);
        }
    }

    public function render(): View
    {
        return view('livewire.users.create-user');
    }
}
