@extends('layoutsadmin.app')

@section('title', 'Edit Transaksi')
@section('subtitle', 'Ubah data transaksi')

@section('content')
<div class="px-4 sm:px-8">
    <div class="max-w-2xl mx-auto bg-gradient-card backdrop-blur-sm theme-border border rounded-xl p-6 sm:p-8 animate-fade-in-up">
        
        <form action="{{ route('admin.transaksi.update', $transaksi['id']) }}" method="POST" class="space-y-6" id="transaksiForm">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Tanggal -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal', $transaksi['tanggal']) }}"
                        class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                        required>
                    @error('tanggal') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Tipe -->
                <div>
                    <label class="block text-sm font-medium theme-text-primary mb-2">Tipe</label>
                    <select name="tipe" id="tipeSelect" class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors" required>
                        <option value="pemasukan" {{ old('tipe', $transaksi['tipe']) == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                        <option value="pengeluaran" {{ old('tipe', $transaksi['tipe']) == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                    </select>
                    @error('tipe') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-medium theme-text-primary mb-2">Kategori</label>
                <select name="kategori_id" id="kategoriSelect" class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat['id'] }}" data-tipe="{{ $cat['tipe'] }}" class="kategori-option"
                            {{ old('kategori_id', $transaksi['kategori_id']) == $cat['id'] ? 'selected' : '' }}>
                            {{ $cat['nama_kategori'] }} ({{ ucfirst($cat['tipe']) }})
                        </option>
                    @endforeach
                </select>
                @error('kategori_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Jumlah -->
            <div>
                <label class="block text-sm font-medium theme-text-primary mb-2">Jumlah (Rp)</label>
                <input type="number" name="jumlah" value="{{ old('jumlah', $transaksi['jumlah']) }}"
                    class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                    placeholder="0" min="0" required>
                @error('jumlah') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium theme-text-primary mb-2">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" rows="3"
                    class="w-full px-4 py-2.5 theme-bg-secondary theme-border border rounded-lg focus:outline-none focus:border-blue-400 theme-text-primary transition-colors"
                    placeholder="Catatan tambahan...">{{ old('deskripsi', $transaksi['deskripsi'] ?? '') }}</textarea>
                @error('deskripsi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-3 pt-4">
                <a href="{{ route('admin.transaksi.index') }}" 
                   class="px-4 py-2 theme-border border theme-text-secondary rounded-lg hover:bg-white/5 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                    class="px-6 py-2 bg-gradient-primary text-white font-medium rounded-lg hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                    Update Transaksi
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
            const currentKategori = "{{ $transaksi['kategori_id'] }}"; // Keep current if valid

            let foundSelected = false;

            options.forEach(opt => {
                if (selectedTipe === "" || opt.dataset.tipe === selectedTipe) {
                    opt.style.display = "";
                    opt.disabled = false;
                    if(opt.value === kategoriSelect.value) foundSelected = true;
                } else {
                    opt.style.display = "none";
                    opt.disabled = true;
                    if(opt.selected) opt.selected = false;
                }
            });
            
            // Should select first one if current became invalid, but browser usually handles hidden options well
            // Simplistic approach for edit: rely on user to pick new category if type changed
        }

        tipeSelect.addEventListener('change', filterKategori);
        
        // Initial filter based on current DB value
        filterKategori();
    });
</script>
@endsection
@endsection
