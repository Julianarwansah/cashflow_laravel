<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    protected $database;
    protected $tablename;
    protected $kategoriTablename;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'transaksi';
        $this->kategoriTablename = 'kategori_transaksi';
    }

    public function index()
    {
        // Fetch Transactions
        $reference = $this->database->getReference($this->tablename);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();

        $transaksis = [];
        if ($value) {
            // Fetch Categories for manual join
            $catRef = $this->database->getReference($this->kategoriTablename);
            $catSnapshot = $catRef->getSnapshot();
            $catValue = $catSnapshot->getValue();

            $categories = [];
            if ($catValue) {
                foreach ($catValue as $id => $item) {
                    $categories[$id] = $item['nama_kategori'] ?? 'Unknown';
                }
            }

            foreach ($value as $id => $item) {
                // Manual Join
                $item['kategori_nama'] = $categories[$item['kategori_id'] ?? ''] ?? '-';
                $transaksis[] = array_merge(['id' => $id], $item);
            }

            // Sort by date desc
            usort($transaksis, function ($a, $b) {
                return strtotime($b['tanggal']) - strtotime($a['tanggal']);
            });
        }

        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $reference = $this->database->getReference($this->kategoriTablename);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();

        $categories = [];
        if ($value) {
            foreach ($value as $id => $item) {
                $categories[] = array_merge(['id' => $id], $item);
            }
        }
        return view('admin.transaksi.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:255',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $data = [
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jumlah' => (float) $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'user_id' => auth()->user()->firebase_uid ?? 'unknown',
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString(),
        ];

        $this->database->getReference($this->tablename)->push($data);

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $reference = $this->database->getReference($this->tablename . '/' . $id);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();

        if (!$value) {
            return redirect()->route('admin.transaksi.index')->with('error', 'Transaksi tidak ditemukan.');
        }

        $transaksi = array_merge(['id' => $id], $value);

        // Fetch categories
        $catRef = $this->database->getReference($this->kategoriTablename);
        $catSnapshot = $catRef->getSnapshot();
        $catValue = $catSnapshot->getValue();

        $categories = [];
        if ($catValue) {
            foreach ($catValue as $catId => $item) {
                $categories[] = array_merge(['id' => $catId], $item);
            }
        }

        return view('admin.transaksi.edit', compact('transaksi', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori_id' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string|max:255',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $data = [
            'tanggal' => $request->tanggal,
            'kategori_id' => $request->kategori_id,
            'jumlah' => (float) $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'updated_at' => now()->toISOString(),
        ];

        $this->database->getReference($this->tablename . '/' . $id)->update($data);

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->database->getReference($this->tablename . '/' . $id)->remove();
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
