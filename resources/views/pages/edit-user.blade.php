<x-app-layout>
    <div class="py-12 mx-auto sm:px-6 lg:px-8 space-y-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        @livewire('users.edit-user')
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        @livewire('users.update-user-password')
    </div>
</x-app-layout>
