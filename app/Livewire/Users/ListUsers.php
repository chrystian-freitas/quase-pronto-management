<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;
    public $search = '';
    public function addUser()
    {
        return redirect()->to('/users/create');
    }

    public function mount(){

        if (session()->pull('user-created')) {
            $this->dispatch('notify', [
                'type' => 'success',
                'content' => 'Usuário criado com sucesso.'
            ]);
        }

        if (session()->pull('user-updated') || session()->pull('password-updated')) {
            $this->dispatch('notify', [
                'type' => 'success',
                'content' => 'Usuário atualizado com sucesso.'
            ]);
        }
    }

    public function updating()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.users.list-users', [
            'users' => User::query()->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('role', 'like', '%'.$this->search.'%')
                ->orWhere('cpf', 'like', '%'.$this->search.'%')
                ->paginate()
        ]);
    }
}
