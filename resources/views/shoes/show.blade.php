@extends('layouts.app')

@section('title', $shoe->name)

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('shoes.index') }}">Daftar Sepatu</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $shoe->name }}</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm">
        <div class="row g-0">
            <div class="col-md-6 bg-light d-flex align-items-center justify-content-center p-3">
                @if ($shoe->image)
                <img src="{{ asset('images/' . rawurlencode($shoe->image)) }}" class="img-fluid" alt="{{ $shoe->name }}">
                @endif
            </div>
            <div class="col-md-6">
                <div class="card-body p-4">
                    <span class="badge text-bg-primary mb-2">{{ $shoe->sport_type }}</span>
                    <h1 class="h3">{{ $shoe->name }}</h1>
                    <p class="text-muted">{{ $shoe->brand }}</p>
                    <h2 class="h4 text-primary mb-4">Rp {{ number_format($shoe->price, 0, ',', '.') }}</h2>

                    <table class="table table-sm">
                        <tbody>
                            <tr><th style="width: 40%">Merek</th><td>{{ $shoe->brand }}</td></tr>
                            <tr><th>Jenis Olahraga</th><td>{{ $shoe->sport_type }}</td></tr>
                            <tr><th>Rentang Ukuran</th><td>{{ $shoe->size_range }}</td></tr>
                            <tr><th>Harga</th><td>Rp {{ number_format($shoe->price, 0, ',', '.') }}</td></tr>
                        </tbody>
                    </table>

                    <a href="{{ route('shoes.index') }}" class="btn btn-secondary">&larr; Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
