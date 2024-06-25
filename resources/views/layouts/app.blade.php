<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit Wahyu - @yield('title', 'Beranda')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-black: #1a1a1a;
            --secondary-gray: #333333;
            --light-gray: #e0e0e0;
            --off-white: #ffffff;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--off-white);
            color: var(--off-white);
            line-height: 1.6;
            padding-top: 100px; /* Increased to push content down */
        }
        
        .navbar {
            background-color: var(--primary-black);
            box-shadow: 0 2px 10px rgba(0,0,0,.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--off-white) !important;
        }
        
        .nav-link {
            color: var(--light-gray) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-bottom: 2px solid transparent;
        }
        
        .nav-link:hover, .nav-link.active {
            color: #ffffff !important;
            border-bottom: 2px solid #ffffff;
        }
        
        .main-container {
            background-color: #000000;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,.05);
            padding: 2rem;
            margin-top: 2rem;
        }
        
        .footer {
            background-color: var(--primary-black);
            color: var(--light-gray);
            padding: 1.5rem 0;
            margin-top: 3rem;
        }
        
        .alert {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        .btn-primary {
            background-color: var(--secondary-gray);
            border-color: var(--secondary-gray);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-black);
            border-color: var(--primary-black);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,.1);
        }

        /* Table styles */
        .table {
            margin-top: 1rem;
        }

        .table th {
            background-color: var(--secondary-gray);
            color: var(--off-white);
        }

        .table-hover tbody tr:hover {
            background-color: var(--light-gray);
        }
    </style>
    
    @yield('styles')
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Rumah Sakit Wahyu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tipe_kamar*') ? 'active' : '' }}" href="{{ route('tipe_kamar.index') }}">Tipe Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kamar*') ? 'active' : '' }}" href="{{ route('kamar.index') }}">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pasien*') ? 'active' : '' }}" href="{{ route('pasien.index') }}">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('reservasi*') ? 'active' : '' }}" href="{{ route('reservasi.index') }}">Reservasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container flex-grow-1">
        <div class="main-container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="footer mt-auto">
        <div class="container text-center">
            <span>&copy; {{ date('Y') }} Sistem Rumah Sakit Wahyu. All rights reserved.</span>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>