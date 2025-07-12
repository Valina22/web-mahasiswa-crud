<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Update Profil Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            max-width: 600px;
            width: 100%;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #4a6fa5;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="text"]:focus, select:focus {
            border-color: #4a6fa5;
            outline: none;
        }

        .btn {
            margin-top: 25px;
            padding: 12px;
            width: 100%;
            background-color: #4a6fa5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #3d5c8d;
        }

        .form-footer {
            text-align: center;
            margin-top: 15px;
        }

        .form-footer a {
            color: #4a6fa5;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update Profil Mahasiswa</h2>

    <form action="<?= base_url('dashboard/update') ?>" method="post">
        <input type="hidden" name="nim" value="<?= isset($mahasiswa['nim']) ? $mahasiswa['nim'] : ''; ?>">

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= isset($mahasiswa['nama']) ? $mahasiswa['nama'] : ''; ?>" required>

        <label for="jurusan">Jurusan</label>
        <select name="jurusan" id="jurusan" required>
            <option value="Teknik Informatika" <?= isset($mahasiswa['jurusan']) && $mahasiswa['jurusan'] == 'Teknik Informatika' ? 'selected' : ''; ?>>Teknik Informatika</option>
            <option value="Teknik Elektro" <?= isset($mahasiswa['jurusan']) && $mahasiswa['jurusan'] == 'Teknik Elektro' ? 'selected' : ''; ?>>Teknik Elektro</option>
            <option value="Teknik Industri" <?= isset($mahasiswa['jurusan']) && $mahasiswa['jurusan'] == 'Teknik Industri' ? 'selected' : ''; ?>>Teknik Industri</option>
        </select>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?= isset($mahasiswa['alamat']) ? $mahasiswa['alamat'] : ''; ?>" required>

        <!-- STATUS -->
        <label for="status">Status Mahasiswa</label>
        <select name="status" id="status" required>
            <option value="">-- Pilih Status --</option>
            <option value="aktif" <?= isset($mahasiswa['status']) && $mahasiswa['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
            <option value="cuti" <?= isset($mahasiswa['status']) && $mahasiswa['status'] == 'cuti' ? 'selected' : ''; ?>>Cuti</option>
        </select>

        <button type="submit" class="btn">Simpan Perubahan</button>
    </form>

    <div class="form-footer">
        <p><a href="<?= base_url('dashboard') ?>">Kembali ke Dashboard</a></p>
    </div>
</div>

</body>
</html>
