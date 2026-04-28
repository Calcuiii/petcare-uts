<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare — Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cream: #fdf6ee; --brown: #3d1f0d; --accent: #e8824a; --accent-glow: #f8d7b7;
            --gradient-main: linear-gradient(135deg, #fdf6ee 0%, #f5e8d3 100%);
            --gradient-accent: linear-gradient(135deg, #e8824a 0%, #f4a261 100%);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'DM Sans', sans-serif; 
            background: var(--gradient-main); 
            min-height: 100vh; overflow-x: hidden;
        }

        /* NAVBAR - Minimal */
        .navbar {
            background: rgba(61,31,13,0.97); backdrop-filter: blur(25px);
            padding: 1.2rem 2rem; display: flex; justify-content: space-between; align-items: center;
            color: white; position: sticky; top: 0; z-index: 100; box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .brand { 
            font-family: 'Playfair Display', serif; font-size: 1.7rem; font-weight: 700;
            background: linear-gradient(45deg, #fff, var(--accent-glow));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .logout-btn {
            background: var(--gradient-accent); color: white; border: none;
            padding: 0.7rem 1.5rem; border-radius: 25px; font-weight: 500;
            cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 0.5rem;
        }
        .logout-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(232,130,74,0.4); }

        /* HEADER - Clean & Bold */
        .header { text-align: center; padding: 4rem 2rem 2.5rem; max-width: 700px; margin: 0 auto; }
        .welcome { 
            font-family: 'Playfair Display', serif; font-size: clamp(2.2rem, 6vw, 3.5rem); 
            font-weight: 700; background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 0.8rem;
        }
        .subtitle { 
            color: #7a4528; font-size: 1.15rem; font-weight: 400; opacity: 0.9;
        }

        /* QUICK TIPS - GANTI STATS */
        .quick-tips { 
            display: flex; gap: 1.5rem; justify-content: center; max-width: 800px; 
            margin: 3rem auto; padding: 0 2rem; flex-wrap: wrap;
        }
        .tip-card {
            flex: 1; min-width: 160px; background: rgba(255,255,255,0.92);
            backdrop-filter: blur(20px); padding: 2rem 1.5rem; border-radius: 22px;
            text-align: center; box-shadow: 0 12px 40px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-top: 4px solid var(--accent);
        }
        .tip-card:hover { transform: translateY(-10px); box-shadow: 0 25px 60px rgba(0,0,0,0.2); }
        .tip-icon { 
            font-size: 2.8rem; background: var(--gradient-accent);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            margin-bottom: 1rem; display: block;
        }
        .tip-title { 
            font-size: 1.1rem; font-weight: 700; color: var(--brown); 
            margin-bottom: 0.75rem;
        }
        .tip-text { 
            font-size: 0.9rem; color: #7a4528; line-height: 1.5;
        }

        /* MAIN ACTIONS - 2 BESAR & DRAMATIC */
        .main-actions { 
            display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; 
            max-width: 1000px; margin: 4rem auto; padding: 0 2rem;
        }
        @media (max-width: 768px) { .main-actions { grid-template-columns: 1fr; gap: 2rem; } }

        .action-card {
            background: rgba(255,255,255,0.95); backdrop-filter: blur(25px);
            border-radius: 28px; padding: 3.5rem 2.5rem; text-align: center;
            cursor: pointer; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 15px 50px rgba(0,0,0,0.12); border: 2px solid transparent;
            position: relative; overflow: hidden; min-height: 220px;
        }
        .action-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px;
            background: var(--gradient-accent); transform: scaleX(0); transition: transform 0.4s ease;
        }
        .action-card:hover {
            transform: translateY(-20px) scale(1.02); 
            box-shadow: 0 30px 80px rgba(0,0,0,0.25); border-color: var(--accent);
        }
        .action-card:hover::before { transform: scaleX(1); }
        .action-card.grooming { border-top: 6px solid var(--accent); }
        .action-card.history { border-top: 6px solid #4a90e2; }

        .action-icon { 
            font-size: 4.5rem; background: var(--gradient-accent); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem; display: block;
        }
        .action-card.history .action-icon { 
            background: linear-gradient(135deg, #4a90e2, #357abd); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .action-title { 
            font-family: 'Playfair Display', serif; font-size: 1.8rem; font-weight: 700;
            background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }
        .action-card.history .action-title { 
            background: linear-gradient(45deg, var(--brown), #4a90e2);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .action-desc { 
            font-size: 1.1rem; color: #7a4528; font-weight: 500; line-height: 1.5;
        }

        /* PET FACTS - RANDOM HEWAN INFO */
        .pet-facts { 
            max-width: 700px; margin: 4rem auto; padding: 0 2rem; text-align: center;
        }
        .facts-title { 
            font-family: 'Playfair Display', serif; font-size: 1.4rem; 
            color: var(--brown); margin-bottom: 2rem; opacity: 0.95;
        }
        .facts-grid { 
            display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;
        }
        .fact-badge {
            padding: 1.2rem 1.8rem; border-radius: 25px; font-weight: 600; font-size: 0.95rem;
            background: rgba(255,255,255,0.92); backdrop-filter: blur(20px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.1); min-width: 140px;
            transition: all 0.3s ease; border: 1px solid rgba(61,31,13,0.1);
        }
        .fact-badge:hover { transform: translateY(-4px); box-shadow: 0 15px 40px rgba(0,0,0,0.15); }

        /* ANIMATIONS */
        .fade-in-up { 
            opacity: 0; transform: translateY(30px); 
            animation: fadeInUp 0.8s ease forwards;
        }
        .stagger { animation-delay: calc(var(--i) * 0.15s); }
        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .quick-tips { flex-direction: column; align-items: center; }
            .main-actions { grid-template-columns: 1fr; }
            .facts-grid { gap: 1rem; }
        }

        /* SUBTLE CATS */
        .cat { 
            position: fixed; font-size: 2.8rem; z-index: 1; opacity: 0.7;
            filter: drop-shadow(0 4px 12px rgba(0,0,0,0.15));
        }
        .cat-1 { bottom: 12%; left: -120px; animation: walkRight 16s linear infinite; }
        .cat-2 { top: 25%; right: -120px; animation: walkLeft 20s linear infinite 3s; transform: scaleX(-1); }
        @keyframes walkRight { 0% { left: -120px; } 100% { left: 110vw; } }
        @keyframes walkLeft { 0% { right: -120px; } 100% { right: 110vw; } }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="brand">
            <i class="fas fa-paw" style="margin-right: 0.5rem;"></i>
            PetCare
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </form>
    </nav>

    <!-- HEADER -->
    <header class="header">
        <h1 class="welcome fade-in-up" style="--i: 1;">Welcome back, {{ $user['name'] ?? 'Pet Lover' }}!</h1>
        <p class="subtitle fade-in-up" style="--i: 2;">Choose grooming service or check your history</p>
    </header>

    <!-- QUICK TIPS - PENGGANTI STATS -->
    <section class="quick-tips">
        <div class="tip-card fade-in-up stagger" style="--i: 1;">
            <i class="fas fa-paw tip-icon"></i>
            <div class="tip-title">Sikat rutin</div>
            <div class="tip-text">Sikat bulu 2-3x seminggu cegah bulu rontok</div>
        </div>
        <div class="tip-card fade-in-up stagger" style="--i: 2;">
            <i class="fas fa-tint tip-icon"></i>
            <div class="tip-title">Air bersih</div>
            <div class="tip-text">Ganti air minum setiap hari</div>
        </div>
        <div class="tip-card fade-in-up stagger" style="--i: 3;">
            <i class="fas fa-heart tip-icon"></i>
            <div class="tip-title">Cek kesehatan</div>
            <div class="tip-text">Periksa gigi & kuku setiap bulan</div>
        </div>
    </section>

    <!-- MAIN ACTIONS - 2 BESAR -->
    <section class="main-actions">
        <div class="action-card grooming fade-in-up stagger" style="--i: 4;" data-href="/grooming">
            <i class="fas fa-spa action-icon"></i>
            <div class="action-title">Grooming Services</div>
            <div class="action-desc">Browse all available grooming packages and prices</div>
        </div>
        
        <div class="action-card history fade-in-up stagger" style="--i: 5;" data-href="{{ route('bookings.history') }}">
            <i class="fas fa-history action-icon"></i>
            <div class="action-title">Booking History</div>
            <div class="action-desc">View past bookings, status, and invoices</div>
        </div>
    </section>

    <!-- PET FACTS - RANDOM HEWAN INFO -->
    <section class="pet-facts">
        <div class="facts-title fade-in-up" style="--i: 6;">🐾 Fun Pet Facts</div>
        <div class="facts-grid" id="facts-grid">
            <!-- Generated by JS -->
        </div>
    </section>

    <!-- ANIMATED CATS -->
    <div class="cat cat-1">🐈‍⬛</div>
    <div class="cat cat-2">🐱</div>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. CARD NAVIGATION
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('click', () => {
                const href = card.dataset.href;
                if (href) window.location.href = href;
            });
        });

        // 2. PET FACTS - RANDOM HEWAN INFO
        const petFacts = [
            { icon: '🐱', title: 'Kucing', fact: 'Tidur 12-16 jam/hari' },
            { icon: '🐶', title: 'Anjing', fact: 'Hidung selalu basah' },
            { icon: '🐰', title: 'Kelinci', fact: 'Ganti gigi 2x/tahun' },
            { icon: '🐹', title: 'Hamster', fact: 'Pouch pipi 50% berat badan' }
        ];

        const factsGrid = document.getElementById('facts-grid');
        petFacts.forEach((fact, i) => {
            const badge = document.createElement('div');
            badge.className = 'fact-badge fade-in-up stagger';
            badge.style.setProperty('--i', i + 7);
            badge.innerHTML = `
                <div style="font-size: 2rem; margin-bottom: 0.5rem;">${fact.icon}</div>
                <strong>${fact.title}</strong>
                <div style="font-size: 0.85rem; opacity: 0.9; margin-top: 0.25rem;">${fact.fact}</div>
            `;
            factsGrid.appendChild(badge);
        });
    });
    </script>
</body>
</html>