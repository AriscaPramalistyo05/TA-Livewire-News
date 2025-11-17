<div>
    <div>
        <flux:heading size="xl" level="1">{{ __('Edit Data Admin') }}</flux:heading>
        <flux:subheading>{{ __('Form to edit admin') }}</flux:subheading>
        <flux:separator variant="subtle" class="mb-6 mt-1" />
    </div>

    <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
        Back
    </a>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 mt-6">
        <form wire:submit="save">
            <div class="space-y-6">
                <flux:input wire:model="name" label="Name" placeholder="Enter full name" required />

                <flux:input wire:model="email" type="email" label="Email" placeholder="Enter email address"
                    required />

                <flux:input wire:model="password" type="password" label="Password" placeholder="Enter password"
                    required />

                <flux:input wire:model="confirm_password" type="password" label="Confirm Password"
                    placeholder="Confirm password" required />

                <flux:checkbox.group wire:model="roles" label="Roles">
                    @foreach ($allRoles as $role)
                        <flux:checkbox label="{{ $role->name }}" value="{{ $role->name }}" />
                    @endforeach
                </flux:checkbox.group>

                <div class="flex gap-3">
                    <flux:button type="submit" variant="primary">Save</flux:button>
                    {{-- <flux:button type="button" variant="ghost"
                        wire:click="$parent.redirect('{{ route('admins.index') }}')">Cancel</flux:button> --}}
                </div>
            </div>
        </form>
    </div>
</div>
