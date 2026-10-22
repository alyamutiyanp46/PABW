<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'LaporBanjir')</title>

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #2c4baf;
            color: white;
            padding: 20px;
        }

        .header-container {
            max-width: 1000px;
            margin: auto;
        }

        header h1 {
            margin: 0 0 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .logout-form {
            display: inline;
        }
        
        .logout-btn {
            background: none;
            border: none;
            color: white;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            cursor: pointer;
            padding: 0;
            margin-right: 20px;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }

        .user-greeting {
            color: #ffe0b2;
            margin-right: 20px;
            font-style: italic;
            font-weight: normal;
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
            box-sizing: border-box;
        }

        footer {
            background-color: #2c4baf;
            color: white;
            text-align: center;
            padding: 25px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .laporan-card {
            background: white;
            border-left: 4px solid #2c4baf;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        .laporan-card h3 {
            color: #2c4baf;
            margin-top: 0;
            margin-bottom: 18px;
        }

        .laporan-card p {
            margin: 10px 0;
        }

        .laporan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
        }

        .status.waspada {
            background-color: #fff3cd;
            color: #856404;
        }

        .status.siaga {
            background-color: #ffe0b2;
            color: #e65100;
        }

        .status.awas {
            background-color: #f8d7da;
            color: #721c24;
        }

        .form-card {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.10);
            border-top: 5px solid #2c4baf;
            box-sizing: border-box;
        }

        .form-card h2 {
            text-align: center;
            color: #2c4baf;
            margin: 0 0 10px;
        }

        .form-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2c4baf;
        }

        .form-card button {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            background-color: #2c4baf;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-card button:hover {
            background-color: #243f94;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-right: 20px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }
    </style>

    @yield('style')
</head>

<body>

<header>
    <div class="header-container" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 style="margin: 0 0 8px 0;">LaporBanjir</h1>
            <nav style="display: flex; gap: 20px;">
                <a href="{{ route('lapor.form') }}">Lapor Banjir</a>
                <a href="{{ route('lapor.daftar') }}">Daftar Laporan</a>
            </nav>
        </div>

        <div style="display: flex; align-items: center; gap: 20px;">
            @guest
                <nav style="display: flex; gap: 20px;">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </nav>
            @endguest

            @auth
                <span class="user-greeting">Halo, {{ Auth::user()->name }}!</span>
                <a href="{{ route('profil') }}" class="nav-link">Profil Petugas</a>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</header>

<main>
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</main>

<footer>
    <p>&copy; 2026 LaporBanjir - BPBD Kabupaten Bandung</p>
</footer>

</body>
</html>