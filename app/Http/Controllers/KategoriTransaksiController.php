<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class KategoriTransaksiController extends Controller
{
    protected $database;
    protected $tablename;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'kategori_transaksi';
    }

    public function index()
    {
        $reference = $this->database->getReference($this->tablename);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();

        $categories = [];
        if ($value) {
            foreach ($value as $id => $item) {
                $categories[] = array_merge(['id' => $id], $item);
            }
        }

        return view('admin.kategori.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:150',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'tipe' => $request->tipe,
            'created_at' => now()->toISOString(),
            'updated_at' => now()->toISOString(),
        ];

        $this->database->getReference($this->tablename)->push($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $reference = $this->database->getReference($this->tablename . '/' . $id);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();

        if (!$value) {
            return redirect()->route('admin.kategori.index')->with('error', 'Kategori tidak ditemukan.');
        }

        $kategori = array_merge(['id' => $id], $value);

        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:150',
            'tipe' => 'required|in:pemasukan,pengeluaran',
        ]);

        $data = [
            'nama_kategori' => $request->nama_kategori,
            'tipe' => $request->tipe,
            'updated_at' => now()->toISOString(),
        ];

        $this->database->getReference($this->tablename . '/' . $id)->update($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->database->getReference($this->tablename . '/' . $id)->remove();
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
