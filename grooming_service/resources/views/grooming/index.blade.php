<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grooming Service</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 via-cyan-50 to-indigo-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header AWAL - KUCING PINK + BLUE GRADIENT -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-4 drop-shadow-2xl">
                <i class="fas fa-cat text-6xl text-pink-400 mr-4 -mb-2"></i>
                <span class="bg-gradient-to-r from-blue-500 to-blue-700 bg-clip-text text-transparent text-6xl">Grooming</span>
                <span class="text-pink-500 text-6xl font-extrabold">Service</span>
            </h1>
            <p class="text-xl text-gray-700 font-semibold bg-blue-100/80 px-8 py-4 rounded-2xl inline-block shadow-xl border-2 border-blue-200">
                🐾 Layanan Perawatan Hewan Profesional
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Form Booking -->
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-blue-100/50 hover:shadow-3xl transition-all duration-300">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    <i class="fas fa-calendar-plus mr-3 text-blue-500 text-2xl"></i>Buat Booking
                </h2>

                @if(session('success'))
                    <div class="bg-green-100 border-2 border-green-400 text-green-800 px-6 py-4 rounded-2xl mb-8 text-center font-semibold shadow-lg animate-pulse">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                <!-- FORM YANG BISA DIPENCET -->
                <form action="/grooming" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">🐕 Nama Hewan</label>
                        <input type="text" name="nama_hewan" required 
                               class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 text-lg shadow-md hover:shadow-lg">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">🐶 Jenis Hewan</label>
                            <input type="text" name="jenis_hewan" required 
                                   class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">📅 Umur (opsional)</label>
                            <input type="number" name="umur" min="0" 
                                   class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">✨ Pilih Layanan</label>
                        <select name="layanan" required class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 text-lg shadow-md hover:shadow-lg">
                            <option value="">Pilih layanan grooming...</option>
                            <option value="Memandikan (Bathing)">🛁 Memandikan (Bathing)</option>
                            <option value="Perawatan Bulu (Brushing & Clipping)">✂️ Perawatan Bulu (Brushing & Clipping)</option>
                            <option value="Pembersihan Telinga (Ear Cleaning)">👂 Pembersihan Telinga (Ear Cleaning)</option>
                            <option value="Pemotongan Kuku (Nail Trimming)">✋ Pemotongan Kuku (Nail Trimming)</option>
                            <option value="Pembersihan Area Mata dan Wajah">👁️ Pembersihan Area Mata dan Wajah</option>
                            <option value="Menyikat Gigi (Teeth Brushing)">🦷 Menyikat Gigi (Teeth Brushing)</option>
                            <option value="Pengeringan (Drying)">💨 Pengeringan (Drying)</option>
                            <option value="Perawatan Tambahan (Opsional/Premium)">⭐ Perawatan Tambahan (Premium)</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">💰 Harga (Rp)</label>
                            <input type="number" name="harga" required min="10000" 
                                   class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">📆 Tanggal</label>
                            <input type="date" name="tanggal" required 
                                   class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">⏰ Jam (opsional)</label>
                        <input type="time" name="jam" 
                               class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">👤 Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" required 
                               class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-3">📱 No. HP</label>
                        <input type="tel" name="no_hp" required pattern="[0-9]{10,13}"
                               class="w-full px-5 py-4 border-2 border-blue-200 rounded-2xl focus:ring-4 focus:ring-blue-200 focus:border-blue-400 transition-all duration-300 shadow-md hover:shadow-lg">
                    </div>

                    <!-- BUTTON BESAR YANG BISA DIPENCET -->
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-pink-500 via-blue-500 to-purple-600 hover:from-pink-600 hover:via-blue-600 hover:to-purple-700 text-white font-black py-6 px-8 rounded-3xl text-xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 hover:scale-[1.02] transition-all duration-300 flex items-center justify-center border-4 border-transparent hover:border-pink-300">
                        <i class="fas fa-rocket text-2xl mr-4 animate-bounce"></i>
                        <span class="tracking-wider">🚀 Booking Sekarang!</span>
                    </button>
                </form>
            </div>

            <!-- Data Table -->
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 border border-blue-100/50 hover:shadow-3xl transition-all duration-300 overflow-hidden">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">
                    <i class="fas fa-table-list mr-3 text-pink-500 text-2xl"></i>Data Booking
                </h2>
                
                <div class="overflow-x-auto rounded-2xl border-2 border-blue-100">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-pink-400 via-blue-400 to-purple-500 text-white">
                                <th class="px-6 py-5 text-left rounded-tl-2xl font-black text-lg">🐕 Hewan</th>
                                <th class="px-6 py-5 text-left font-black text-lg">✨ Layanan</th>
                                <th class="px-6 py-5 text-left font-black text-lg">📅 Tanggal</th>
                                <th class="px-6 py-5 text-left font-black text-lg">💰 Harga</th>
                                <th class="px-6 py-5 text-left rounded-tr-2xl font-black text-lg">👤 Pemilik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($groomings as $grooming)
                            <tr class="border-b-2 border-blue-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-pink-50 transition-all duration-300">
                                <td class="px-6 py-6 font-bold text-xl text-gray-800">
                                    <div class="flex items-center">
                                        <i class="fas fa-paw text-pink-400 text-2xl mr-3"></i>
                                        <div>
                                            <div class="text-2xl">{{ $grooming->nama_hewan }}</div>
                                            <div class="text-lg text-gray-600">{{ $grooming->jenis_hewan }} • {{ $grooming->umur ?? '-' }} thn</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <span class="px-6 py-3 bg-gradient-to-r from-blue-100 to-pink-100 text-blue-800 rounded-2xl text-lg font-bold shadow-md border-2 border-blue-200">
                                        {{ $grooming->layanan }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-gray-800 font-bold text-xl">
                                    {{ $grooming->tanggal->format('d M Y') }}<br>
                                    <span class="text-lg text-gray-600">{{ $grooming->jam ?? 'Fleksibel' }}</span>
                                </td>
                                <td class="px-6 py-6 font-black text-2xl text-green-600 drop-shadow-lg">
                                    Rp {{ number_format($grooming->harga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-6 font-bold text-lg">
                                    <div class="text-xl">{{ $grooming->nama_pemilik }}</div>
                                    <div class="text-lg text-gray-600">{{ $grooming->no_hp }}</div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center text-gray-500">
                                    <i class="fas fa-inbox text-6xl mb-8 block text-blue-300 animate-bounce"></i>
                                    <div class="text-2xl font-bold mb-2">Belum ada booking</div>
                                    <div class="text-lg">Buat booking pertama sekarang! 🐾</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>