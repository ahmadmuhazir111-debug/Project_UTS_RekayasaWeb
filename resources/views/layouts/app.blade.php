<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MD SportHouse') - Toko Sepatu Sport</title>
    <link href="{{ asset('Bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .hero {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 320px;
            max-height: 520px;
            aspect-ratio: 2064 / 512;
            overflow: hidden;
            background: linear-gradient(135deg, #212529 0%, #0d6efd 100%);
            color: #fff;
        }
        .hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(3, 20, 42, .5), rgba(3, 20, 42, .12), rgba(3, 20, 42, .38));
        }
        .hero-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .8);
        }
        .hero-content h1 { font-size: clamp(2rem, 4vw, 4rem); }
        @media (max-width: 575.98px) {
            .hero { min-height: 260px; }
        }
        .shoe-card img { height: 200px; object-fit: contain; background: #f1f3f5; }
        .shoe-card { transition: transform .15s ease, box-shadow .15s ease; }
        .shoe-card:hover { transform: translateY(-4px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.15); }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('shoes.index') }}">MD SportHouse</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('shoes.index') ? 'active' : '' }}" href="{{ route('shoes.index') }}">Daftar Sepatu</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Olahraga</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @foreach (\App\Models\Shoe::select('sport_type')->distinct()->orderBy('sport_type')->pluck('sport_type') as $s)
                                <li><a class="dropdown-item" href="{{ route('shoes.index', ['sport' => $s]) }}">{{ $s }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('hero')

    <main class="container py-4 flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-dark text-light py-3 mt-auto">
        <div class="container d-flex flex-column flex-md-row justify-content-between small">
            <span>&copy; 2026 MD SportHouse - Toko Sepatu Sport</span>
            <span>UTS Rekayasa Web - NIM 251011700924 - Universitas Pamulang</span>
        </div>
    </footer>

    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
