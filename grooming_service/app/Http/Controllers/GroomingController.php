<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use Illuminate\Http\Request;

class GroomingController extends Controller
{
    /**
     * GET semua layanan grooming
     */
    public function index()
    {
        // Kalau database kosong, isi otomatis
        if (Grooming::count() === 0) {

            $data = [
                [
                    'name' => 'Memandikan (Bathing)',
                    'description' => 'Pembersihan menyeluruh menggunakan shampoo premium',
                    'price' => 75000,
                    'duration' => 30
                ],
                [
                    'name' => 'Perawatan Bulu (Brushing & Clipping)',
                    'description' => 'Perawatan bulu agar sehat dan rapi',
                    'price' => 85000,
                    'duration' => 45
                ],
                [
                    'name' => 'Pembersihan Telinga (Ear Cleaning)',
                    'description' => 'Membersihkan telinga untuk mencegah infeksi',
                    'price' => 45000,
                    'duration' => 15
                ],
                [
                    'name' => 'Pemotongan Kuku (Nail Trimming)',
                    'description' => 'Pemotongan kuku yang aman dan nyaman',
                    'price' => 40000,
                    'duration' => 20
                ],
                [
                    'name' => 'Pembersihan Area Mata dan Wajah',
                    'description' => 'Membersihkan area sensitif mata dan wajah',
                    'price' => 35000,
                    'duration' => 15
                ],
                [
                    'name' => 'Menyikat Gigi (Teeth Brushing)',
                    'description' => 'Perawatan gigi untuk menjaga kesehatan mulut',
                    'price' => 50000,
                    'duration' => 20
                ],
                [
                    'name' => 'Pengeringan (Drying)',
                    'description' => 'Pengeringan bulu setelah mandi',
                    'price' => 45000,
                    'duration' => 25
                ],
                [
                    'name' => 'Perawatan Tambahan (Opsional/Premium)',
                    'description' => 'Perawatan ekstra untuk hewan kesayangan',
                    'price' => 125000,
                    'duration' => 60
                ]
            ];

            foreach ($data as $item) {
                Grooming::create($item);
            }
        }

        $groomings = Grooming::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'data' => $groomings
        ]);
    }

    /**
     * GET detail layanan
     */
    public function show($id)
    {
        $grooming = Grooming::find($id);

        if (!$grooming) {
            return response()->json([
                'status' => 'error',
                'message' => 'Layanan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $grooming
        ]);
    }

    /**
     * Tambah layanan (optional)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|integer',
            'duration' => 'required|integer'
        ]);

        $grooming = Grooming::create($request->all());

        return response()->json([
            'status' => 'success',
            'data' => $grooming
        ], 201);
    }
}