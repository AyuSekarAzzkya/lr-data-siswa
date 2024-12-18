<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Background gradient */
            font-family: Arial, sans-serif;
            color: black;
            height: 100vh;
            margin: 0;
        }

        .sidebar {
            height: 100vh;
            padding-top: 20px;
            background: black; /* Darker background for sidebar */
            color: black;
        }

        .sidebar-heading {
            font-size: 1.25rem;
            color: #ffffff;
            background-color: black; /* Darker background for sidebar heading */
            padding: 10px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .nav-link {
            font-size: 1.1rem;
            color:black;
            padding: 12px 15px;
            border-radius: 5px;
            margin: 5px 0;
        }

        .nav-link:hover {
            background-color: #6a11cb; /* Hover effect */
            color: #fff;
        }

        .nav-link.active {
            background-color:  #6a11cb; /* Active state */
            color: #fff;
        }

        .main-content {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 220px; /* Offset content to the right to make space for sidebar */
            margin-top: 30px;
        }

        .bg-white {
            background-color: #ffffff !important;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <h5 class="sidebar-heading">Data Siswa</h5>
                    <ul class="nav flex-column">
                        @if (Auth::check())
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                            @if (Auth::user()->role == 'user')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('datasiswa.index') }}">
                                        <i class="fas fa-user-graduate"></i> Data Siswa
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('absensi.index') }}">
                                        <i class="fas fa-book"></i> Absensi
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-lg"></i> Logout
                                </a>
                            </li>

                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.index') }}">
                                        <i class="fas fa-user-cog"></i> Kelola Akun
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <div class="bg-white rounded shadow-sm p-4 mt-5">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
