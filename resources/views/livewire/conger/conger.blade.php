<div class="max-w-7xl mx-auto my-8 p-6 bg-white shadow-xl rounded-lg">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 border-b pb-4">conger Management System</h1>

    <!-- Success Message -->
    @if(session()->has('message'))
    <div class="bg-green-500 text-white p-4 mb-6 rounded-md text-center shadow-sm transition-all duration-300">
        {{ session('message') }}
    </div>
    @endif

    <div class="grid md:grid-cols-1 gap-8">
        <!-- conger Request Form -->
         <div class="bg-gray-50 w-full p-6 rounded-lg shadow-md">
             <h2 class="text-xl font-semibold text-gray-700 mb-4">Conger Request</h2>
            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}">
                <div class="flex flex-col">
                    <label for="start_date" class="mb-1 text-sm font-medium text-gray-700">Start Date:</label>
                    <input type="date" id="start_date" wire:model="start_date"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('start_date') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="end_date" class="mb-1 text-sm font-medium text-gray-700">End Date:</label>
                    <input type="date" id="end_date" wire:model="end_date"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('end_date') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="raison" class="mb-1 text-sm font-medium text-gray-700">Raison:</label>
                    <input type="text" id="raison" wire:model="raison"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('raison') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="Days" class="mb-1 text-sm font-medium text-gray-700">Days:</label>
                    <input type="number" id="Days" wire:model="Days"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    @error('Days') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label for="type" class="mb-1 text-sm font-medium text-gray-700">conger Type:</label>
                    <select id="type" wire:model="type"
                        class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                        <option value="">Select conger type</option>
                        <option value="annual">Annual conger</option>
                        <option value="recovery">Recovery Days</option>
                    </select>
                    @error('type') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                    {{ $isEditing ? 'Update Conger Request' : 'Add Conger Request' }}
                </button>

                @if ($isEditing)
                <button type="button" wire:click="resetInputFields"
                    class="px-4 py-2 bg-gray-400 text-white rounded ml-2">
                    Cancel
                </button>
                @endif
            </form>
        </div>
    </div>

    <div class=" hidden p-4 border rounded bg-gray-100">
        <h2 class="text-xl font-bold">{{ Auth::user()->fullname }}</h2>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Phone: {{ Auth::user()->phone }}</p>
        <p>Position: {{ Auth::user()->position }}</p>
        <p>Salary: ${{ number_format(Auth::user()->salary, 2) }}</p>
        <p class="text-lg font-semibold">Leave Balance: <span class="text-blue-500">{{ Auth::user()->leaveBalance }}
                days</span></p>
    </div>

    <div class="mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Conger</h2>
            <div class="relative">
                <input type="text" wire:model="search" placeholder="Search congers..."
                    class="border border-gray-300 rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    @if(Auth::user()->role->name === "manager" || "RHmanager" || "admin")
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Employee</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Start Date</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            End Date</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Manager Approval</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            HR Approval</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($Conges as $conge)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center mr-3">
                                    {{ $conge->user->fullname }}
                                </div>
                                <span class="font-medium text-gray-900"> </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700"> {{ $conge->start_date }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700"> {{ $conge->end_date }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                                {{ $conge->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                @if(Auth::user()->role->name === 'manager')

                                @if($conge->manager_approval == 'pending')
                                <button wire:click="approve({{ $conge->id }})"
                                    class="px-3 py-1 bg-green-500 text-white rounded">Approve</button>
                                <button wire:click="reject({{ $conge->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded">Reject</button>
                                @elseif($conge->manager_approval == 'approved')
                                <span class="text-green-500">Approved</span>
                                @else
                                <span class="text-red-500">Rejected</span>
                                @endif

                                @elseif($conge->manager_approval == 'approved')
                                <span class="text-green-500">Approved</span>
                                @elseif($conge->manager_approval == 'pending')
                                <span class="text-yellow-500">Pending</span>
                                @else
                                <span class="text-red-500">Rejected</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex space-x-2">
                                @if(Auth::user()->role->name === 'RHmanager')

                                @if($conge->hr_approval == 'pending' && Auth::user()->role->name === 'HRmanager')
                                <button wire:click="hrApprove({{ $conge->id }})"
                                    class="px-3 py-1 bg-green-500 text-white rounded">Approve</button>
                                <button wire:click="hrReject({{ $conge->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded">Reject</button>
                                @elseif($conge->hr_approval === 'approved')
                                <span class="text-green-500">Approved</span>
                                @else
                                <span class="text-red-500">Rejected</span>
                                @endif

                                @elseif($conge->manager_approval == 'approved')
                                <span class="text-green-500">Approved</span>
                                @elseif($conge->manager_approval == 'pending')
                                <span class="text-yellow-500">Pending</span>
                                @else
                                <span class="text-red-500">Rejected</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" colspan="6">No congers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination (Optional) -->
            <div class="mt-4 flex justify-center">
                <!-- Pagination links would go here -->
            </div>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Employee</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Start Date</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            End Date</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Manager Approval</th>
                        <th
                            class="px-6 py-3 border-b text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            HR Approval</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($Conges as $conge)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div
                                    class="h-10 w-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center mr-3">
                                    {{ Auth::user()->fullname }}
                                </div>
                                <span class="font-medium text-gray-900"> </span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700"> {{ $CongesUser->start_date }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700"> {{ $CongesUser->end_date }} </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full">
                                {{ $CongesUser->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <span class="text-red-500">$CongesUser->manager_approval</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <div class="flex space-x-2">
                                <span class="text-red-500">$CongesUser->hr_approval</span>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" colspan="6">No congers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination (Optional) -->
            <div class="mt-4 flex justify-center">
                <!-- Pagination links would go here -->
            </div>
        </div>
    </div>
  @endif
</div>