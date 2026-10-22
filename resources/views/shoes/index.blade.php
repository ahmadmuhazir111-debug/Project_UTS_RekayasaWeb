@extends('layouts.app')

@section('title', 'Daftar Sepatu')

@section('hero')
<section class="hero">
    <img src="{{ asset('images/header%20web.jpg') }}" alt="Kolase sepatu dan olahraga MD SportHouse" class="hero-image">
    <div class="container text-start py-4 hero-content">
        <h1 class="display-5 fw-bold">Welcome to MD SportHouse</h1>
        <h5 class="fw-light">Temukan sepatu olahraga favoritmu dengan kualitas dan gaya terbaik. Jelajahi koleksi kami dan temukan sepatu yang cocok untukmu!</h5>
        <p class="lead mb-0">Shop Now, Step Into Greatness.</p>
    </div>
</section>
@endsection

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <h2 class="h4 mb-0">
        Daftar Sepatu
        @if (request('sport'))
        <span class="badge text-bg-primary">{{ request('sport') }}</span>
        @endif
    </h2>
    <div class="btn-group btn-group-sm" role="group">
        <a href="{{ route('shoes.index', request()->only('search')) }}" class="btn btn-outline-dark {{ request('sport') ? '' : 'active' }}">Semua</a>
        @foreach ($sports as $s)
        <a href="{{ route('shoes.index', array_merge(request()->only('search'), ['sport' => $s])) }}"
            class="btn btn-outline-dark {{ request('sport') === $s ? 'active' : '' }}">{{ $s }}</a>
        @endforeach
    </div>
</div>

<form action="{{ route('shoes.index') }}" method="GET" class="row g-2 mb-4">
    @if (request('sport'))
    <input type="hidden" name="sport" value="{{ request('sport') }}">
    @endif
    <div class="col-sm-8 col-md-6 col-lg-5">
        <label for="shoe-search" class="visually-hidden">Cari sepatu</label>
        <input id="shoe-search" type="search" name="search" value="{{ request('search') }}"
            class="form-control" placeholder="Cari nama, merek, atau kategori...">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Cari</button>
        @if (request('search'))
        <a href="{{ route('shoes.index', request('sport') ? ['sport' => request('sport')] : []) }}" class="btn btn-outline-secondary">Reset</a>
        @endif
    </div>
</form>

<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
    @forelse ($shoes as $shoe)
    <div class="col">
        <div class="card shoe-card h-100 border-0 shadow-sm">
            @if ($shoe->image)
            <img src="{{ asset('images/' . rawurlencode($shoe->image)) }}" class="card-img-top" alt="{{ $shoe->name }}">
            @endif
            <div class="card-body d-flex flex-column">
                <span class="badge text-bg-secondary align-self-start mb-2">{{ $shoe->sport_type }}</span>
                <h5 class="card-title mb-1">{{ $shoe->name }}</h5>
                <p class="text-muted small mb-2">{{ $shoe->brand }}</p>
                <p class="fw-bold text-primary mb-3">Rp {{ number_format($shoe->price, 0, ',', '.') }}</p>
                <a href="{{ route('shoes.show', $shoe) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-warning">
            @if (request('search'))
            Tidak ada sepatu yang cocok dengan pencarian "{{ request('search') }}".
            @else
            Belum ada data sepatu. Jalankan <code>php artisan migrate --seed</code>.
            @endif
        </div>
    </div>
    @endforelse
</div>

@if ($shoes->hasPages())
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mt-4">
    <small class="text-muted">Menampilkan {{ $shoes->firstItem() }}–{{ $shoes->lastItem() }} dari {{ $shoes->total() }} sepatu</small>
    {{ $shoes->links() }}
</div>
@endif
@endsection
