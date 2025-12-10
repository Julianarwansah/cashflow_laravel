@extends('layoutsadmin.app')

@section('title', 'Kategori Transaksi')
@section('subtitle', 'Kelola kategori pemasukan dan pengeluaran')

@section('content')
    <div class="px-4 sm:px-8">
        <div class="bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold theme-text-primary">Daftar Kategori</h3>
                <a href="{{ route('admin.kategori.create') }}"
                    class="px-4 py-2 bg-gradient-primary text-white font-medium rounded-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                    <i class="fas fa-plus mr-2"></i> Tambah Kategori
                </a>
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
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Nama Kategori</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Tipe</th>
                            <th class="py-3 px-4 font-semibold text-sm theme-text-secondary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y theme-border">
                        @forelse($categories as $kategori)
                            <tr class="hover:bg-blue-400/5 transition-colors">
                                <td class="py-3 px-4">{{ $kategori['nama_kategori'] }}</td>
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs font-semibold {{ $kategori['tipe'] == 'pemasukan' ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }}">
                                        {{ ucfirst($kategori['tipe']) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.kategori.edit', $kategori['id']) }}"
                                            class="text-blue-400 hover:text-blue-300 p-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.kategori.destroy', $kategori['id']) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-400 p-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-8 text-center theme-text-secondary">
                                    Belum ada kategori.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection