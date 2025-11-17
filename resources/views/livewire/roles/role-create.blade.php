<div>
    <div>
        <flux:heading size="xl" level="1">{{ __('Create Role') }}</flux:heading>
        <flux:subheading>{{ __('Form to create new role') }}</flux:subheading>
        <flux:separator variant="subtle" class="mb-6 mt-1" />
    </div>

    <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
        Back
    </a>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mt-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <flux:input wire:model="name" label="Name" placeholder="Enter full name" required />

                <flux:checkbox.group wire:model="permission" label="Permission">
                    @foreach ($allPermissions as $permission)
                        <flux:checkbox label="{{ $permission->name }}" value="{{ $permission->name }}" checked />
                    @endforeach

                </flux:checkbox.group>

                <div class="flex gap-3">
                    <flux:button type="submit" variant="primary">Create Role</flux:button>
                    {{-- <flux:button type="button" variant="ghost"
                        wire:click="$parent.redirect('{{ route('admins.index') }}')">Cancel</flux:button> --}}
                </div>
            </div>
        </form>
    </div>
</div>
