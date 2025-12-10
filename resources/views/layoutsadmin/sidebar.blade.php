<aside id="sidebar"
    class="fixed left-0 top-0 h-full w-64 bg-gradient-dark theme-border border-r z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
    <!-- Logo -->
    <div class="p-6 theme-border border-b animate-slide-in-left">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-primary rounded-lg flex items-center justify-center animate-pulse-glow">
                <i class="fas fa-crown text-white text-lg"></i>
            </div>
            <div>
                <h1 class="text-xl font-bold text-blue-400">AdminPro</h1>
                <p class="text-xs theme-text-secondary">Dashboard v2.0</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-primary text-white' : 'theme-text-secondary hover:bg-blue-400/10 hover:text-blue-400' }} animate-slide-in-left delay-100">
            <i class="fas fa-home text-lg"></i>
            <span class="font-medium">Dashboard</span>
        </a>
        <a href="{{ route('admin.transaksi.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.transaksi*') ? 'bg-gradient-primary text-white' : 'theme-text-secondary hover:bg-blue-400/10 hover:text-blue-400' }} animate-slide-in-left delay-200">
            <i class="fas fa-exchange-alt text-lg"></i>
            <span class="font-medium">Transaksi</span>
        </a>
        <a href="{{ route('admin.users.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.users*') ? 'bg-gradient-primary text-white' : 'theme-text-secondary hover:bg-blue-400/10 hover:text-blue-400' }} animate-slide-in-left delay-300">
            <i class="fas fa-users text-lg"></i>
            <span class="font-medium">Users</span>
        </a>
        <a href="{{ route('admin.kategori.index') }}"
            class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all duration-300 {{ request()->routeIs('admin.kategori*') ? 'bg-gradient-primary text-white' : 'theme-text-secondary hover:bg-blue-400/10 hover:text-blue-400' }} animate-slide-in-left delay-400">
            <i class="fas fa-tags text-lg"></i>
            <span class="font-medium">Kategori</span>
        </a>

    </nav>
</aside>