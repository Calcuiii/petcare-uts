@extends('layouts.app')

@section('title', 'Daftar User')

@section('styles')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--brown);
    }

    .page-header p {
        color: var(--brown-mid);
        font-size: 0.9rem;
        margin-top: 0.25rem;
    }

    .badge-count {
        background: var(--accent-light);
        color: var(--accent);
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .user-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.25rem;
    }

    .user-card {
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        text-decoration: none;
        color: inherit;
        display: block;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: var(--shadow);
    }

    .user-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(61,31,13,0.12);
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        background: var(--accent-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        margin-bottom: 1rem;
    }

    .user-name {
        font-weight: 600;
        font-size: 1.05rem;
        margin-bottom: 0.25rem;
    }

    .user-email {
        color: var(--brown-mid);
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
    }

    .user-meta {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .meta-chip {
        background: var(--cream);
        border: 1px solid var(--border);
        padding: 0.25rem 0.6rem;
        border-radius: 6px;
        font-size: 0.78rem;
        color: var(--brown-mid);
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--brown-mid);
    }

    .empty-state span {
        font-size: 3rem;
        display: block;
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h1>Daftar User</h1>
        <p>Data dari UserService (port 8001)</p>
    </div>
    <span class="badge-count">{{ count($users) }} user</span>
</div>

@if(count($users) > 0)
    <div class="user-grid">
        @foreach($users as $user)
            <a href="{{ route('users.show', $user['id']) }}" class="user-card">
                <div class="user-avatar">🧑</div>
                <div class="user-name">{{ $user['name'] }}</div>
                <div class="user-email">{{ $user['email'] }}</div>
            </a>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <span>🐾</span>
        <p>Belum ada user terdaftar.</p>
    </div>
@endif
@endsection