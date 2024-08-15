<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UpdateUserPassword extends Component
{
    #[Validate('required|string|min:8')]
    public $password;
    #[Validate('required|string|min:8|same:password')]
    public $password_confirmation;
    public $uuid;

    public function updatePassword()
    {
        $this->validate();

        try {
            $user = User::where('uuid', $this->uuid)->first();

            $user->update([
                'password' => Hash::make($this->password)
            ]);

            session()->flash('password-updated', true);

            return redirect()->to('/users');
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'content' => 'Ocorreu um erro ao atualizar esse usuário.'
            ]);
        }
    }

    public function mount()
    {
        //get uuid from url
        $this->uuid = request()->route('uuid');
    }

    public function render()
    {
        return view('livewire.users.update-user-password');
    }
}
