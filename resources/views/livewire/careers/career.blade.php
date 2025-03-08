
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-screen overflow-auto">
            <div class="flex justify-between items-center p-4 border-b">
                <h1 class="text-xl font-medium text-gray-700">Cariere</h1>
                <a href="{{ route('users') }}" class="text-gray-700 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

            <!-- Profile -->
            <div class="flex flex-col items-center py-6">
                <div class="relative">
                    <img src="https://randomuser.me/api/portraits/men/94.jpg"
                        alt="Profile" class="w-20 h-20 rounded-full object-cover">
                </div>
                <h2 class="mt-3 text-lg font-medium text-gray-500"></h2>
                <p class="text-gray-500 text-sm"></p>
                <span class="mt-1 text-green-600 text-md"></span>
            </div>

            <!-- Timeline -->
            <div class="px-8 py-4">
                <div class="relative">
                    <div class="absolute h-1 bg-blue-500 top-4 left-0 right-0 z-0"></div>

                    <!-- Timeline -->
                    <div class="flex justify-between relative z-10">
                        <!-- Job -->
                        <div class="flex flex-col items-center">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center border-2 border-white">
                                <div class="w-2 h-2 bg-white rounded-full"></div>
                            </div>
                            <span class="text-xs mt-1 text-gray-400"></span>
                            <div class="mt-2 text-center w-32">
                                <p class="text-sm text-gray-600 font-medium">Emploi</p>
                            </div>
                        </div>

                        <!-- Contract -->
                        <div class="flex flex-col items-center">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center border-2 border-white">
                                <div class="w-2 h-2 bg-white rounded-full"></div>
                            </div>
                            <span
                                class="text-xs mt-1 text-gray-400"></span>
                            <div class="mt-2 text-center w-32">
                                <p class="text-sm text-gray-600 font-medium">Contrat</p>
                                <p class="text-xs text-gray-500">Type:
                                </p>
                            </div>
                        </div>

                        <!-- Certification -->
                        <div class="flex flex-col items-center">
                            <div
                                class="w-8 h-8 rounded-full bg-white border border-gray-300 flex items-center justify-center">
                                <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                            </div>
                            <span class="text-xs mt-1 text-gray-400"></span>
                            <div class="mt-2 text-center w-32">
                                <p class="text-sm text-gray-600 font-medium">Certification:
                                </p>
                                <p class="text-xs text-gray-500">Certified</p>
                                <p class="text-xs text-gray-500">Actif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contract Details -->
            <div class="px-8 py-6">
                <div class="flex items-center mb-4">
                    <div class="w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-600">Contrat</h3>
                        <p class="text-sm text-gray-600">Type |</p>
                    </div>
                </div>

                <div class="bg-white border rounded-lg overflow-hidden">
                    <div class="border-b hover:bg-gray-50">
                        <div class="flex justify-between py-3 px-4 items-center">
                            <div class="flex items-center">
                                <div class="bg-blue-500 p-2 rounded text-white mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-600">Date</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm text-gray-600"></span>
                            </div>
                        </div>
                    </div>

                    <div class="border-b hover:bg-gray-50">
                        <div class="flex justify-between py-3 px-4 items-center">
                            <div class="flex items-center">
                                <div class="bg-blue-500 p-2 rounded text-white mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10.496 2.132a1 1 0 00-.992 0l-7 4A1 1 0 003 8v7a1 1 0 100 2h14a1 1 0 100-2V8a1 1 0 00.496-1.868l-7-4zM6 9a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1zm3 1a1 1 0 012 0v3a1 1 0 11-2 0v-3zm5-1a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-600">Département</span>
                            </div>
                            <div class="flex items-center">
                                <span
                                    class="text-sm text-gray-600"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-b hover:bg-gray-50">
                        <div class="flex justify-between py-3 px-4 items-center">
                            <div class="flex items-center">
                                <div class="bg-blue-500 p-2 rounded text-white mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-600">Retards</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm text-gray-600">{{ $user->delays ?? '-' }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 ml-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="border-b hover:bg-gray-50">
                        <div class="flex justify-between py-3 px-4 items-center">
                            <div class="flex items-center">
                                <div class="bg-blue-500 p-2 rounded text-white mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-600">Grade</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-sm text-gray-600">{{ $user->grade ?? 'Non défini' }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 ml-2"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>

            <!-- Cursus Form Section -->
            <div id="cursusFormContainer" class="hidden px-8 py-6 bg-gray-50">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-6 text-gray-700">Créer un Nouveau Cursus</h2>

                    <!-- <form action="" method="POST" id="cursusForm">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="career_type" class="block text-sm font-medium text-gray-700">Type de
                                    Carrière</label>
                                <select name="career_type" id="career_type"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    required>
                                    <option value="">Sélectionner un type de carrière</option>
                                    <option value="developpeur">Développeur</option>
                                    <option value="designer">Designer</option>
                                    <option value="manager">Manager</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>

                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                                <select name="grade" id="grade"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    required>
                                    <option value="">Sélectionner un grade</option>
                                    <option value="junior">Junior</option>
                                    <option value="intermediate">Intermédiaire</option>
                                    <option value="senior">Senior</option>
                                    <option value="expert">Expert</option>
                                </select>
                            </div>

                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Date de
                                    Début</label>
                                <input type="date" name="start_date" id="start_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    required>
                            </div>

                            <div>
                                <label for="certification"
                                    class="block text-sm font-medium text-gray-700">Certification</label>
                                <input type="text" name="certification" id="certification"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    placeholder="Nom de la certification">
                            </div>

                            <div class="md:col-span-2">
                                <label for="remarks" class="block text-sm font-medium text-gray-700">Remarques</label>
                                <textarea name="remarks" id="remarks" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    placeholder="Observations ou commentaires supplémentaires"></textarea>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-4">
                            <button type="button" id="cancelButton"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                                Annuler
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                Enregistrer
                            </button>
                        </div>
                    </form> -->
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end p-4 border-t space-x-4">
                <button id="toggleCursusForm" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

