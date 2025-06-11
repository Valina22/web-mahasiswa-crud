<!DOCTYPE html>
<html>
<head>
    <title>Profil Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Profil Mahasiswa</h1>

    <?php if ($mahasiswa): ?>
    <div class="profile-card">
        <div class="profile-item">👩 Nama Lengkap: <?= esc($mahasiswa['nama']) ?></div>
        <div class="profile-item">🆔 NIM: <?= esc($mahasiswa['nim']) ?></div>
        <div class="profile-item">🎓 Program Studi: <?= esc($mahasiswa['prodi']) ?></div>
    </div>
    <?php else: ?>
        <p style="text-align: center;">Data tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>
