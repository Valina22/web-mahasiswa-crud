<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="title">
    <h1>Data Mahasiswa</h1>
    <a href="/crud/tambah"><button class="btn-tambah">Tambah Data</button></a>
</div>

<div class="table">
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Universitas</th>
                <th>No. HP</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($mahasiswa)) : ?>
                <tr>
                    <td colspan="7" style="text-align:center;">Tidak ada data</td>
                </tr>
            <?php else : ?>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $m) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= esc($m['nim']); ?></td>
                        <td><?= esc($m['nama']); ?></td>
                        <td><?= esc($m['prodi'] ?? '-'); ?></td>
                        <td><?= esc($m['universitas'] ?? '-'); ?></td>
                        <td><?= esc($m['no_hp'] ?? '-'); ?></td> <!-- <- ini sudah fix -->
                        <td class="action">
                            <a href="/crud/hapus/<?= esc($m['nim']); ?>" 
                               onclick="return confirm('Yakin ingin menghapus NIM <?= esc($m['nim']); ?>?')">
                                <button class="btn-delete">Delete</button>
                            </a>
                            <a href="/crud/edit/<?= esc($m['nim']); ?>">
                                <button class="btn-update">Update</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>
