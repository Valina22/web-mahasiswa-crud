<!DOCTYPE html>
<html>
<head>
    <title>Hasil Form</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p><strong>Nama:</strong> <?= esc($nama) ?></p>
    <p><strong>NIM:</strong> <?= esc($nim) ?></p>
    <p><strong>Kelas:</strong> <?= esc($kelas) ?></p>
    <p><strong>Mata Kuliah:</strong> <?= esc($matakuliah) ?></p>
    <p><strong>Dosen Pengampu:</strong> <?= esc($dosen_pengampu) ?></p>
    <p><strong>Asisten Praktikum:</strong> <?= esc($asisten) ?></p>
</body>
</html>
