<div class="w-[100%] mx-[1rem] my-[1rem] p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage contracts</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md text-center">
            {{ session('message') }}
        </div>
    @endif

    {{-- contract Form --}}
    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
        <div class="mb-2">
            <label class="block text-sm font-medium">contract name</label>
            <input type="text" wire:model="typeContract" name="typeContract" class="w-full border rounded p-2">
            @error('typeContract') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <label class="block text-sm font-medium">Document</label>
            <input type="text" wire:model="document" name="document" class="w-full border rounded p-2">
            @error('document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
            <label class="block text-sm font-medium">contract startDate</label>
            <input type="date" wire:model="startDate" name="startDate" class="w-full border rounded p-2">
            @error('startDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium">endDte</label>
            <input type="date" wire:model="endDate" name="endDate" class="w-full border rounded p-2">
            @error('endDate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
            {{ $isEditing ? 'Update contract' : 'Add contract' }}
        </button>

        @if ($isEditing)
            <button type="button" wire:click="resetInputFields" class="px-4 py-2 bg-gray-400 text-white rounded ml-2">
                Cancel
            </button>
        @endif
    </form>

    <!-- department List -->
    <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manage contracts</h1>

    <input type="text" wire:model="search" placeholder="Search contracts..." class="border p-2 rounded mb-4">

    <table id="contractsTable" class="min-w-full bg-white text-center border rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">typeContract</th>
                <th class="py-2 px-4">document</th>
                <th class="py-2 px-4">startDate</th>
                <th class="py-2 px-4">endDte</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contracts as $contract)
                <tr>

                    <td class="py-2 px-4">{{ $contract->typeContract }}</td>
                    <td class="py-2 px-4">{{ $contract->document }}</td>
                    <td class="py-2 px-4">{{ $contract->startDate }}</td>
                    <td class="py-2 px-4">{{ $contract->endDte }}</td>
                    <td class="py-2 px-4">
                        <button wire:click="edit({{ $contract->id }})" class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 transition">Edit</button>
                        <button wire:click="destroy({{ $contract->id }})" class="bg-red-500
                            text-white py-1 px-2 rounded-md hover:bg-red-600 transition">Delete</button>
                    </td>   
                </tr>
            @empty
                <tr>
                    <td class="py-2 px-4" colspan="3">No contract found</td>
                </tr>
            @endforelse
            
            <!--  -->
        </tbody>
    </table>
</div>

</div>
