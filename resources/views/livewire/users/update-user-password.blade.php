<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Atualizar senha') }}
        </h2>

    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6" wire:confirm="Você realmente deseja atualizar a senha desse usuário?">
        <div>
            <x-input-label for="update_password_password" :value="__('Nova Senha')" />
            <x-text-input id="update_password_password" wire:model="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Senha')" />
            <x-text-input id="update_password_password_confirmation" wire:model="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-end justify-end gap-4">
            <x-primary-button type="submit">{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
    <div wire:loading>@include('components.loading')</div>
</section>
