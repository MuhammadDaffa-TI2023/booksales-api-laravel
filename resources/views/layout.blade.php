<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Data Buku' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
        }

        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .navbar-brand {
            font-size: 1.3rem;
            letter-spacing: 0.5px;
        }

        .table-hover tbody tr:hover {
            background-color: #dbeafe !important;
            transition: 0.2s ease-in;
        }

        .card {
            border-radius: 16px;
            overflow: hidden;
        }

        footer {
            background: transparent;
            color: #6c757d;
            padding: 12px 0;
            font-size: 0.9rem;
        }

        footer small {
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body>
    <!-- 🔹 Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">📚 BookSales</a>
            <div>
                <a href="{{ url('/genre') }}" class="btn btn-outline-light btn-sm me-2 px-3">Genre</a>
                <a href="{{ url('/author') }}" class="btn btn-outline-light btn-sm px-3">Author</a>
            </div>
        </div>
    </nav>

    <!-- 🔹 Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- 🔹 Footer -->
    <footer class="text-center mt-5">
        <small>© 2025 Laravel MVC by <b>Daffa</b></small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
