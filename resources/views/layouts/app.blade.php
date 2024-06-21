<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rural Library Information System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #e0f7fa;
            image-rendering: pixelated;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            background-color: #ffcc00;
            border-bottom: 3px solid #d4a017;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            font-weight: 700;
            color: #2f4f4f !important;
            text-shadow: 1px 1px #fff;
        }

        .card {
            background-color: #fff;
            border: 2px solid #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .table thead th {
            background-color: #ffcc00;
            border-bottom: 2px solid #d4a017;
            color: #2f4f4f;
        }

        .table tbody tr {
            transition: background-color 0.2s ease-in-out;
        }

        .table tbody tr:hover {
            background-color: #ffffe0;
        }

        .custom-table-width {
            width: 100%;
            overflow-x: auto;
        }

        .btn-primary {
            background-color: #ffcc00;
            border: 2px solid #d4a017;
            color: #2f4f4f;
        }

        .btn-primary:hover {
            background-color: #e6b800;
        }

        .btn-info, .btn-danger, .btn-warning {
            border: 2px solid #000;
        }

        .sidebar {
            background-color: #ffcc00;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 300px;
            padding-top: 20px;
            border-right: 3px solid #d4a017;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar a {
            color: #2f4f4f;
            padding: 10px;
            text-decoration: none;
            display: block;
            text-shadow: 1px 1px #fff;
        }

        .sidebar a:hover {
            background-color: #e6b800;
        }

        .sidebar .navbar-brand {
            margin-bottom: 20px;
            font-size: 1.2em;
            text-align: center;
            display: block;
            color: #2f4f4f !important;
            text-shadow: 1px 1px #fff;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            margin-left: 300px;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="sidebar">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Library System</a>
    @auth
        @if (Auth::user()->is_supervisor)
            <a href="{{ route('volunteers.index') }}">Volunteers</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('members.index') }}">Members</a>
            <a href="{{ route('borrowing_records.index') }}">Borrowing Records</a>
        @else
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('members.index') }}">Members</a>
            <a href="{{ route('borrowing_records.index') }}">Borrowing Records</a>
        @endif
    @endauth
</div>
<div class="main-container">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
