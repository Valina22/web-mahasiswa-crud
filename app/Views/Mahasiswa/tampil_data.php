<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #fff8dc;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #d4a300;
            margin-bottom: 30px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fffef7;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #ffe082;
            color: #4e342e;
        }

        tr:hover {
            background-color: #fff8e1;
        }
    </style>
</head>
<body>

<h1>Data Mahasiswa</h1>

<table>
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?= esc($mhs['nim']) ?></td>
            <td><?= esc($mhs['nama']) ?></td>
            <td><?= esc($mhs['prodi']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
