<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Laporan</title>
    <style>
        body { font-family: 'Poppins'; background-color: #eafaf1; display: flex; justify-content: center; padding: 40px; }
        .result-container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 100%; max-width: 450px; text-align: center; border-top: 5px solid #2ecc71; }
        h2 { color: #2ecc71; margin-bottom: 5px; }
        p { color: #555; }
        .data-box { background: #f9f9f9; padding: 20px; border-radius: 8px; text-align: left; margin-top: 20px; border-left: 5px solid #2ecc71; }
        .data-box p { margin: 10px 0; font-size: 16px; color: #333; }
        a.btn-back { display: inline-block; margin-top: 25px; text-decoration: none; color: white; background-color: #3498db; padding: 12px 20px; border-radius: 5px; font-weight: bold; }
        a.btn-back:hover { background-color: #2980b9; }
    </style>
</head>
<body>

    <div class="result-container">
        <h2> Laporan Diterima!</h2>
        <p>Terima kasih, laporan Anda telah masuk ke sistem sementara BPBD Kabupaten Bandung.</p>
        
        <div class="data-box">
            <p><strong>Nama Pelapor:</strong> {{ $nama_pelapor }}</p>
            <p><strong>Lokasi Kejadian:</strong> {{ $lokasi_kejadian }}</p>
            <p><strong>Tinggi Genangan:</strong> {{ $tinggi_genangan }} cm</p>
        </div>

        <a href="/lapor-banjir" class="btn-back">Kembali ke Form</a>
    </div>

</body>
</html>