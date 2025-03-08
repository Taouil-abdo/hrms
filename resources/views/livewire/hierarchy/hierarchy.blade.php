<div class="w-[100%] mx-[1rem] my-[1rem] p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Hierarchys</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded-md text-center">
            {{ session('message') }}
        </div>
    @endif

    {{-- Hierarchy Form --}}
    
    <!-- department List -->
    <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Manage Hierarchys</h1>

    @if($users->role->name == 'admin')

        <div>
            <h1>{{ $users->role->name }}</h1>
        </div>

    @endif
    
        <div>
            <h1>{{ $users->role->name }}</h1>
        </div>
</div>

</div>

