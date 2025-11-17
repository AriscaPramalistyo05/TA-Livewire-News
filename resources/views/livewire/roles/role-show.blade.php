<div class="max-w-6xl mx-auto">
    <!-- Header Section -->
    <div class="mb-6">
        <flux:heading size="xl" level="1" class="text-gray-900 dark:text-gray-100">
            {{ __('Detail Role') }}
        </flux:heading>
        <flux:subheading class="text-gray-600 dark:text-gray-400 mt-1">
            {{ __('Informasi lengkap role dan permission') }}
        </flux:subheading>
        <flux:separator variant="subtle" class="mt-4" />
    </div>

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('roles.index') }}"
            class="inline-flex items-center gap-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            {{ __('Kembali') }}
        </a>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-8 space-y-8">
            <!-- Nama Role Field -->
            <div>
                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                    {{ __('Nama Role') }}
                </label>
                <div class="text-gray-900 dark:text-gray-100 text-base">
                    {{ $role->name }}
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-100 dark:border-gray-700"></div>

            <!-- Permissions Field -->
            <div>
                <label class="block text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                    {{ __('Permissions') }}
                </label>
                <div class="flex flex-wrap gap-2">
                    @if ($role->permissions->count() > 0)
                        @foreach ($role->permissions as $permission)
                            <flux:badge size="sm" variant="outline">
                                {{ $permission->name }}
                            </flux:badge>
                        @endforeach
                    @else
                        <span class="text-gray-500 dark:text-gray-400 text-sm">No permissions assigned</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>