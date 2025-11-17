<div class="max-w-6xl mx-auto">
    <!-- Header Section -->
    <div class="mb-6">
        <flux:heading size="xl" level="1" class="text-gray-900 dark:text-gray-100">
            {{ __('Data Admin') }}
        </flux:heading>
        <flux:subheading class="text-gray-600 dark:text-gray-400 mt-1">
            {{ __('Kelola seluruh data admin sistem') }}
        </flux:subheading>
        <flux:separator variant="subtle" class="mt-4" />
    </div>

    {{-- Success Toast --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="fixed bottom-4 right-4 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg shadow-lg transition transform duration-300 z-50"
            x-transition>
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Error Toast --}}
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="fixed bottom-4 right-4 flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-lg transition transform duration-300 z-50"
            x-transition>
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Validation Errors Toast --}}
    @if ($errors->any())
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
            class="fixed bottom-4 right-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg shadow-lg max-w-sm transition transform duration-300 z-50"
            x-transition>
            <div class="font-medium mb-2">Terjadi kesalahan:</div>
            <ul class="list-disc pl-5 space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Action Button -->
    <div class="mb-6">
        @can('user create')
            <a href="{{ route('users.create') }}"
                class="inline-flex items-center gap-2 bg-gray-900 dark:bg-gray-100 hover:bg-gray-800 dark:hover:bg-gray-200 text-white dark:text-gray-900 font-medium px-4 py-2 rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Tambah Admin') }}
            </a>
        @endcan
    </div>

    <!-- Table Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            ID
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Nama
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Email
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Role
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($users as $user)
                        <tr
                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                {{ $loop->iteration }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100 font-medium">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex flex-wrap gap-1">
                                    @if ($user->roles->count() > 0)
                                        @foreach ($user->roles as $role)
                                            <flux:badge size="sm" variant="outline">
                                                {{ $role->name }}
                                            </flux:badge>
                                        @endforeach
                                    @else
                                        <span class="text-gray-500 dark:text-gray-400 text-xs">No roles</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex items-center gap-4">
                                    @can('user.view')
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200 font-medium transition-colors">
                                            Lihat
                                        </a>
                                    @endcan
                                    @can('user.edit')
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium transition-colors">
                                            Edit
                                        </a>
                                    @endcan
                                    @can('user.delete')
                                        <button wire:click="delete({{ $user->id }})"
                                            wire:confirm="Apakah Anda yakin ingin menghapus admin ini?"
                                            class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 font-medium transition-colors">
                                            Hapus
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
