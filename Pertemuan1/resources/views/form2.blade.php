<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
</head>
<body>
    <h2>Input Biodata</h2>
    <form action="/output" method="post">
        @csrf
        <label>Nim:</label>
        <input type="text" name="nim" required><br><br>

        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>

        <label>Program Studi:</label>
        <input type="text" name="programstudi" id="programstudi" required><br><br>

        <label>Semester:</label>
        <input type="number" name="semester" required><br><br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>