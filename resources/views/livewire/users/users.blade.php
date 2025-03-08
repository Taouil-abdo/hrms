<div class="w-[100%] mx-[1rem] my-[1rem] p-6 bg-white shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Manage Users</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
    <div class="bg-green-500 text-white p-3 mb-4 rounded-md text-center">
        {{ session('message') }}
    </div>
    @endif

    {{-- Users Form --}}
    <div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">

        <!-- Form Title -->
        <h2 class="text-2xl font-semibold mb-4">{{ $isEditing ? 'Edit Users' : 'Add New User' }}</h2>

        <!-- Form -->
        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" class="grid grid-cols-2 gap-4">
            <!-- Fullname -->
            <div>
                <label class="block text-gray-700">Full Name</label>
                <input type="text" wire:model="fullname"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('fullname') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" wire:model="email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Password (Only on Create) -->
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" wire:model="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <!-- garde -->
            <div>
                <label class="block text-gray-700">Grade</label>
                <input type="text" wire:model="grade"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('grade') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <!-- Phone -->
            <div>
                <label class="block text-gray-700">Phone</label>
                <input type="text" wire:model="phone"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Birth Date -->
            <div>
                <label class="block text-gray-700">Birth Date</label>
                <input type="date" wire:model="birthday" name="birthday"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('birthday') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Address -->
            <div>
                <label class="block text-gray-700">Address</label>
                <input type="text" wire:model="address"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Recruitment Date -->
            <div>
                <label class="block text-gray-700">Recruitment Date</label>
                <input type="date" wire:model="recruitment_date"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('recruitment_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Salary -->
            <div>
                <label class="block text-gray-700">Salary</label>
                <input type="number" wire:model="salary"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                @error('salary') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-gray-700">Status</label>
                <select wire:model="status" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="Active">Active</option>
                    <option value="NoActive">No Active</option>
                </select>
                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Department -->
            <div>
                <label class="block text-gray-700">Department</label>
                <select wire:model="department_id"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Role -->
            <div>
                <label class="block text-gray-700">Role</label>
                <select wire:model="role_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- contract -->
            <div>
                <label class="block text-gray-700">Contract</label>
                <select wire:model="contract_id" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    <option value="">Select contract</option>
                    @foreach($contracts as $contract)
                    <option value="{{ $contract->id }}">{{ $contract->typeContract }}</option>
                    @endforeach
                </select>
                @error('contract_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="col-span-2">
                <button type="submit" name="submit" class="w-full bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    {{ $isEditing ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>

        <!-- users Table -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">user List</h2>

            <table class="min-w-full bg-gray-200 border-gray-200 border shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Full Name</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Phone</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $user->id }}</td>
                        <td class="px-4 py-2 border">{{ $user->fullname }}</td>
                        <td class="px-4 py-2 border">{{ $user->email }}</td>
                        <td class="px-4 py-2 border">{{ $user->phone }}</td>
                        <td class="px-4 py-2 border flex space-x-2">
                            <!--  -->

                            <button wire:click="show({{ $user->id }})" class="px-3 py-1 bg-green-400 text-white rounded-lg hover:bg-green-500">Show</button>
                            <button wire:click="edit({{ $user->id }})"
                                class="px-3 py-1 bg-blue-400 text-white rounded-lg hover:bg-yellow-500">Edit</button>
                            <button wire:click="destroy({{ $user->id }})"
                                class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>

</div>
