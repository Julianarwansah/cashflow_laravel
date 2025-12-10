@extends('layoutsadmin.app')

@section('title', 'Edit User')
@section('subtitle', 'Ubah data dan role pengguna')

@section('content')
    <div class="px-4 sm:px-8">
        <div
            class="max-w-xl mx-auto bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">

            <div class="flex items-center space-x-4 mb-8">
                <img src="{{ $user->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random' }}"
                    alt="{{ $user->name }}" class="w-16 h-16 rounded-full border-2 theme-border shadow-lg">
                <div>
                    <h3 class="text-xl font-bold theme-text-primary">{{ $user->name }}</h3>
                    <p class="text-sm theme-text-secondary">{{ $user->email }}</p>
                </div>
            </div>

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        required>
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Role</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="user" class="peer sr-only" {{ $user->role == 'user' ? 'checked' : '' }}>
                            <div
                                class="text-center py-3 rounded-lg border theme-border peer-checked:bg-blue-500 peer-checked:text-white peer-checked:border-blue-500 hover:bg-white/5 transition-all">
                                <i class="fas fa-user mb-1 block"></i>
                                User
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="admin" class="peer sr-only" {{ $user->role == 'admin' ? 'checked' : '' }}>
                            <div
                                class="text-center py-3 rounded-lg border theme-border peer-checked:bg-purple-500 peer-checked:text-white peer-checked:border-purple-500 hover:bg-white/5 transition-all">
                                <i class="fas fa-crown mb-1 block"></i>
                                Admin
                            </div>
                        </label>
                    </div>
                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    <p class="text-xs theme-text-secondary mt-2">
                        <i class="fas fa-info-circle mr-1"></i> Admin memiliki akses penuh ke sistem.
                    </p>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t theme-border mt-8">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 theme-border border theme-text-secondary rounded-lg hover:bg-white/5 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-gradient-primary text-white font-medium rounded-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection