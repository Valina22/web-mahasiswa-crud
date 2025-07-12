<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #99cdd8, #daebe3, #fde8d3);
            background-size: 300% 300%;
            animation: gradientMove 15s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .form-container {
            background: #ffffffee;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #657166;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #37474f;
            font-weight: 500;
        }

        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            background-color: #f9fafb;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #99cdd8;
            background-color: #fff;
            box-shadow: 0 0 0 2px rgba(153, 205, 216, 0.3);
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 12px;
            background: linear-gradient(90deg, #f3c3b2, #99cdd8);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background: linear-gradient(90deg, #99cdd8, #f3c3b2);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Mahasiswa</h2>
        <form action="<?= site_url('data/form_proses') ?>" method="post">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" required>

            <label for="namamahasiswa">Nama Mahasiswa</label>
            <input type="text" name="namamahasiswa" id="namamahasiswa" required>

            <label for="program_studi">Program Studi</label>
            <input type="text" name="program_studi" id="program_studi" required>

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="3" required></textarea>

            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" required>

            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <button type="submit">SIMPAN DATA</button>
        </form>
    </div>
</body>
</html>
