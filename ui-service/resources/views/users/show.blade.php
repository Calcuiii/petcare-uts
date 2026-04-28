@extends('layouts.app')

@section('title', $user['name'])

@section('styles')
<style>
    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        color: var(--brown-mid);
        text-decoration: none;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        transition: color 0.2s;
    }
    .back-link:hover { color: var(--accent); }

    .profile-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: var(--shadow);
        margin-bottom: 2rem;
        display: flex;
        gap: 2rem;
        align-items: flex-start;
    }

    .profile-avatar {
        width: 72px;
        height: 72px;
        background: var(--accent-light);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        flex-shrink: 0;
    }

    .profile-info h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        margin-bottom: 0.25rem;
    }

    .profile-info .uid {
        font-size: 0.8rem;
        color: var(--brown-mid);
        margin-bottom: 1rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
    }

    .info-item label {
        font-size: 0.75rem;
        color: var(--brown-mid);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        display: block;
        margin-bottom: 0.2rem;
    }

    .info-item span {
        font-size: 0.95rem;
        font-weight: 500;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .booking-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .booking-item {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1rem 1.25rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: var(--shadow);
    }

    .booking-pet {
        font-weight: 600;
        font-size: 0.95rem;
    }

    .booking-date {
        font-size: 0.82rem;
        color: var(--brown-mid);
        margin-top: 0.2rem;
    }

    .status-badge {
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: capitalize;
    }

    .status-pending  { background: #fef9c3; color: #854d0e; }
    .status-confirmed { background: #dcfce7; color: #166534; }
    .status-done     { background: #e0e7ff; color: #3730a3; }
    .status-cancelled { background: #fee2e2; color: #991b1b; }

    .empty-booking {
        text-align: center;
        padding: 2rem;
        color: var(--brown-mid);
        background: var(--card-bg);
        border: 1px dashed var(--border);
        border-radius: 12px;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
<a href="{{ route('users.index') }}" class="back-link">← Kembali ke daftar user</a>

<div class="profile-card">
    <div class="profile-avatar">🧑</div>
    <div class="profile-info">
        <h2>{{ $user['name'] }}</h2>
        <div class="uid">ID #{{ $user['id'] }}</div>
        <div class="info-grid">
            <div class="info-item">
                <label>Email</label>
                <span>{{ $user['email'] }}</span>
            </div>
            <div class="info-item">
                <label>Telepon</label>
                <span>{{ $user['phone'] }}</span>
            </div>
            <div class="info-item">
                <label>Alamat</label>
                <span>{{ $user['address'] }}</span>
            </div>
            <div class="info-item">
                <label>Terdaftar sejak</label>
                <span>{{ \Carbon\Carbon::parse($user['created_at'])->format('d M Y') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="section-title">📋 Histori Booking</div>

@if(count($bookings) > 0)
    <div class="booking-list">
        @foreach($bookings as $booking)
            <div class="booking-item">
                <div>
                    <div class="booking-pet">🐾 {{ $booking['pet_name'] }} ({{ $booking['pet_type'] }})</div>
                    <div class="booking-date">{{ \Carbon\Carbon::parse($booking['booking_date'])->format('d M Y') }}</div>
                </div>
                <span class="status-badge status-{{ $booking['status'] }}">
                    {{ $booking['status'] }}
                </span>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-booking">Belum ada riwayat booking untuk user ini.</div>
@endif
@endsection