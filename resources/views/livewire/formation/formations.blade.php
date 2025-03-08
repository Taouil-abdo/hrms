<div class="max-w-7xl mx-auto my-8 p-6 bg-white shadow-xl rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">Formation Management System</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-4 mb-6 rounded-md text-center shadow-sm transition-all duration-300">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid md:grid-cols-1 gap-8">
        <!-- Formation Form -->
        <div class="bg-gray-50 w-full p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">{{ $isEditing ? 'Edit' : 'Create' }} Formation</h2>
            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                <div class="flex flex-col">
                    <label for="title" class="mb-1 text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" id="title" wire:model="title"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('title') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="description" class="mb-1 text-sm font-medium text-gray-700">Description:</label>
                    <textarea id="description" wire:model="description"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    @error('description') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="location" class="mb-1 text-sm font-medium text-gray-700">Location:</label>
                    
                   <select wire:model="location" id="location" class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">select Location</option>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                   </select>
                   
                        @error('location') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="certificate" class="mb-1 text-sm font-medium text-gray-700">Certificate:</label>
                    <input type="text" id="certificate" wire:model="certificate"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('certificate') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="start_date" class="mb-1 text-sm font-medium text-gray-700">Start Date:</label>
                    <input type="date" id="start_date" wire:model="start_date"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('start_date') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="end_date" class="mb-1 text-sm font-medium text-gray-700">End Date:</label>
                    <input type="date" id="end_date" wire:model="end_date"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('end_date') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="user_id" class="mb-1 text-sm font-medium text-gray-700">Employee:</label>
                    <select id="user_id" wire:model="user_id"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                        @endforeach
                    </select>
                    @error('user_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                    {{ $isEditing ? 'Update Formation' : 'Add Formation' }}
                </button>

                @if ($isEditing)
                    <button type="button" wire:click="resetFields" class="px-4 py-2 bg-gray-400 text-white rounded ml-2">
                        Cancel
                    </button>
                @endif
            </form>
        </div>
    </div>

    <!-- Formations List -->
    <div class="mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Formations</h2>
            <div class="relative">
                <input type="text" wire:model="search" placeholder="Search formations..."
                    class="border border-gray-300 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Certificate</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Employee</th>
                        <th class="px-4 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($formations as $formation)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->title }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->description }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->location }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->certificate }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->start_date }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->end_date }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-xs">{{ $formation->user->fullname }}</td>
                            <td class="px-4 py-4 whitespace-nowrap flex space-x-2">
                                <button wire:click="edit({{ $formation->id }})" class="px-3 py-1 bg-blue-500 text-white rounded">Edit</button>
                                <button wire:click="destroy({{ $formation->id }})" class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" colspan="8">No formations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $formations->links() }}
            </div>
        </div>
    </div>
</div>
