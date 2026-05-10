<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Booking — PetCare</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cream: #fdf6ee; --brown: #3d1f0d; --accent: #e8824a; --accent-glow: #f8d7b7;
            --gradient-main: linear-gradient(135deg, #fdf6ee 0%, #f5e8d3 100%);
            --gradient-accent: linear-gradient(135deg, #e8824a 0%, #f4a261 100%);
            --shadow-light: 0 12px 40px rgba(0,0,0,0.1); --shadow-hover: 0 25px 60px rgba(0,0,0,0.2);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'DM Sans', sans-serif; 
            background: var(--gradient-main); 
            color: var(--brown);
            min-height: 100vh; 
            padding: 1.5rem;
        }

        /* TOPBAR - DASHBOARD LOGO */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 20px;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
        }
        .logo:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }
        .back-link {
            font-size: 0.9rem;
            color: rgba(61,31,13,0.8);
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border: 1px solid rgba(61,31,13,0.2);
            border-radius: 25px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .back-link:hover { 
            background: rgba(248,215,183,0.3);
            border-color: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(232,130,74,0.2);
        }

        /* CONTENT - CENTERED */
        .content {
            max-width: 800px;
            margin: 0 auto;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .page-sub {
            font-size: 1.05rem;
            color: rgba(61,31,13,0.75);
            margin-bottom: 1.5rem;
            text-align: center;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }
        .count-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: rgba(232,130,74,0.15);
            color: var(--accent);
            padding: 0.75rem 1.75rem;
            border-radius: 25px;
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 2rem;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(232,130,74,0.25);
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        /* FILTER BAR */
        .filter-bar {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            justify-content: center;
            background: rgba(255,255,255,0.9);
            padding: 1rem 1.5rem;
            border-radius: 28px;
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }
        .fbtn {
            padding: 0.75rem 1.5rem;
            border-radius: 22px;
            border: 1px solid rgba(61,31,13,0.15);
            background: rgba(255,255,255,0.7);
            color: rgba(61,31,13,0.85);
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            font-family: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .fbtn:hover { 
            background: rgba(248,215,183,0.4);
            border-color: var(--accent);
            transform: translateY(-1px);
            color: var(--accent);
        }
        .fbtn.active {
            background: var(--gradient-accent);
            color: white;
            border-color: var(--accent);
            box-shadow: 0 8px 25px rgba(232,130,74,0.3);
            transform: translateY(-2px);
        }

        /* BOOKING LIST */
        .booking-list { 
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        .card {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(61,31,13,0.1);
            border-radius: 22px;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 1.5rem;
            align-items: start;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-accent);
            border-radius: 22px 22px 0 0;
        }
        .card:hover { 
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .card-id {
            font-size: 0.8rem;
            color: rgba(61,31,13,0.7);
            font-family: 'SF Mono', monospace;
            font-weight: 700;
            margin-bottom: 0.75rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .card-service {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }
        .card-pet {
            font-size: 1rem;
            color: rgba(61,31,13,0.85);
            margin-bottom: 1.25rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .chips {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-bottom: 1.25rem;
        }
        .chip {
            background: rgba(248,215,183,0.4);
            border: 1px solid rgba(232,130,74,0.3);
            padding: 0.5rem 1rem;
            border-radius: 18px;
            font-size: 0.85rem;
            color: var(--brown);
            font-weight: 600;
            backdrop-filter: blur(10px);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.6rem 1.25rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: capitalize;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .status-pending { 
            background: linear-gradient(135deg, #fef9c3, #fde68a); 
            color: #854d0e; 
        }
        .status-confirmed { 
            background: linear-gradient(135deg, #dcfce7, #a7f3d0); 
            color: #166534; 
        }
        .status-done { 
            background: linear-gradient(135deg, #e0e7ff, #bfdbfe); 
            color: #3730a3; 
        }
        .status-cancelled { 
            background: linear-gradient(135deg, #fee2e2, #fca5a5); 
            color: #991b1b; 
        }

        .price {
            font-size: 1.45rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--accent), #f4a261);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            white-space: nowrap;
            text-align: right;
            font-family: 'SF Mono', monospace;
            letter-spacing: -0.02em;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 4.5rem 3rem;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(25px);
            border: 2px dashed rgba(61,31,13,0.15);
            border-radius: 25px;
            max-width: 450px;
            margin: 3rem auto;
            box-shadow: var(--shadow-light);
        }
        .empty-icon { 
            font-size: 4rem; 
            background: linear-gradient(135deg, var(--accent-glow), rgba(232,130,74,0.3));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem; 
        }
        .empty-state h2 { 
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem; 
            margin-bottom: 1rem; 
            font-weight: 800;
        }
        .empty-state p { 
            font-size: 1rem; 
            color: rgba(61,31,13,0.75); 
            margin-bottom: 2rem; 
        }
        .empty-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: var(--gradient-accent);
            color: white;
            padding: 1rem 2.25rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 800;
            font-size: 0.95rem;
            box-shadow: 0 12px 40px rgba(232,130,74,0.4);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .empty-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 55px rgba(232,130,74,0.5);
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            body { padding: 1rem; }
            .topbar { flex-direction: column; gap: 1rem; }
            .page-title { font-size: 2rem; }
            .card { grid-template-columns: 1fr; gap: 1.25rem; padding: 1.75rem; }
            .price { text-align: left; margin-top: 1rem; }
            .filter-bar { flex-direction: column; align-items: center; }
            .fbtn { width: 220px; justify-content: center; }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
    </div>

    <div class="content">
        <h1 class="page-title">Histori Booking</h1>
        <p class="page-sub">Riwayat pemesanan layanan grooming peliharaan Anda</p>
        <div class="count-badge">
            <i class="fas fa-list"></i> {{ count($bookings) }} booking
        </div>

        <div class="filter-bar">
            <button class="fbtn active" onclick="filterBookings('all', this)">
                <i class="fas fa-list"></i> Semua
            </button>
            <button class="fbtn" onclick="filterBookings('pending', this)">
                <i class="fas fa-clock"></i> Pending
            </button>
            <button class="fbtn" onclick="filterBookings('confirmed', this)">
                <i class="fas fa-check-circle"></i> Confirmed
            </button>
            <button class="fbtn" onclick="filterBookings('done', this)">
                <i class="fas fa-star"></i> Done
            </button>
            <button class="fbtn" onclick="filterBookings('cancelled', this)">
                <i class="fas fa-times-circle"></i> Cancelled
            </button>
        </div>

        <div class="booking-list" id="bookingList">
            @if(count($bookings) > 0)
                @foreach($bookings as $booking)
                <div class="card" data-status="{{ $booking['status'] }}">
                    <div>
                        <div class="card-id">#{{ str_pad($booking['id'], 5, '0', STR_PAD_LEFT) }}</div>
                        <div class="card-service">
                            🛁 {{ $booking['grooming']['name'] ?? 'Layanan #' . $booking['grooming_id'] }}
                        </div>
                        <div class="card-pet">
                            🐾 {{ $booking['pet_name'] }} — {{ $booking['pet_type'] }}
                        </div>
                        <div class="chips">
                            <span class="chip">
                                <i class="fas fa-calendar-check"></i>
                                {{ \Carbon\Carbon::parse($booking['booking_date'])->format('d M Y') }}
                            </span>
                            @if(isset($booking['grooming']['duration']))
                            <span class="chip">
                                <i class="fas fa-stopwatch"></i>
                                {{ $booking['grooming']['duration'] }} menit
                            </span>
                            @endif
                        </div>
                        <span class="badge status-{{ $booking['status'] }}">
                            {{ $booking['status'] }}
                        </span>
                    </div>
                    <div class="price">
                        Rp {{ isset($booking['grooming']['price'])
                            ? number_format($booking['grooming']['price'], 0, ',', '.')
                            : '—' }}
                    </div>
                </div>
                @endforeach
            @else
                <div class="empty-state">
                    <div class="empty-icon">🐾</div>
                    <h2>Belum ada riwayat booking</h2>
                    <p>Lengkapi pengalaman grooming pertama untuk peliharaan Anda</p>
                    <a href="{{ route('groomings.index') }}" class="empty-cta">
                        <i class="fas fa-spa"></i> Buat Booking Sekarang
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        function filterBookings(status, btn) {
            // Update active filter
            document.querySelectorAll('.fbtn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Filter cards with animation
            document.querySelectorAll('.card').forEach((card, index) => {
                if (status === 'all' || card.dataset.status === status) {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'grid';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    }, index * 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Stagger animation on load
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1)';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 120);
            });
        });
    </script>
</body>
</html>