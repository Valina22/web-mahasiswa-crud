<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #99cdd8, #daebe3, #fde8d3);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      position: relative;
      font-size: 14px;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .form-wrapper {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      position: relative;
      z-index: 1;
    }
    .form-container {
      background: #ffffffeb;
      padding: 25px;
      border-radius: 14px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 520px;
    }
    h2 {
      text-align: center;
      color: #657166;
      margin-bottom: 20px;
      font-weight: 500;
      font-size: 20px;
    }
    .form-label {
      font-weight: 400;
      color: #333;
      font-size: 13px;
    }
    .form-control,
    .form-select {
      border-radius: 8px;
      background: #f9fafb;
      border: 1px solid #cfd6c4;
      font-size: 13px;
    }
    .form-control:focus,
    .form-select:focus {
      box-shadow: 0 0 0 2px rgba(153, 205, 216, 0.25);
      border-color: #99cdd8;
    }
    .btn-submit {
      background-color: #99cdd8;
      color: #fff;
      border: none;
      font-weight: 500;
      font-size: 13px;
      padding: 10px 24px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }
    .btn-submit:hover {
      background-color: #85bcc8;
    }
    .btn-back {
      background-color: #cfd6c4;
      color: #333;
      border: none;
      font-weight: 400;
      font-size: 13px;
      padding: 10px 20px;
      border-radius: 8px;
      transition: background-color 0.3s ease;
    }
    .btn-back:hover {
      background-color: #b0bdb4;
    }
    .text-center {
      text-align: center;
    }
    /* BUBBLES GLOW EFFECT */
    .bubbles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .bubbles li {
      position: absolute;
      display: block;
      background: rgba(255, 255, 255, 0.5);
      border-radius: 50%;
      bottom: -100px;
      animation: float 15s linear infinite;
      filter: blur(2px);
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
    }
    @keyframes float {
      0% {
        transform: translateY(0) scale(1);
        opacity: 0.2;
      }
      50% {
        opacity: 0.5;
      }
      100% {
        transform: translateY(-1200px) scale(1.2);
        opacity: 0;
      }
    }
    .bubbles li:nth-child(1) { left: 10%; width: 60px; height: 60px; animation-delay: 0s; }
    .bubbles li:nth-child(2) { left: 20%; width: 30px; height: 30px; animation-delay: 2s; animation-duration: 18s; }
    .bubbles li:nth-child(3) { left: 35%; width: 80px; height: 80px; animation-delay: 4s; }
    .bubbles li:nth-child(4) { left: 50%; width: 20px; height: 20px; animation-delay: 1s; animation-duration: 12s; }
    .bubbles li:nth-child(5) { left: 65%; width: 50px; height: 50px; animation-delay: 3s; animation-duration: 20s; }
    .bubbles li:nth-child(6) { left: 80%; width: 25px; height: 25px; animation-delay: 5s; animation-duration: 16s; }
    .bubbles li:nth-child(7) { left: 90%; width: 70px; height: 70px; animation-delay: 0.5s; animation-duration: 25s; }
    .bubbles li:nth-child(8) { left: 75%; width: 40px; height: 40px; animation-delay: 2.5s; animation-duration: 22s; }
  </style>
</head>
<body>

  <!-- Bubble Background -->
  <ul class="bubbles">
    <li></li><li></li><li></li><li></li>
    <li></li><li></li><li></li><li></li>
  </ul>

  <div class="form-wrapper">
    <div class="form-container">
      <h2>Edit Data Mahasiswa</h2>
      <form action="<?= site_url('dashboard/update_mahasiswa') ?>" method="post">
        <input type="hidden" name="nim" value="<?= htmlspecialchars($mahasiswa['nim']) ?>" readonly>

        <div class="mb-3">
          <label for="namamahasiswa" class="form-label">Nama</label>
          <input
            type="text"
            class="form-control"
            id="namamahasiswa"
            name="namamahasiswa"
            value="<?= htmlspecialchars($mahasiswa['nama']) ?>"
            required
          />
        </div>

        <div class="mb-3">
          <label for="program_studi" class="form-label">Program Studi</label>
          <select class="form-select" id="program_studi" name="program_studi" required>
            <option value="">-- Pilih Prodi --</option>
            <option value="Teknik Informatika" <?= $mahasiswa['program_studi'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
            <option value="Teknik Elektro" <?= $mahasiswa['program_studi'] == 'Teknik Elektro' ? 'selected' : '' ?>>Teknik Elektro</option>
            <option value="Teknik Industri" <?= $mahasiswa['program_studi'] == 'Teknik Industri' ? 'selected' : '' ?>>Teknik Industri</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea
            class="form-control"
            id="alamat"
            name="alamat"
            rows="2"
            required
          ><?= htmlspecialchars($mahasiswa['alamat']) ?></textarea>
        </div>

        <div class="mb-3">
          <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
          <input
            type="date"
            class="form-control"
            id="tgl_lahir"
            name="tgl_lahir"
            value="<?= htmlspecialchars($mahasiswa['tgl_lahir']) ?>"
            required
          />
        </div>

        <div class="mb-3">
          <label class="form-label">Jenis Kelamin</label><br />
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="jenis_kelamin"
              id="laki"
              value="Laki-laki"
              <?= $mahasiswa['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>
              required
            />
            <label class="form-check-label" for="laki">Laki-laki</label>
          </div>
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="jenis_kelamin"
              id="perempuan"
              value="Perempuan"
              <?= $mahasiswa['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>
              required
            />
            <label class="form-check-label" for="perempuan">Perempuan</label>
          </div>
        </div>
       <div class="mb-3">
  <label class="form-label">Status Mahasiswa</label>
  <select class="form-select" name="status" required>
    <option value="">-- Pilih Status --</option>
    <option value="aktif">Aktif</option>
    <option value="cuti">Cuti</option>
  </select>
</div>

        <div class="text-center mt-4">
          <button type="submit" class="btn-submit">Update</button>
          <a href="<?= site_url('dashboard') ?>" class="btn-back">Batal</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
