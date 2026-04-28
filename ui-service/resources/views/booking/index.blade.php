<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking — PetCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --cream: #fdf6ee; --brown: #3d1f0d; --accent: #e8824a; --accent-glow: #f8d7b7;
            --success: #7ed321; --danger: #e74c3c;
            --gradient-main: linear-gradient(135deg, #fdf6ee 0%, #f5e8d3 100%);
            --gradient-accent: linear-gradient(135deg, #e8824a 0%, #f4a261 100%);
            --shadow-light: 0 12px 40px rgba(0,0,0,0.1); --shadow-hover: 0 25px 60px rgba(0,0,0,0.2);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'DM Sans', sans-serif; 
            background: var(--gradient-main); 
            min-height: 100vh; padding: 1rem;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(61,31,13,0.97); backdrop-filter: blur(25px);
            padding: 1rem 1.5rem; border-radius: 20px; margin-bottom: 2rem;
            display: flex; justify-content: space-between; align-items: center;
            color: white; box-shadow: var(--shadow-light);
        }
        .brand { 
            font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700;
            background: linear-gradient(45deg, #fff, var(--accent-glow)); 
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .back-btn {
            background: rgba(255,255,255,0.2); color: white; border: none;
            padding: 0.6rem 1.2rem; border-radius: 20px; cursor: pointer;
            display: flex; align-items: center; gap: 0.4rem; font-weight: 500;
            transition: all 0.3s ease;
        }
        .back-btn:hover { background: rgba(255,255,255,0.3); transform: translateY(-1px); }

        /* MAIN CONTAINER */
        .container {
            max-width: 650px; margin: 0 auto; background: rgba(255,255,255,0.95);
            backdrop-filter: blur(25px); border-radius: 28px; padding: 2.5rem;
            box-shadow: var(--shadow-light); position: relative; overflow: hidden;
        }
        .container::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 6px;
            background: var(--gradient-accent);
        }

        /* HEADER */
        .header { text-align: center; margin-bottom: 2.5rem; }
        .page-title { 
            font-family: 'Playfair Display', serif; font-size: 2.2rem; font-weight: 700;
            background: linear-gradient(45deg, var(--brown), var(--accent));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 0.5rem;
        }
        .page-subtitle { color: #7a4528; font-size: 1.1rem; opacity: 0.9; }

        /* SERVICE HIGHLIGHT */
        .service-highlight {
            background: linear-gradient(135deg, #fff4ea 0%, #ffe8d1 100%);
            border: 2px solid rgba(232,130,74,0.3); border-radius: 20px;
            padding: 2rem; text-align: center; margin-bottom: 2.5rem;
            box-shadow: 0 8px 30px rgba(232,130,74,0.15);
        }
        .service-icon { font-size: 3.5rem; margin-bottom: 1rem; }
        .service-name { 
            font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 700;
            color: var(--brown); margin-bottom: 0.5rem;
        }
        .service-price { 
            font-size: 2.2rem; font-weight: 700; color: var(--accent);
            background: var(--gradient-accent); -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .service-duration { color: #7a4528; font-size: 1rem; opacity: 0.8; }

        /* FORM SECTIONS */
        .form-section {
            background: rgba(255,255,255,0.7); border-radius: 16px;
            padding: 1.8rem; margin-bottom: 1.5rem; border: 1px solid rgba(122,69,40,0.1);
        }
        .section-title {
            font-family: 'Playfair Display', serif; font-size: 1.3rem;
            color: var(--brown); margin-bottom: 1.2rem; display: flex; align-items: center; gap: 0.5rem;
        }

        /* FORM INPUTS */
        .form-group { margin-bottom: 1.5rem; }
        .form-label {
            display: block; font-weight: 500; color: var(--brown);
            margin-bottom: 0.5rem; font-size: 0.95rem;
        }
        .form-input, .form-select {
            width: 100%; padding: 1rem 1.2rem; border: 2px solid rgba(122,69,40,0.2);
            border-radius: 14px; font-size: 1rem; font-family: inherit;
            transition: all 0.3s ease; background: rgba(255,255,255,0.9);
        }
        .form-input:focus, .form-select:focus {
            outline: none; border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(232,130,74,0.1);
            transform: translateY(-1px);
        }

        /* SUMMARY */
        .summary {
            background: linear-gradient(135deg, rgba(126,211,33,0.1) 0%, rgba(122,211,33,0.05) 100%);
            border: 2px solid rgba(126,211,33,0.3); border-radius: 20px;
            padding: 1.8rem; margin: 2rem 0; text-align: center;
        }
        .summary-price { 
            font-size: 2.5rem; font-weight: 700; color: var(--success);
            margin: 0.5rem 0; text-shadow: 0 2px 10px rgba(126,211,33,0.3);
        }

        /* CTA BUTTON */
        .cta-button {
            width: 100%; padding: 1.3rem 2rem; border-radius: 20px; border: none;
            font-size: 1.2rem; font-weight: 700; cursor: pointer;
            background: var(--gradient-accent); color: white; position: relative;
            overflow: hidden; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 12px 40px rgba(232,130,74,0.4);
        }
        .cta-button:hover {
            transform: translateY(-4px); box-shadow: 0 20px 60px rgba(232,130,74,0.5);
        }
        .cta-button:active { transform: translateY(-2px); }
        .cta-button:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }

        /* ALERTS */
        .alert {
            padding: 1rem 1.2rem; border-radius: 12px; margin-bottom: 1.5rem;
            font-weight: 500; display: flex; align-items: center; gap: 0.8rem;
        }
        .alert-success { background: rgba(126,211,33,0.15); color: var(--success); border: 1px solid rgba(126,211,33,0.3); }
        .alert-error { background: rgba(231,76,60,0.15); color: var(--danger); border: 1px solid rgba(231,76,60,0.3); }

        /* LOADING */
        .loading { display: none; text-align: center; padding: 2rem; }
        .spinner {
            width: 40px; height: 40px; border: 3px solid #f3f3f3;
            border-top: 3px solid var(--accent); border-radius: 50%;
            animation: spin 1s linear infinite; margin: 0 auto 1rem;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .container { margin: 1rem; padding: 1.5rem; }
            .navbar { margin: 0 1rem 1.5rem; }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="brand">
            <i class="fas fa-paw" style="margin-right: 0.5rem;"></i>
            PetCare Booking
        </div>
        <button class="back-btn" onclick="window.history.back()">
            <i class="fas fa-arrow-left"></i> Kembali
        </button>
    </nav>

    <div class="container">
        <!-- ALERTS -->
        <div id="alertContainer"></div>

        <!-- HEADER -->
        <header class="header">
            <h1 class="page-title">Buat Booking</h1>
            <p class="page-subtitle">Lengkapi data untuk memesan layanan grooming</p>
        </header>

        <!-- SERVICE HIGHLIGHT -->
        <div class="service-highlight" id="serviceHighlight">
            <div class="service-icon">🛁</div>
            <h3 class="service-name" id="serviceName">Memilih Layanan...</h3>
            <div class="service-price" id="servicePrice">Rp 0</div>
            <div class="service-duration" id="serviceDuration">0 menit</div>
        </div>

        <!-- FORM - 100% SESUAI MIGRATION BOOKINGS -->
        <form id="bookingForm">
            <!-- PET INFO - SESUAI MIGRATION -->
            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-paw"></i> Data Hewan Peliharaan</h3>
                <div class="form-group">
                    <label class="form-label">Nama Hewan <span style="color: var(--accent);">*</span></label>
                    <input type="text" id="pet_name" class="form-input" required 
                           placeholder="Contoh: Si Meong" maxlength="100">
                </div>
                <div class="form-group">
                    <label class="form-label">Jenis Hewan <span style="color: var(--accent);">*</span></label>
                    <select id="pet_type" class="form-select" required>
                        <option value="">Pilih jenis hewan...</option>
                        <option value="Kucing">🐱 Kucing</option>
                        <option value="Anjing">🐶 Anjing</option>
                        <option value="Kelinci">🐰 Kelinci</option>
                        <option value="Hamster">🐹 Hamster</option>
                        <option value="Burung">🦜 Burung</option>
                        <option value="Lainnya">🐾 Lainnya</option>
                    </select>
                </div>
            </div>

            <!-- BOOKING DATE - SESUAI MIGRATION -->
            <div class="form-section">
                <h3 class="section-title"><i class="fas fa-calendar-check"></i> Jadwal Booking</h3>
                <div class="form-group">
                    <label class="form-label">Tanggal Booking <span style="color: var(--accent);">*</span></label>
                    <input type="date" id="booking_date" class="form-input" required>
                </div>
            </div>

            <!-- SUMMARY -->
            <div class="summary">
                <div>Total Harga</div>
                <div class="summary-price" id="totalPrice">Rp 0</div>
                <div style="opacity: 0.8;">Tidak ada biaya tambahan</div>
            </div>

            <!-- CTA BUTTON -->
            <button type="submit" class="cta-button" id="submitBtn">
                <i class="fas fa-check-circle"></i> Konfirmasi Booking
            </button>
        </form>

        <!-- LOADING -->
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <div>Memproses booking Anda...</div>
        </div>
    </div>

    <script>
        const userId = {{ isset($user['id']) ? $user['id'] : 'null' }};
        // === INIT PARAMS DARI URL ===
        const params = new URLSearchParams(window.location.search);
        const groomingId = params.get('service_id');  // grooming_id
        const serviceName = params.get('service_name'); 
        const price = parseInt(params.get('price')) || 0;
        const token = sessionStorage.getItem('auth_token') || localStorage.getItem('auth_token');

        // === POPULATE SERVICE INFO ===
        if (serviceName && price && groomingId) {
            document.getElementById('serviceName').textContent = serviceName;
            document.getElementById('servicePrice').textContent = `Rp ${price.toLocaleString('id-ID')}`;
            document.getElementById('totalPrice').textContent = `Rp ${price.toLocaleString('id-ID')}`;
        } else {
            showAlert('❌ Layanan tidak ditemukan. Silakan pilih ulang.', 'error');
            setTimeout(() => window.location.href = '/grooming', 2000);
            throw new Error('Missing service params');
        }

        // === DATE CONFIG ===
        const today = new Date().toISOString().split('T')[0];
        const bookingDateInput = document.getElementById('booking_date');
        bookingDateInput.min = today;
        bookingDateInput.value = today;

        // === FORM SUBMISSION - 100% SESUAI MIGRATION ===
        document.getElementById('bookingForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            if (!userId) {
                showAlert('❌ User tidak terdeteksi. Silakan login ulang.', 'error');
                return;
            }
            // === FORM DATA SESUAI SCHEMA BOOKINGS ===
            const formData = {
                user_id: userId,
                grooming_id: parseInt(groomingId),
                pet_name: document.getElementById('pet_name').value.trim(),
                pet_type: document.getElementById('pet_type').value,
                booking_date: document.getElementById('booking_date').value,
            };

            // === VALIDATION ===
            if (!formData.grooming_id) {
                showAlert('❌ ID layanan tidak valid!', 'error');
                return;
            }
            if (formData.pet_name.length < 2) {
                showAlert('❌ Nama hewan minimal 2 karakter!', 'error');
                return;
            }

            submitBooking(formData);
        });

        // === SUBMIT BOOKING ===
        async function submitBooking(data) {
            const submitBtn = document.getElementById('submitBtn');
            const loading = document.getElementById('loading');
            const alertContainer = document.getElementById('alertContainer');

            // UI Loading
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            loading.style.display = 'block';
            alertContainer.innerHTML = '';

            try {
                const response = await fetch('http://127.0.0.1:8003/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        ...(token && { 'Authorization': `Bearer ${token}` })
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    showAlert(`✅ Booking berhasil! No. Booking: ${result.id || result.booking_id}`, 'success');
                    setTimeout(() => {
                        window.location.href = '/dashboard';
                    }, 2500);
                } else {
                    throw new Error(result.message || 'Gagal membuat booking');
                }
            } catch (error) {
                console.error('Booking error:', error);
                showAlert(`❌ ${error.message}`, 'error');
            } finally {
                // Reset UI
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-check-circle"></i> Konfirmasi Booking';
                loading.style.display = 'none';
            }
        }

        // === ALERT SYSTEM ===
        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            const alert = document.createElement('div');
            alert.className = `alert alert-${type}`;
            alert.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i> ${message}`;
            alertContainer.appendChild(alert);
            
            // Auto remove
            setTimeout(() => {
                if (alert.parentNode) alert.remove();
            }, 5000);
        }
    </script>
</body>
</html>