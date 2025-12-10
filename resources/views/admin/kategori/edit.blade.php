@extends('layoutsadmin.app')

@section('title', 'Edit Kategori')
@section('subtitle', 'Ubah data kategori transaksi')

@section('content')
    <div class="px-4 sm:px-8">
        <div
            class="max-w-xl mx-auto bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">

            <form action="{{ route('admin.kategori.update', $kategori['id']) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Kategori -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">
                        Nama Kategori
                    </label>
                    <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori['nama_kategori']) }}"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        required>
                    @error('nama_kategori')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipe -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">
                        Tipe Transaksi
                    </label>
                    <select name="tipe"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        required>
                        <option value="pemasukan" {{ old('tipe', $kategori['tipe']) == 'pemasukan' ? 'selected' : '' }}>
                            Pemasukan</option>
                        <option value="pengeluaran" {{ old('tipe', $kategori['tipe']) == 'pengeluaran' ? 'selected' : '' }}>
                            Pengeluaran</option>
                    </select>
                    @error('tipe')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.kategori.index') }}"
                        class="px-4 py-2 theme-border border theme-text-secondary rounded-lg hover:bg-white/5 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-gradient-primary text-white font-medium rounded-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection