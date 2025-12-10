@extends('layoutsadmin.app')

@section('title', 'Dashboard Overview')
@section('subtitle', "Welcome back, Admin! Here's what's happening today.")

@section('content')
    <!-- Stats Cards -->
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6 sm:mb-8">

            <!-- Card 1 -->
            <div class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 card-hover animate-fade-in-up">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-400 rounded-lg flex items-center justify-center animate-float">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <span class="text-green-400 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>12.5%
                    </span>
                </div>
                <h3 class="theme-text-secondary text-sm mb-1">Total Users</h3>
                <p class="text-3xl font-bold text-blue-400">24,583</p>
                <div class="mt-4 w-full theme-bg-secondary rounded-full h-2">
                    <div class="bg-gradient-primary h-2 rounded-full shimmer" style="width: 75%"></div>
                </div>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 card-hover animate-fade-in-up delay-100">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center animate-float"
                        style="animation-delay: 0.5s">
                        <i class="fas fa-dollar-sign text-white text-xl"></i>
                    </div>
                    <span class="text-green-400 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>8.2%
                    </span>
                </div>
                <h3 class="theme-text-secondary text-sm mb-1">Revenue</h3>
                <p class="text-3xl font-bold text-blue-400">$125,890</p>
                <div class="mt-4 w-full theme-bg-secondary rounded-full h-2">
                    <div class="bg-gradient-primary h-2 rounded-full shimmer" style="width: 85%"></div>
                </div>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 card-hover animate-fade-in-up delay-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center animate-float"
                        style="animation-delay: 1s">
                        <i class="fas fa-shopping-cart text-white text-xl"></i>
                    </div>
                    <span class="text-red-400 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-down mr-1"></i>3.1%
                    </span>
                </div>
                <h3 class="theme-text-secondary text-sm mb-1">Orders</h3>
                <p class="text-3xl font-bold text-blue-400">1,458</p>
                <div class="mt-4 w-full theme-bg-secondary rounded-full h-2">
                    <div class="bg-gradient-primary h-2 rounded-full shimmer" style="width: 60%"></div>
                </div>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 card-hover animate-fade-in-up delay-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-blue-400 rounded-lg flex items-center justify-center animate-float"
                        style="animation-delay: 1.5s">
                        <i class="fas fa-chart-line text-white text-xl"></i>
                    </div>
                    <span class="text-green-400 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i>15.8%
                    </span>
                </div>
                <h3 class="theme-text-secondary text-sm mb-1">Growth</h3>
                <p class="text-3xl font-bold text-blue-400">+24.3%</p>
                <div class="mt-4 w-full theme-bg-secondary rounded-full h-2">
                    <div class="bg-gradient-primary h-2 rounded-full shimmer" style="width: 90%"></div>
                </div>
            </div>

        </div>

        <!-- Charts and Tables Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">

            <!-- Recent Activity -->
            <div
                class="lg:col-span-2 bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-4 sm:p-6 animate-fade-in-up delay-400">
                <div class="flex items-center justify-between mb-4 sm:mb-6">
                    <h3 class="text-lg sm:text-xl font-bold text-blue-400">Recent Activity</h3>
                    <button class="text-xs sm:text-sm theme-text-secondary hover:text-blue-400 transition-colors">View
                        All</button>
                </div>

                <div class="space-y-3 sm:space-y-4">
                    <div
                        class="flex items-center space-x-3 sm:space-x-4 p-3 sm:p-4 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300 cursor-pointer">
                        <div class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center animate-pulse-glow">
                            <i class="fas fa-user-plus text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium theme-text-primary truncate">New user registered</p>
                            <p class="text-xs theme-text-secondary truncate">John Doe joined the platform</p>
                        </div>
                        <span class="text-xs theme-text-secondary whitespace-nowrap">2m ago</span>
                    </div>

                    <div
                        class="flex items-center space-x-3 sm:space-x-4 p-3 sm:p-4 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300 cursor-pointer">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center animate-pulse-glow">
                            <i class="fas fa-shopping-bag text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium theme-text-primary truncate">New order placed</p>
                            <p class="text-xs theme-text-secondary truncate">Order #12345 - $234.00</p>
                        </div>
                        <span class="text-xs theme-text-secondary whitespace-nowrap">15m ago</span>
                    </div>

                    <div
                        class="flex items-center space-x-3 sm:space-x-4 p-3 sm:p-4 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300 cursor-pointer">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center animate-pulse-glow">
                            <i class="fas fa-star text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium theme-text-primary truncate">New review received</p>
                            <p class="text-xs theme-text-secondary truncate">5-star rating on Product X</p>
                        </div>
                        <span class="text-xs theme-text-secondary whitespace-nowrap">1h ago</span>
                    </div>

                    <div
                        class="flex items-center space-x-3 sm:space-x-4 p-3 sm:p-4 theme-bg-secondary rounded-lg hover:bg-blue-400/10 transition-all duration-300 cursor-pointer">
                        <div class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center animate-pulse-glow">
                            <i class="fas fa-box text-white"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium theme-text-primary truncate">Product updated</p>
                            <p class="text-xs theme-text-secondary truncate">Updated inventory for Item #456</p>
                        </div>
                        <span class="text-xs theme-text-secondary whitespace-nowrap">3h ago</span>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="space-y-4 sm:space-y-6 animate-fade-in-up delay-500">

                <!-- Top Products -->
                <div class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-4 sm:p-6">
                    <h3 class="text-lg font-bold text-blue-400 mb-4">Top Products</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-primary rounded-lg"></div>
                                <div>
                                    <p class="text-sm font-medium theme-text-primary">Product A</p>
                                    <p class="text-xs theme-text-secondary">2,458 sales</p>
                                </div>
                            </div>
                            <span class="text-blue-400 font-medium">$12.5K</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-500 rounded-lg"></div>
                                <div>
                                    <p class="text-sm font-medium theme-text-primary">Product B</p>
                                    <p class="text-xs theme-text-secondary">1,892 sales</p>
                                </div>
                            </div>
                            <span class="text-blue-400 font-medium">$9.8K</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-600 rounded-lg"></div>
                                <div>
                                    <p class="text-sm font-medium theme-text-primary">Product C</p>
                                    <p class="text-xs theme-text-secondary">1,234 sales</p>
                                </div>
                            </div>
                            <span class="text-blue-400 font-medium">$7.2K</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-4 sm:p-6">
                    <h3 class="text-lg font-bold text-blue-400 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 gap-2 sm:gap-3">
                        <button
                            class="p-3 bg-gradient-primary rounded-lg hover:shadow-lg hover:shadow-blue-400/50 transition-all duration-300 text-white font-medium">
                            <i class="fas fa-plus mb-2 text-xl"></i>
                            <p class="text-xs">Add User</p>
                        </button>
                        <button
                            class="p-3 bg-blue-500 rounded-lg hover:shadow-lg hover:shadow-blue-500/50 transition-all duration-300 text-white font-medium">
                            <i class="fas fa-box mb-2 text-xl"></i>
                            <p class="text-xs">New Product</p>
                        </button>
                        <button
                            class="p-3 bg-blue-600 rounded-lg hover:shadow-lg hover:shadow-blue-600/50 transition-all duration-300 text-white font-medium">
                            <i class="fas fa-file-invoice mb-2 text-xl"></i>
                            <p class="text-xs">Generate Report</p>
                        </button>
                        <button
                            class="p-3 bg-gradient-primary rounded-lg hover:shadow-lg hover:shadow-blue-400/50 transition-all duration-300 text-white font-medium">
                            <i class="fas fa-cog mb-2 text-xl"></i>
                            <p class="text-xs">Settings</p>
                        </button>
                    </div>
                </div>

            </div>

        </div>

        <!-- Latest Orders Table -->
        <div
            class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-4 sm:p-6 animate-fade-in-up delay-600">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-4 sm:mb-6 gap-3">
                <h3 class="text-lg sm:text-xl font-bold text-blue-400">Latest Orders</h3>
                <button
                    class="px-3 sm:px-4 py-2 bg-gradient-primary text-white rounded-lg hover:shadow-lg hover:shadow-blue-400/50 transition-all duration-300 text-sm">
                    View All Orders
                </button>
            </div>

            <div class="overflow-x-auto -mx-4 sm:mx-0">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead>
                                <tr class="theme-border border-b">
                                    <th
                                        class="text-left py-3 px-3 sm:px-4 theme-text-secondary font-medium text-xs sm:text-sm whitespace-nowrap">
                                        Order ID</th>
                                    <th
                                        class="text-left py-3 px-3 sm:px-4 theme-text-secondary font-medium text-xs sm:text-sm whitespace-nowrap">
                                        Customer</th>
                                    <th
                                        class="text-left py-3 px-3 sm:px-4 theme-text-secondary font-medium text-xs sm:text-sm whitespace-nowrap hidden md:table-cell">
                                        Product</th>
                                    <th
                                        class="text-left py-3 px-3 sm:px-4 theme-text-secondary font-medium text-xs sm:text-sm whitespace-nowrap">
                                        Amount</th>
                                    <th
                                        class="text-left py-3 px-3 sm:px-4 theme-text-secondary font-medium text-xs sm:text-sm whitespace-nowrap">
                                        Status</th>
                                    <th
                                        class="text-left py-3 px-3 sm:px-4 theme-text-secondary font-medium text-xs sm:text-sm whitespace-nowrap">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="theme-border border-b hover:bg-blue-400/10 transition-all duration-300">
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 text-blue-400 font-medium text-sm whitespace-nowrap">
                                        #12345</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">John
                                        Smith</td>
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap hidden md:table-cell">
                                        Product A</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">
                                        $234.00</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <span
                                            class="px-2 sm:px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-medium whitespace-nowrap">Completed</span>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <button class="text-blue-400 hover:text-blue-300 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="theme-border border-b hover:bg-blue-400/10 transition-all duration-300">
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 text-blue-400 font-medium text-sm whitespace-nowrap">
                                        #12344</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">Jane
                                        Doe</td>
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap hidden md:table-cell">
                                        Product B</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">
                                        $156.00</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <span
                                            class="px-2 sm:px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-xs font-medium whitespace-nowrap">Pending</span>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <button class="text-blue-400 hover:text-blue-300 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="theme-border border-b hover:bg-blue-400/10 transition-all duration-300">
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 text-blue-400 font-medium text-sm whitespace-nowrap">
                                        #12343</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">Mike
                                        Johnson</td>
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap hidden md:table-cell">
                                        Product C</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">
                                        $89.00</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <span
                                            class="px-2 sm:px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-xs font-medium whitespace-nowrap">Processing</span>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <button class="text-blue-400 hover:text-blue-300 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="theme-border border-b hover:bg-blue-400/10 transition-all duration-300">
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 text-blue-400 font-medium text-sm whitespace-nowrap">
                                        #12342</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">Sarah
                                        Wilson</td>
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap hidden md:table-cell">
                                        Product D</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">
                                        $345.00</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <span
                                            class="px-2 sm:px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-medium whitespace-nowrap">Completed</span>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <button class="text-blue-400 hover:text-blue-300 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-blue-400/10 transition-all duration-300">
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 text-blue-400 font-medium text-sm whitespace-nowrap">
                                        #12341</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">Tom
                                        Brown</td>
                                    <td
                                        class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap hidden md:table-cell">
                                        Product E</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4 theme-text-primary text-sm whitespace-nowrap">
                                        $123.00</td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <span
                                            class="px-2 sm:px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-medium whitespace-nowrap">Cancelled</span>
                                    </td>
                                    <td class="py-3 sm:py-4 px-3 sm:px-4">
                                        <button class="text-blue-400 hover:text-blue-300 transition-colors">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection