<!-- statistcs -->
<div class="w-[100%] mx-[1rem] my-[1rem] p-6 shadow-lg rounded-lg">

<div class="grid grid-cols-3 gap-4">
    <div class="flex-col bg-gray-50 p-6 border-l-4 border-l-amber-700 rounded-lg shadow-md">
        <div>
            <i class="fas fa-folder text-lg mr-2"></i>
        </div>
        <div>
           <h2 class="text-xl font-semibold text-gray-700 mb-4">Total formations</h2>
           <p class="text-3xl font-semibold text-amber-700">10</p>
        </div>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-md border-l-4 border-l-gray-700">
        <div>
            <i class="fas fa-folder text-lg mr-2"></i>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Total Conger</h2>
            <p class="text-3xl font-semibold text-gray-700">10</p>
        </div>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-md border-l-4 border-l-blue-700">
        <div>
            <i class="fas fa-solid fa-users text-lg mr-2"></i>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Total Users</h2>
            <p class="text-3xl font-semibold text-blue-700">30</p>
        </div>
    </div>

    <div class="bg-gray-50 p-6 rounded-lg shadow-md border-l-4 border-l-green-700">
        <div>
            <i class="fas fa-solid fa-users text-lg mr-2"></i>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Total Departments</h2>
            <p class="text-3xl font-semibold text-green-800">20</p>
        </div>
    </div>
</div>

<div class="w-[100%] mx-[1rem] my-[1rem] p-6 bg-white shadow-lg rounded-lg">
    {{-- Users Form --}}
    <div class=" flex gap-10 justify-evenly max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <!-- users Table -->
        <div class="">
             <h1 class="text-2xl font-bold text-gray-800 mb-6">Users List</h1>

            <table class="min-w-full bg-gray-200 border-gray-200 border shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Full Name</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $user->id }}</td>
                        <td class="px-4 py-2 border">{{ $user->fullname }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>

        <div class="">
           <h1 class="text-2xl font-bold text-gray-800 mb-6">Roles List</h1>

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
                            <button wire:click="edit({{ $role->id }})"
                                class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 transition">Edit</button>
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

</div>
</div>