<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐾 PetCare — @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #fdf6ee;
            --brown: #3d1f0d;
            --brown-mid: #7a4528;
            --accent: #e8824a;
            --accent-light: #fde8d8;
            --green: #4a7c59;
            --card-bg: #ffffff;
            --border: #ede0d4;
            --shadow: 0 4px 24px rgba(61,31,13,0.08);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--brown);
            min-height: 100vh;
        }

        nav {
            background: var(--brown);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        nav .logo {
            font-family: 'Playfair Display', serif;
            color: var(--cream);
            font-size: 1.4rem;
            text-decoration: none;
        }

        nav a {
            color: rgba(253,246,238,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        nav a:hover { color: var(--cream); }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        @yield('styles')
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('users.index') }}" class="logo">🐾 PetCare</a>
        <a href="{{ route('users.index') }}">Users</a>
        <a href="{{ route('bookings.history') }}">Histori Booking</a>
    </nav>

    <div class="container">
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>