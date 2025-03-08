<div class="w-[100%] mx-[1rem] my-[1rem] p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Roles</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md text-center">
            {{ session('message') }}
        </div>
    @endif

    {{-- Role Form --}}
    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
        <div class="mb-2">
            <label class="block text-sm font-medium"> name</label>
            <input type="text" wire:model="name" class="w-full border rounded p-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
            {{ $isEditing ? 'Update Role' : 'Add Role' }}
        </button>

        @if ($isEditing)
            <button type="button" wire:click="resetInputFields" class="px-4 py-2 bg-gray-400 text-white rounded ml-2">
                Cancel
            </button>
        @endif
    </form>

    <!-- department List -->
    <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manage Roles</h1>

    <input type="text" wire:model="search" placeholder="Search Roles..." class="border p-2 rounded mb-4">

    <table id="RolessTable" class="min-w-full bg-white border-gray-200 text-center border rounded-lg shadow-md">
        <thead class="bg-gray-200 border-gray-200">
            <tr>
                <th class="py-2 px-4">name</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($roles as $role)
                <tr>
                    <td class="py-2 px-4">{{ $role->name }}</td>
                    <td class="py-2 px-4">
                        <button wire:click="edit({{ $role->id }})" class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 transition">Edit</button>
                        <button wire:click="destroy({{ $role->id }})" class="bg-red-500
                            text-white py-1 px-2 rounded-md hover:bg-red-600 transition">Delete</button>
                    </td>   
                </tr>
            @empty
                <tr>
                    <td class="py-2 px-4" colspan="3">No Roles found</td>
                </tr>
            @endforelse
            
            <!--  -->
        </tbody>
    </table>
</div>

</div>
