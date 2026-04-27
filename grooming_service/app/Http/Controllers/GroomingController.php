<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroomingController extends Controller
{
    public function index()
    {
        $groomings = Grooming::orderBy('created_at', 'desc')->get();
        $layanan = [
            'Memandikan (Bathing)',
            'Perawatan Bulu (Brushing & Clipping)',
            'Pembersihan Telinga (Ear Cleaning)',
            'Pemotongan Kuku (Nail Trimming)',
            'Pembersihan Area Mata dan Wajah',
            'Menyikat Gigi (Teeth Brushing)',
            'Pengeringan (Drying)',
            'Perawatan Tambahan (Opsional/Premium)'
        ];
        return view('grooming.index', compact('groomings', 'layanan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_hewan' => 'required',
            'jenis_hewan' => 'required',
            'umur' => 'nullable|integer',
            'layanan' => 'required',
            'harga' => 'required|integer',
            'tanggal' => 'required|date',
            'jam' => 'nullable',
            'nama_pemilik' => 'required',
            'no_hp' => 'required|numeric'
        ]);

        Grooming::create($request->all());
        return redirect('/grooming')->with('success', 'Booking berhasil!');
    }
}