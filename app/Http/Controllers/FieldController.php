<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    // 1. READ (Menampilkan Data)
    public function index()
    {
        $fields = Field::all();
        return view('fields.index', compact('fields'));
    }

    // 2. CREATE (Menampilkan Form Tambah)
    public function create()
    {
        return view('fields.create');
    }

    // 3. STORE (Menyimpan Data Baru ke Database)
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Vinyl,Interlock,Rumput Sintetis',
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        // Simpan ke database
        Field::create($request->all());

        // Kembalikan ke halaman index dengan pesan sukses
        return redirect()->route('fields.index')->with('success', 'Data lapangan futsal berhasil ditambahkan!');
    }

    // 4. EDIT (Menampilkan Form Edit)
    public function edit(Field $field)
    {
        return view('fields.edit', compact('field'));
    }

    // 5. UPDATE (Menyimpan Perubahan Data ke Database)
    public function update(Request $request, Field $field)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Vinyl,Interlock,Rumput Sintetis',
            'price_per_hour' => 'required|numeric|min:0',
        ]);

        // Update data
        $field->update($request->all());

        return redirect()->route('fields.index')->with('success', 'Data lapangan futsal berhasil diperbarui!');
    }

    // 6. DELETE (Menghapus Data)
    public function destroy(Field $field)
    {
        $field->delete();
        
        return redirect()->route('fields.index')->with('success', 'Data lapangan berhasil dihapus!');
    }
}