@extends('layoutsadmin.app')

@section('title', 'Tambah Transaksi')
@section('subtitle', 'Catat transaksi baru')

@section('content')
    <div class="px-4 sm:px-8">
        <div
            class="max-w-2xl mx-auto bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">

            <form action="{{ route('admin.transaksi.store') }}" method="POST" class="space-y-6" id="transaksiForm">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-medium theme-text-primary mb-2">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                            class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                            required>
                        @error('tanggal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tipe -->
                    <div>
                        <label class="block text-sm font-medium theme-text-primary mb-2">Tipe</label>
                        <select name="tipe" id="tipeSelect"
                            class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                            required>
                            <option value="" disabled selected>Pilih Tipe</option>
                            <option value="pemasukan" {{ old('tipe') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                            <option value="pengeluaran" {{ old('tipe') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran
                            </option>
                        </select>
                        @error('tipe') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Kategori</label>
                    <select name="kategori_id" id="kategoriSelect"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        required>
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat['id'] }}" data-tipe="{{ $cat['tipe'] }}" class="kategori-option">
                                {{ $cat['nama_kategori'] }} ({{ ucfirst($cat['tipe']) }})
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    @if(count($categories) == 0)
                        <p class="text-xs text-yellow-500 mt-1">Belum ada kategori. <a
                                href="{{ route('admin.kategori.create') }}" class="underline hover:text-yellow-400">Buat
                                dulu</a>.</p>
                    @endif
                </div>

                <!-- Jumlah -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Jumlah (Rp)</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah') }}"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        placeholder="0" min="0" required>
                    @error('jumlah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Deskripsi (Opsional)</label>
                    <textarea name="deskripsi" rows="3"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        placeholder="Catatan tambahan...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('admin.transaksi.index') }}"
                        class="px-4 py-2 theme-border border theme-text-secondary rounded-lg hover:bg-white/5 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-gradient-primary text-white font-medium rounded-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tipeSelect = document.getElementById('tipeSelect');
                const kategoriSelect = document.getElementById('kategoriSelect');
                const options = Array.from(kategoriSelect.getElementsByClassName('kategori-option'));

                function filterKategori() {
                    const selectedTipe = tipeSelect.value;

                    // Reset selection
                    kategoriSelect.value = "";

                    options.forEach(opt => {
                        if (selectedTipe === "" || opt.dataset.tipe === selectedTipe) {
                            opt.style.display = "";
                            opt.disabled = false;
                        } else {
                            opt.style.display = "none";
                            opt.disabled = true;
                        }
                    });
                }

                tipeSelect.addEventListener('change', filterKategori);

                // Run once on load if old input exists
                if (tipeSelect.value) {
                    // Note: If old value exists, we might need to better handle re-selection
                    const selectedTipe = tipeSelect.value;
                    options.forEach(opt => {
                        if (selectedTipe === "" || opt.dataset.tipe === selectedTipe) {
                            opt.style.display = "";
                            opt.disabled = false;
                        } else {
                            opt.style.display = "none";
                            opt.disabled = true;
                        }
                    });
                }
            });
        </script>
    @endsection
@endsection