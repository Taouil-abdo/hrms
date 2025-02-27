<div class="w-[100%] mx-[1rem] my-[1rem] p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Jobs</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md text-center">
            {{ session('message') }}
        </div>
    @endif

    {{-- Job Form --}}
    <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
        <div class="mb-2">
            <label class="block text-sm font-medium">Job Title</label>
            <input type="text" wire:model="title" class="w-full border rounded p-2">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium">Description</label>
            <textarea wire:model="description" class="w-full border rounded p-2"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
            {{ $isEditing ? 'Update Job' : 'Add Job' }}
        </button>

        @if ($isEditing)
            <button type="button" wire:click="resetInputFields" class="px-4 py-2 bg-gray-400 text-white rounded ml-2">
                Cancel
            </button>
        @endif
    </form>

    <!-- Job List -->
    <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manage Jobs</h1>

    <input type="text" wire:model="search" placeholder="Search jobs..." class="border p-2 rounded mb-4">

    <table id="jobsTable" class="min-w-full bg-white border text-center rounded-lg shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-4">Title</th>
                <th class="py-2 px-4">Description</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jobs as $job)
                <tr>
                    <td class="py-2 px-4">{{ $job->title }}</td>
                    <td class="py-2 px-4">{{ $job->description }}</td>
                    <td class="py-2 px-4">
                        <button wire:click="edit({{ $job->id }})" class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 transition">Edit</button>
                        <button wire:click="destroy({{ $job->id }})" class="bg-red-500
                            text-white py-1 px-2 rounded-md hover:bg-red-600 transition">Delete</button>
                    </td>   
                </tr>
            @empty
                <tr>
                    <td class="py-2 px-4" colspan="3">No jobs found</td>
                </tr>
            @endforelse
            
            
            <!--  -->


        </tbody>
    </table>

    
</div>

</div>
