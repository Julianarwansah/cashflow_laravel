<header class="bg-gradient-dark theme-border border-b sticky top-0 z-40">
    <div class="px-4 sm:px-8 py-4 flex items-center justify-between">
        <!-- Mobile Menu Button -->
        <button id="menuBtn"
            class="lg:hidden p-2 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300 mr-4">
            <i class="fas fa-bars text-blue-400 text-xl"></i>
        </button>

        <div class="animate-fade-in-up flex-1">
            <h2 class="text-xl sm:text-2xl font-bold text-blue-400">@yield('title', 'Dashboard Overview')</h2>
            <p class="text-xs sm:text-sm theme-text-secondary hidden sm:block">
                @yield('subtitle', "Welcome back, Admin! Here's what's happening today.")</p>
        </div>

        <div class="flex items-center space-x-2 sm:space-x-4 animate-fade-in-up delay-200">
            <div class="relative hidden md:block">
                <input type="text" placeholder="Search..."
                    class="px-4 py-2 pl-10 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 transition-all theme-text-primary w-48 lg:w-64">
                <i class="fas fa-search absolute left-3 top-3 theme-text-secondary"></i>
            </div>

            <button
                class="md:hidden p-2 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300">
                <i class="fas fa-search text-blue-400 text-lg"></i>
            </button>

            <!-- Theme Toggle Button -->
            <button id="themeToggle"
                class="theme-toggle-btn p-2 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300 relative">
                <i class="fas fa-sun text-blue-400 text-lg" id="lightIcon"></i>
                <i class="fas fa-moon text-blue-400 text-lg hidden" id="darkIcon"></i>
            </button>

            <button class="relative p-2 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300">
                <i class="fas fa-bell text-blue-400 text-lg"></i>
                <span
                    class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full text-xs flex items-center justify-center animate-pulse text-white">3</span>
            </button>

            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="profileDropdownBtn"
                    class="flex items-center space-x-2 p-2 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300">
                    <img src="{{ Auth::user()->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                        alt="Profile" class="w-8 h-8 rounded-full border-2 border-blue-400">
                    <span class="theme-text-primary font-medium hidden sm:block">{{ Auth::user()->name }}</span>
                    <i class="fas fa-chevron-down text-xs theme-text-secondary hidden sm:block"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileDropdownMenu"
                    class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 rounded-lg shadow-xl py-2 opacity-0 invisible transform scale-95 transition-all duration-200 origin-top-right z-50 theme-border border">
                    <div class="px-4 py-2 border-b theme-border">
                        <p class="text-sm font-semibold theme-text-primary text-truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs theme-text-secondary text-truncate">{{ Auth::user()->email }}</p>
                    </div>

                    <a href="{{ route('admin.profile') }}"
                        class="block px-4 py-2 text-sm theme-text-secondary hover:bg-blue-50 dark:hover:bg-blue-500/10 hover:text-blue-400 transition-colors">
                        <i class="fas fa-user mr-2"></i> My Profile
                    </a>

                    <div class="border-t theme-border my-1"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

            <script>
                // Profile Dropdown Toggle
                const profileBtn = document.getElementById('profileDropdownBtn');
                const profileMenu = document.getElementById('profileDropdownMenu');

                if (profileBtn && profileMenu) {
                    profileBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const isHidden = profileMenu.classList.contains('invisible');

                        if (isHidden) {
                            // Show
                            profileMenu.classList.remove('invisible', 'opacity-0', 'scale-95');
                            profileMenu.classList.add('opacity-100', 'scale-100');
                        } else {
                            // Hide
                            profileMenu.classList.add('invisible', 'opacity-0', 'scale-95');
                            profileMenu.classList.remove('opacity-100', 'scale-100');
                        }
                    });

                    // Close when clicking outside
                    document.addEventListener('click', (e) => {
                        if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                            profileMenu.classList.add('invisible', 'opacity-0', 'scale-95');
                            profileMenu.classList.remove('opacity-100', 'scale-100');
                        }
                    });
                }
            </script>
        </div>
    </div>
</header>