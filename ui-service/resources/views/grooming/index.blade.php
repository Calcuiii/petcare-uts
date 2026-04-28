<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare — Grooming Services</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cream: #fdf6ee; --brown: #3d1f0d; --accent: #e8824a; --accent-glow: #f8d7b7;
            --success: #7ed321; --gradient-main: linear-gradient(135deg, #fdf6ee 0%, #f5e8d3 100%);
            --gradient-accent: linear-gradient(135deg, #e8824a 0%, #f4a261 100%);
            --shadow-light: 0 12px 40px rgba(0,0,0,0.1); --shadow-hover: 0 25px 60px rgba(0,0,0,0.2);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: var(--gradient-main); min-height: 100vh; }

        /* NAVBAR */
        .navbar {
            background: rgba(61,31,13,0.97); backdrop-filter: blur(25px);
            padding: 1.2rem 2rem; display: flex; justify-content: space-between; align-items: center;
            color: white; position: sticky; top: 0; z-index: 100; box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .brand { 
            font-family: 'Playfair Display', serif; font-size: 1.7rem; font-weight: 700;
            background: linear-gradient(45deg, #fff, var(--accent-glow)); -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-actions { display: flex; gap: 1rem; align-items: center; }
        .back-btn, .booking-btn {
            padding: 0.7rem 1.5rem; border-radius: 25px; font-weight: 500; cursor: pointer;
            border: none; transition: all 0.3s ease; display: flex; align-items: center; gap: 0.5rem;
        }
        .back-btn { 
            background: rgba(255,255,255,0.2); color: white; 
        }
        .back-btn:hover { background: rgba(255,255,255,0.3); transform: translateY(-1px); }
        .booking-btn { 
            background: var(--gradient-accent); color: white; font-weight: 600;
        }
        .booking-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(232,130,74,0.4); }
        .logout-btn { 
            background: rgba(231,76,60,0.9); color: white; padding: 0.7rem 1.2rem; 
            border-radius: 20px; font-size: 0.9rem;
        }

        /* HEADER */
        .header {
            text-align: center; padding: 4rem 2rem 3rem; max-width: 900px; margin: 0 auto;
        }
        .page-title { 
            font-family: 'Playfair Display', serif; font-size: clamp(2.5rem, 7vw, 4rem); 
            font-weight: 700; background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem;
        }
        .page-subtitle { 
            color: #7a4528; font-size: 1.25rem; font-weight: 400; max-width: 600px; margin: 0 auto;
        }

        /* FILTERS */
        .filters {
            max-width: 900px; margin: 2rem auto; padding: 0 2rem; display: flex; gap: 1rem;
            flex-wrap: wrap; justify-content: center; align-items: center;
        }
        .filter-btn {
            padding: 0.8rem 1.5rem; border-radius: 25px; border: 2px solid rgba(122,69,40,0.3);
            background: rgba(255,255,255,0.8); backdrop-filter: blur(10px); cursor: pointer;
            font-weight: 500; transition: all 0.3s ease; white-space: nowrap;
        }
        .filter-btn.active, .filter-btn:hover {
            background: var(--gradient-accent); color: white; border-color: var(--accent);
            transform: translateY(-2px); box-shadow: 0 8px 25px rgba(232,130,74,0.3);
        }

        /* SERVICES GRID */
        .services-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem; max-width: 1200px; margin: 3rem auto; padding: 0 2rem;
        }
        .service-card {
            background: rgba(255,255,255,0.95); backdrop-filter: blur(25px);
            border-radius: 24px; padding: 2.5rem 2rem; text-align: center;
            box-shadow: var(--shadow-light); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent; position: relative; overflow: hidden;
            cursor: pointer; min-height: 380px; display: flex; flex-direction: column;
        }
        .service-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px;
            background: var(--gradient-accent); transform: scaleX(0); transition: transform 0.4s ease;
        }
        .service-card:hover {
            transform: translateY(-15px) scale(1.02); box-shadow: var(--shadow-hover);
            border-color: var(--accent);
        }
        .service-card:hover::before { transform: scaleX(1); }

        .service-icon { 
            font-size: 4rem; background: var(--gradient-accent); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }
        .service-name { 
            font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 700;
            color: var(--brown); margin-bottom: 1rem;
        }
        .service-desc { 
            color: #7a4528; font-size: 1rem; line-height: 1.6; margin-bottom: 1.5rem;
            flex-grow: 1;
        }
        .service-price { 
            font-size: 2.2rem; font-weight: 700; color: var(--accent); 
            margin-bottom: 1.5rem;
        }
        .service-duration { 
            color: #7a4528; font-size: 0.95rem; margin-bottom: 2rem; opacity: 0.8;
        }
        .service-cta {
            background: var(--gradient-accent); color: white; border: none;
            padding: 1rem 2.5rem; border-radius: 25px; font-weight: 600; font-size: 1.1rem;
            cursor: pointer; transition: all 0.3s ease; width: 100%;
        }
        .service-cta:hover {
            transform: translateY(-3px); box-shadow: 0 12px 35px rgba(232,130,74,0.4);
        }

        /* EMPTY STATE */
        .empty-state {
            grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;
        }
        .empty-icon { font-size: 6rem; color: #ddd; margin-bottom: 2rem; }
        .empty-title { font-size: 1.8rem; color: var(--brown); margin-bottom: 1rem; }
        .empty-desc { color: #7a4528; font-size: 1.1rem; max-width: 500px; margin: 0 auto 2rem; }

        /* ANIMATIONS */
        .fade-in-up { opacity: 0; transform: translateY(40px); animation: fadeInUp 0.8s ease forwards; }
        .stagger { animation-delay: calc(var(--i) * 0.12s); }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .filters { flex-direction: column; gap: 0.8rem; }
            .services-grid { grid-template-columns: 1fr; gap: 2rem; }
            .nav-actions { gap: 0.5rem; }
            .back-btn, .booking-btn { padding: 0.6rem 1.2rem; font-size: 0.9rem; }
        }

        /* LOADING */
        .loading { display: flex; justify-content: center; align-items: center; padding: 4rem; }
        .spinner { 
            width: 40px; height: 40px; border: 4px solid #f3f3f3; 
            border-top: 4px solid var(--accent); border-radius: 50%; 
            animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="brand">
            <i class="fas fa-paw" style="margin-right: 0.5rem;"></i>
            Grooming Services
        </div>
        <div class="nav-actions">
            <button class="back-btn" onclick="window.history.back()">
                <i class="fas fa-arrow-left"></i> Back
            </button>
            <button class="booking-btn" onclick="window.location.href='/booking'">
                <i class="fas fa-calendar-check"></i> My Bookings
            </button>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </nav>

    <!-- HEADER -->
    <header class="header">
        <h1 class="page-title fade-in-up" style="--i: 1;">Grooming Services</h1>
        <p class="page-subtitle fade-in-up" style="--i: 2;">
            Perawatan profesional lengkap untuk sahabat berbulu Anda
        </p>
    </header>

    <!-- FILTERS -->
    <div class="filters">
        <button class="filter-btn active" data-category="all">Semua Layanan</button>
        <button class="filter-btn" data-category="basic">Perawatan Dasar</button>
        <button class="filter-btn" data-category="grooming">Perawatan Bulu</button>
        <button class="filter-btn" data-category="hygiene">Kebersihan</button>
        <button class="filter-btn" data-category="premium">Premium</button>
    </div>

    <!-- SERVICES -->
    <section class="services-grid" id="services-grid">
        <!-- Dynamic content loaded via JS -->
        <div class="loading fade-in-up">
            <div class="spinner"></div>
        </div>
    </section>

    <script>
    const GROOMING_API = 'http://127.0.0.1:8000/api/groomings';
    const token = sessionStorage.getItem('auth_token') || localStorage.getItem('auth_token');
    const groomingServices = [
            {id: 1, name: 'Memandikan (Bathing)', category: 'basic', description: 'Pembersihan menyeluruh menggunakan shampoo premium hypoallergenic dan conditioner berkualitas tinggi untuk menjaga kelembaban kulit', price: 75000, duration: 30, icon: '🛁'},
            {id: 2, name: 'Perawatan Bulu (Brushing & Clipping)', category: 'grooming', description: 'Sisiran menyeluruh dan pemangkasan bulu sesuai standar breed untuk menjaga kesehatan dan penampilan bulu', price: 85000, duration: 45, icon: '✂️'},
            {id: 3, name: 'Pembersihan Telinga (Ear Cleaning)', category: 'hygiene', description: 'Pembersihan telinga profesional dengan larutan khusus untuk mencegah infeksi dan bau tidak sedap', price: 45000, duration: 15, icon: '👂'},
            {id: 4, name: 'Pemotongan Kuku (Nail Trimming)', category: 'hygiene', description: 'Pemotongan kuku yang aman dan presisi untuk mencegah cedera dan menjaga kenyamanan berjalan', price: 40000, duration: 20, icon: '💅'},
            {id: 5, name: 'Pembersihan Area Mata dan Wajah', category: 'hygiene', description: 'Pembersihan lembut area mata dan wajah untuk mencegah iritasi dan menjaga kebersihan wajah', price: 35000, duration: 15, icon: '👁️'},
            {id: 6, name: 'Menyikat Gigi (Teeth Brushing)', category: 'hygiene', description: 'Perawatan gigi dengan pasta khusus hewan peliharaan untuk mencegah plak dan menjaga napas segar', price: 50000, duration: 20, icon: '🦷'},
            {id: 7, name: 'Pengeringan (Drying)', category: 'basic', description: 'Pengeringan profesional dengan hand dryer berkualitas tinggi untuk bulu yang lembut dan fluffy', price: 45000, duration: 25, icon: '💨'},
            {id: 8, name: 'Perawatan Tambahan (Opsional/Premium)', category: 'premium', description: 'Perawatan spa premium termasuk aromaterapi, masker wajah, dan parfum khusus hewan peliharaan', price: 125000, duration: 60, icon: '👑'}
        ];
        function displayServices(services, category) {
            const grid = document.getElementById('services-grid');
            const filtered = category === 'all' ? services : services.filter(s => s.category === category);
            
            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state fade-in-up">
                        <div class="empty-icon">🛁</div>
                        <h2 class="empty-title">Layanan Tidak Ditemukan</h2>
                        <p class="empty-desc">Tidak ada layanan grooming yang sesuai dengan pilihan Anda. Coba kategori lain.</p>
                        <button class="filter-btn" onclick="loadServices('all')">Tampilkan Semua Layanan</button>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map((service, i) => `
                <div class="service-card fade-in-up stagger" style="--i: ${i + 1};" 
                    onclick="bookService(${service.id}, '${service.name.replace(/'/g, "\\'")}', ${service.price})">
                    <div class="service-icon" style="font-size: 4rem; margin-bottom: 1.5rem;">
                        ${service.icon}
                    </div>
                    <h3 class="service-name">${service.name}</h3>
                    <div class="service-desc">${service.description}</div>
                    <div class="service-price">Rp ${service.price.toLocaleString('id-ID')}</div>
                    <div class="service-duration">
                        ⏱️ ${service.duration} menit
                    </div>
                    <button class="service-cta">
                        📅 Pesan Sekarang
                    </button>
                </div>
            `).join('');
        }

        // **FUNGSI 2: Load dari API atau fallback**
        async function loadServices(category = 'all') {
            const grid = document.getElementById('services-grid');
            grid.innerHTML = '<div class="loading"><div class="spinner"></div></div>';

            try {
                const res = await fetch(GROOMING_API, {
                    headers: token ? { 'Authorization': `Bearer ${token}` } : {}
                });
                
                if (res.ok) {
                    const services = await res.json();
                    displayServices(services, category);
                } else {
                    displayServices(groomingServices, category);
                }
            } catch (error) {
                console.warn('API unavailable, using local data');
                displayServices(groomingServices, category);
            }
        }

        // **FUNGSI 3: Booking**
        function bookService(id, name, price) {
            const query = new URLSearchParams({
                service_id: id,
                service_name: name,
                price: price
            });
            window.location.href = `/booking?${query}`;
        }

        // **EVENT LISTENERS**
        document.addEventListener('DOMContentLoaded', () => {
            loadServices('all');
            
            // Filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.querySelector('.filter-btn.active').classList.remove('active');
                    btn.classList.add('active');
                    loadServices(btn.dataset.category);
                });
            });
        });
    </script>
</body>
</html>