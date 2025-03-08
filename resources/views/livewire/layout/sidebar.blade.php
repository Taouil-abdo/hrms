<aside
    class="w-64 bg-white h-100 border-r border-gray-200 fixed md:static transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-lg slide-in"
    id="sideBar">
    <div class="p-6 flex flex-col h-100 justify-center items-center">
        <button id="sideBarHideBtn" class="md:hidden text-gray-900 hover:text-red-500 focus:outline-none">
            <i class="fas fa-times-circle text-xl"></i>
        </button>
        @if(Auth::user()->role('admin'))
        <div class="w-full mt-4">
            <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider border-b pb-2">Homes</p>
            <a href="{{ url('/dashboard') }}"
                class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300 fade-in-up">
                <i class="fas fa-chart-pie text-xs mr-2"></i>
                Analytics Dashboard
            </a>
        </div>

        <div class="w-full mt-4">
            <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider border-b pb-2">Apps</p>
            <ul class="fade-in-up">
                <li>
                    <a href="{{ url('/roles') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-shield-alt text-xs mr-2"></i>
                        Roles
                    </a>
                </li>
                <li>
                    <a href="{{ url('/Conges') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300 fade-in-up">
                        <i class="fas fa-chart-pie text-xs mr-2"></i>
                        Conger
                    </a>
                <li>
                    <a href="{{ url('/departments') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-calendar-alt text-xs mr-2"></i>
                        Departments
                    </a>
                </li>
                <li>
                    <a href="{{ url('/formations') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-folder text-xs mr-2"></i>
                        formation
                    </a>
                </li>
                <li>
                    <a href="{{ url('/users') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-users text-xs mr-2"></i>
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ url('/jobs') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-users text-xs mr-2"></i>
                        jobs
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contracts') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-users text-xs mr-2"></i>
                        contract
                    </a>
                </li>
                <li>
                    <a href="{{ url('/hierarchy') }}"
                        class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300">
                        <i class="fas fa-users text-xs mr-2"></i>
                        Hierarchy
                    </a>
                </li>
            </ul>
        </div>
        @else
        <div class="w-full mt-4">
            <a href="{{ url('/conger') }}"
                class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300 fade-in-up">
                <i class="fas fa-chart-pie text-xs mr-2"></i>
                Conger
            </a>
        </div>
        @endif

        <div class="w-full mt-4">
            <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider border-b pb-2">UI Elements</p>
            <a href="{{ url('/profile') }}"
                class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300 fade-in-up">
                <i class="fas fa-font text-xs mr-2"></i>
                Profile
            </a>
            <a href="{{ url('/logout') }}"
                class="flex items-center mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-300 fade-in-up">
                <i class="fas fa-mouse-pointer text-xs mr-2"></i>
                Log_Out
            </a>
        </div>
    </div>
</aside>