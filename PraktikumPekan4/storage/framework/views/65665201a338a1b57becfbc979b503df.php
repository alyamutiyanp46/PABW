<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>

    <form action="/simpan" method="POST">
        <?php echo csrf_field(); ?>
        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim"><br><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan"><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\PABW\PraktikumPekan4\resources\views/form.blade.php ENDPATH**/ ?>