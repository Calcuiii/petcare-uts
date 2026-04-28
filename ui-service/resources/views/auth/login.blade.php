<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare — Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #fdf6ee;
            --brown: #3d1f0d;
            --brown-mid: #7a4528;
            --accent: #e8824a;
            --accent-light: #fde8d8;
            --border: #ede0d4;
            --shadow: 0 4px 24px rgba(61,31,13,0.08);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: #2b1200;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-wrapper {
            display: flex;
            width: 860px;
            min-height: 480px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        /* Panel kiri */
        .left-panel {
            width: 340px;
            background: radial-gradient(ellipse at top left, #e8824a, #c45e28 60%, #2b1200);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2.5rem 2rem;
            flex-shrink: 0;
        }
        .left-panel .brand {
            font-family: 'Playfair Display', serif;
            color: #fff8f0;
            font-size: 1.6rem;
        }
        .left-panel .tagline {
            color: rgba(255,248,240,0.7);
            font-size: 0.88rem;
            line-height: 1.6;
            margin-top: 0.5rem;
        }
        .service-list {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
        }
        .service-item {
            background: rgba(255,248,240,0.1);
            border-radius: 10px;
            padding: 0.6rem 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            color: rgba(255,248,240,0.85);
            font-size: 0.82rem;
        }
        .service-dot {
            width: 7px; height: 7px;
            background: #a8f0b0;
            border-radius: 50%;
            flex-shrink: 0;
        }
        /* Panel kanan */
        .right-panel {
            flex: 1;
            background: var(--cream);
            padding: 2.5rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .right-panel h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.7rem;
            color: var(--brown);
            margin-bottom: 0.3rem;
        }
        .right-panel .sub {
            color: var(--brown-mid);
            font-size: 0.88rem;
            margin-bottom: 1.8rem;
        }
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 0.7rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.2rem;
            font-size: 0.85rem;
        }
        .form-group {
            margin-bottom: 1.1rem;
        }
        .form-group label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--brown-mid);
            margin-bottom: 0.4rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .form-group input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: 'DM Sans', sans-serif;
            background: white;
            color: var(--brown);
            transition: border-color 0.2s;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--accent);
        }
        .btn-submit {
            width: 100%;
            padding: 0.75rem;
            background: var(--brown);
            color: var(--cream);
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: background 0.2s, transform 0.15s;
        }
        .btn-submit:hover {
            background: var(--accent);
            transform: translateY(-1px);
        }
        .register-link {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.85rem;
            color: var(--brown-mid);
        }
        .register-link a {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="login-wrapper">
    <!-- Kiri -->
    <div class="left-panel">
        <div>
            <div class="brand">🐾 PetCare</div>
            <div class="tagline">Platform integrasi layanan perawatan hewan peliharaan Anda.</div>
        </div>
    </div>

    <!-- Kanan -->
    <div class="right-panel">
        <h2>Masuk ke Akun</h2>

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="nama@email.com" required autofocus>
                @error('email')
                    <span style="font-size:0.8rem;color:#991b1b;">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
                @error('password')
                    <span style="font-size:0.8rem;color:#991b1b;">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn-submit">Masuk →</button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </div>
</div>
</body>
</html>