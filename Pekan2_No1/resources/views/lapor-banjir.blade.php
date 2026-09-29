<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Poppins'; background-color: #f4f7f6; display: flex; justify-content: center; padding: 40px; }
        .form-container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 450px; border-top: 5px solid #2c4baf; }
        h2 { color: #2c4baf; text-align: center; margin-bottom: 5px; }
        p.subtitle { text-align: center; color: #666; font-size: 14px; margin-bottom: 20px; }
        label { font-weight: bold; margin-top: 15px; display: block; color: #333; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #2c4baf; color: white; border: none; border-radius: 5px; margin-top: 25px; cursor: pointer; font-size: 16px; font-weight: bold; }
        button:hover { background-color: #2c4baf; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Lapor Banjir</h2>
        <p class="subtitle">BPBD Kabupaten Bandung</p>

        <form action="/lapor-banjir/proses" method="POST" onsubmit="return konfirmasiKirim()">
            @csrf
            <label>Nama Pelapor:</label>
            <input type="text" name="nama_pelapor" id="nama" required placeholder="Masukkan nama lengkap">

            <label>Lokasi Kejadian (Kecamatan/Desa):</label>
            <input type="text" name="lokasi_kejadian" required placeholder="Contoh: Bojongsoang">

            <label>Tinggi Genangan Air (cm):</label>
            <input type="number" name="tinggi_genangan" required placeholder="Contoh: 50">

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>

    <script>
        function konfirmasiKirim() {
            let nama = document.getElementById('nama').value;
            return confirm("Halo " + nama + ", apakah data laporan banjir sudah benar dan siap dikirim?");
        }
    </script>

</body>
</html>