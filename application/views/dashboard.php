<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    * { box-sizing: border-box; }

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: linear-gradient(135deg, #99cdd8, #daebe3, #fde8d3);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
      padding: 40px;
      min-height: 100vh;
      overflow-x: hidden;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background-color: #ffffffdd;
      border-radius: 15px;
      padding: 30px 40px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 2;
    }

    h2 {
      color: #657166;
      text-align: center;
      font-weight: 600;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fefefe;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
      font-size: 14px;
    }

    th {
      background-color: #99cdd8;
      color: #37474f;
    }

    td.nowrap {
      white-space: nowrap;
    }

    tr:nth-child(even) {
      background-color: #f1f1f1;
    }

    tr:hover {
      background-color: #fde8d3;
    }

    .btn {
      padding: 7px 12px;
      border-radius: 8px;
      font-size: 13px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .btn-tambah {
      background: linear-gradient(90deg, #657166, #99cdd8);
      color: white;
      margin-bottom: 20px;
    }

    .btn-edit {
      background-color: #99cdd8;
      color: #000;
    }

    .btn-delete {
      background-color: #f3c3b2;
      color: #000;
    }

    .btn:hover {
      opacity: 0.9;
      transform: scale(1.03);
    }

    .akses-terbatas {
      display: inline-block;
      padding: 6px 10px;
      background-color: #ccc;
      color: #555;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
    }

    .bubbles {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none;
      overflow: hidden;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .bubbles li {
      position: absolute;
      background: rgba(255, 255, 255, 0.4);
      border-radius: 50%;
      bottom: -100px;
      animation: float 20s linear infinite;
      filter: blur(2px);
    }

    @keyframes float {
      0% { transform: translateY(0) scale(1); opacity: 0.3; }
      50% { opacity: 0.6; }
      100% { transform: translateY(-1200px) scale(1.2); opacity: 0; }
    }

    .bubbles li:nth-child(1) { left: 10%; width: 60px; height: 60px; animation-delay: 0s; }
    .bubbles li:nth-child(2) { left: 20%; width: 30px; height: 30px; animation-delay: 2s; animation-duration: 18s; }
    .bubbles li:nth-child(3) { left: 35%; width: 80px; height: 80px; animation-delay: 4s; }
    .bubbles li:nth-child(4) { left: 50%; width: 20px; height: 20px; animation-delay: 1s; animation-duration: 12s; }
    .bubbles li:nth-child(5) { left: 65%; width: 50px; height: 50px; animation-delay: 3s; animation-duration: 20s; }
    .bubbles li:nth-child(6) { left: 80%; width: 25px; height: 25px; animation-delay: 5s; animation-duration: 16s; }
    .bubbles li:nth-child(7) { left: 90%; width: 70px; height: 70px; animation-delay: 0.5s; animation-duration: 25s; }
    .bubbles li:nth-child(8) { left: 75%; width: 40px; height: 40px; animation-delay: 2.5s; animation-duration: 22s; }

    .profile-dropdown {
      position: absolute;
      top: 25px;
      right: 40px;
      z-index: 999;
    }

    @media screen and (max-width: 768px) {
      .container {
        padding: 20px;
      }

      table, th, td {
        font-size: 13px;
      }

      .btn {
        font-size: 12px;
        padding: 6px 10px;
      }
    }
  </style>
</head>
<body>

<ul class="bubbles">
  <li></li><li></li><li></li><li></li>
  <li></li><li></li><li></li><li></li>
</ul>

<div class="dropdown profile-dropdown text-end">
  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="profile" width="32" height="32" class="rounded-circle me-1">
    <span style="font-weight: 500; color: #000;">Profil</span>
  </a>
  <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
    <li><a class="dropdown-item" href="<?= site_url('dashboard/profile') ?>">Lihat Profil</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a></li>
  </ul>
</div>

<div class="container">
  <h2>Dashboard - Data Mahasiswa</h2>

  <!-- Statistik Mahasiswa -->
  <div class="row text-center mb-4">
    <div class="col-md-4">
      <div class="card border-success">
        <div class="card-body">
          <h5 class="card-title">Total Mahasiswa</h5>
          <p class="card-text fs-4"><?= $total_mahasiswa ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-primary">
        <div class="card-body">
          <h5 class="card-title">Mahasiswa Aktif</h5>
          <p class="card-text fs-4 text-primary"><?= $total_aktif ?></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-warning">
        <div class="card-body">
          <h5 class="card-title">Mahasiswa Cuti</h5>
          <p class="card-text fs-4 text-warning"><?= $total_cuti ?></p>
        </div>
      </div>
    </div>
  </div>

  <?php if ($role === 'admin' || $role === 'mahasiswa'): ?>
    <a href="<?= site_url('dashboard/tambah') ?>" class="btn btn-tambah">+ Tambah Data Mahasiswa</a>
  <?php endif; ?>

  <table>
    <thead>
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Alamat</th>
        <th class="nowrap">Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mahasiswa_list as $m): ?>
        <tr>
          <td class="nowrap"><?= $m['nim'] ?? '-' ?></td>
          <td><?= $m['nama'] ?? '-' ?></td>n
          <td><?= $m['program_studi'] ?? '-' ?></td>
          <td><?= $m['alamat'] ?? '-' ?></td>
          <td class="nowrap"><?= $m['tgl_lahir'] ?? '-' ?></td>
          <td><?= $m['jenis_kelamin'] ?? '-' ?></td>
          <td><?= $m['status'] ?? '-' ?></td>
          <td>
            <?php if ($role === 'admin'): ?>
              <a href="<?= site_url('dashboard/edit/' . $m['nim']) ?>" class="btn btn-edit">Edit</a>
              <a href="<?= site_url('dashboard/delete/' . $m['nim']) ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            <?php else: ?>
              <span class="akses-terbatas">Akses Terbatas</span>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

</body>
</html>
