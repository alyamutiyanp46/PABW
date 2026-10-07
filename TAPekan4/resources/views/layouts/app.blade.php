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