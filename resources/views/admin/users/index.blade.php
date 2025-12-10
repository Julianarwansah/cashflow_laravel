@extends('layoutsadmin.app')

@section('title', 'Daftar User')
@section('subtitle', 'Kelola pengguna aplikasi')

@section('content')
    <div class="px-4 sm:px-8">
        <div class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold theme-text-primary">Pengguna Terdaftar</h3>
                <div class="text-sm theme-text-secondary">
                    Total: {{ $users->total() }} User
                </div>
            </div>

            @if(session('success'))
                <div
                    class="bg-green-500/10 border border-green-500/20 text-green-500 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-lg mb-6 flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full theme-text-primary">
                    <thead>
                        <tr class="border-b theme-border text-left">
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">User</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Email</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Role</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Provider</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Bergabung</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y theme-border">
                        @forelse($users as $user)
                            <tr class="hover:bg-blue-400/5 transition-colors">
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $user->photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=random' }}"
                                            alt="{{ $user->name }}" class="w-8 h-8 rounded-full border theme-border">
                                        <span class="font-medium">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4 text-sm theme-text-secondary">{{ $user->email }}</td>
                                <td class="py-3 px-4">
                                    @if($user->role == 'admin')
                                        <span class="bg-purple-500/10 text-purple-500 px-2 py-1 rounded-full text-xs font-semibold">Admin</span>
                                    @else
                                        <span class="bg-gray-500/10 theme-text-secondary px-2 py-1 rounded-full text-xs font-semibold">User</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4">
                                    @if($user->provider == 'google.com')
                                        <span
                                            class="flex items-center text-xs font-semibold bg-red-500/10 text-red-500 px-2 py-1 rounded-full w-fit">
                                            <i class="fab fa-google mr-1"></i> Google
                                        </span>
                                    @elseif($user->provider == 'password')
                                        <span
                                            class="flex items-center text-xs font-semibold bg-blue-500/10 text-blue-500 px-2 py-1 rounded-full w-fit">
                                            <i class="fas fa-envelope mr-1"></i> Email
                                        </span>
                                    @else
                                        <span class="text-xs theme-text-secondary">{{ $user->provider ?? '-' }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-sm theme-text-secondary">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-400 hover:text-blue-300 p-1" title="Edit / Ganti Role">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini? Data tidak bisa dikembalikan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400 p-1" title="Hapus User">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-green-500">Anda</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-8 text-center theme-text-secondary">
                                    Belum ada user terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection