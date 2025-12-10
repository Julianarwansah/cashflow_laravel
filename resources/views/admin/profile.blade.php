@extends('layoutsadmin.app')

@section('title', 'My Profile')
@section('subtitle', 'Manage your account settings')

@section('content')
    <div class="px-4 sm:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Profile Card -->
            <div class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">

                @if(session('success'))
                    <div
                        class="bg-green-500/10 border border-green-500/20 text-green-500 px-4 py-3 rounded-lg mb-6 flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="flex items-center space-x-6 mb-8">
                        <div class="relative">
                            <img src="{{ Auth::user()->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                                alt="Profile" class="w-24 h-24 rounded-full border-4 theme-border">
                            <!-- <button type="button" class="absolute bottom-0 right-0 bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 transition-colors">
                                <i class="fas fa-camera text-sm"></i>
                            </button> -->
                        </div>
                        <div>
                            <h3 class="text-xl font-bold theme-text-primary">{{ Auth::user()->name }}</h3>
                            <p class="theme-text-secondary">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Name Input -->
                        <div>
                            <label class="block text-sm font-medium theme-text-primary mb-2">
                                Full Name
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 theme-text-secondary">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                    class="w-full pl-10 pr-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors">
                            </div>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label class="block text-sm font-medium theme-text-primary mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 theme-text-secondary">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                    class="w-full pl-10 pr-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-primary text-white font-medium rounded-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                            <i class="fas fa-save mr-2"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection