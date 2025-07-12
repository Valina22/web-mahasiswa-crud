<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profil Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      background: linear-gradient(135deg, #99cdd8, #daebe3, #fde8d3);
      background-size: 400% 400%;
      animation: gradientMove 15s ease infinite;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .sidebar {
      width: 220px;
      height: 100vh;
      position: fixed;
      background: #657166;
      color: white;
      padding-top: 30px;
      z-index: 2;
    }

    .sidebar a {
      display: block;
      color: #d3d3d3;
      padding: 12px 30px;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #44524b;
      color: white;
    }

    .content {
      margin-left: 220px;
      padding: 40px;
      position: relative;
      z-index: 2;
    }

    .profile-box {
      background: #ffffffdd;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      max-width: 900px;
      margin: auto;
    }

    .profile-box h2 {
      margin-bottom: 25px;
      text-align: center;
      font-weight: 600;
      color: #657166;
    }

    .form-control, .form-select {
      border-radius: 8px;
      font-size: 14px;
    }

    .form-label {
      font-size: 13px;
      font-weight: 500;
      margin-bottom: 6px;
      color: #37474f;
    }

    .btn-primary {
      background-color: #657166;
      border: none;
      border-radius: 8px;
      padding: 8px 20px;
      font-size: 14px;
    }

    .photo-area {
      text-align: center;
    }

    .photo-area img {
      border-radius: 50%;
      width: 180px;
      height: 180px;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transition: transform 0.3s;
    }

    .photo-area img:hover {
      transform: scale(1.05);
    }

    /* Crop Modal */
    #imageToCrop {
      max-width: 100%;
      max-height: 400px;
      display: block;
      margin: auto;
    }

    .modal-dialog {
      max-width: 600px;
    }

    .modal-body {
      max-height: 70vh;
      overflow-y: auto;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <a href="<?= site_url('dashboard') ?>">Dashboard</a>
  <a class="active" href="<?= site_url('dashboard/profile') ?>">Profile</a>
  <a href="<?= site_url('auth/logout') ?>">Log out</a>
</div>

<div class="content">
  <div class="profile-box">
    <h2>Profil Mahasiswa</h2>

    <?php if ($this->session->flashdata('success')): ?>
      <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
    <?php endif; ?>

    <?php if (isset($mahasiswa)): ?>
    <div class="row">
      <div class="col-md-4 photo-area mb-4">
        <img id="preview" src="<?= base_url('uploads/foto_profil/' . ($mahasiswa->foto ?? 'default.jpg')) ?>" alt="Foto Profil">

        <?php if (!empty($mahasiswa->foto)): ?>
          <form action="<?= site_url('dashboard/hapus_foto/' . $mahasiswa->nim) ?>" method="post" style="margin-top: 10px;">
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus foto profil?')">Hapus Foto</button>
          </form>
        <?php endif; ?>
      </div>

      <div class="col-md-8">
        <form method="post" action="<?= site_url('dashboard/update_profile') ?>" enctype="multipart/form-data">
          <input type="hidden" name="nim" value="<?= $mahasiswa->nim ?>">

          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $mahasiswa->nama ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select class="form-select" name="program_studi" required>
              <option value="">-- Pilih Prodi --</option>
              <option value="Teknik Informatika" <?= $mahasiswa->program_studi === 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
              <option value="Teknik Elektro" <?= $mahasiswa->program_studi === 'Teknik Elektro' ? 'selected' : '' ?>>Teknik Elektro</option>
              <option value="Teknik Industri" <?= $mahasiswa->program_studi === 'Teknik Industri' ? 'selected' : '' ?>>Teknik Industri</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $mahasiswa->alamat ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Upload Foto Profil</label>
            <input type="file" name="foto" id="fotoInput" class="form-control" accept=".jpg,.jpeg,.png,.webp">
            <input type="hidden" name="cropped_image" id="croppedImageInput">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control" value="<?= $mahasiswa->tgl_lahir ?>" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" <?= $mahasiswa->jenis_kelamin === 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $mahasiswa->jenis_kelamin === 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
  <label class="form-label">Status Mahasiswa</label>
  <select name="status" class="form-select" required>
    <option value="">-- Pilih Status --</option>
    <option value="aktif" <?= $mahasiswa->status === 'aktif' ? 'selected' : '' ?>>Aktif</option>
    <option value="cuti" <?= $mahasiswa->status === 'cuti' ? 'selected' : '' ?>>Cuti</option>
  </select>
</div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    <?php else: ?>
      <p>Data mahasiswa tidak ditemukan.</p>
    <?php endif; ?>
  </div>
</div>

<!-- Modal Crop -->
<div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crop Foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <img id="imageToCrop" src="" alt="Image to crop">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="cropAndSave">Crop & Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
  const fotoInput = document.getElementById('fotoInput');
  const imageToCrop = document.getElementById('imageToCrop');
  const preview = document.getElementById('preview');
  const croppedImageInput = document.getElementById('croppedImageInput');
  let cropper;

  fotoInput.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (event) {
        imageToCrop.src = event.target.result;
        const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
        cropModal.show();
      };
      reader.readAsDataURL(file);
    }
  });

  document.getElementById('cropModal').addEventListener('shown.bs.modal', () => {
    cropper = new Cropper(imageToCrop, {
      aspectRatio: 1,
      viewMode: 1,
      autoCropArea: 1,
    });
  });

  document.getElementById('cropModal').addEventListener('hidden.bs.modal', () => {
    cropper?.destroy();
    cropper = null;
  });

  document.getElementById('cropAndSave').addEventListener('click', function () {
    if (cropper) {
      const canvas = cropper.getCroppedCanvas({
        width: 300,
        height: 300
      });
      const dataURL = canvas.toDataURL('image/png');
      preview.src = dataURL;
      croppedImageInput.value = dataURL;
      const cropModal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
      cropModal.hide();
    }
  });
</script>

</body>
</html>
