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
    </style>

    @yield('style')
</head>

<body>

<header>
    <div class="header-container">
        <h1>LaporBanjir</h1>

        <nav>
            <a href="{{ route('lapor.form') }}">Lapor Banjir</a>
            <a href="{{ route('lapor.daftar') }}">Daftar Laporan</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; 2026 LaporBanjir - BPBD Kabupaten Bandung</p>
</footer>

</body>
</html>