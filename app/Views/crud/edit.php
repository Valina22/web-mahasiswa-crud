<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main>
    <div class="title">
        <h1>Edit Data Mahasiswa</h1>
    </div>

    <div class="form">
<form action="/crud/update" method="POST">
            <div class="input">
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" value="<?= $edit['nim']; ?>">
            </div>
            <div class="input">
                <label for="newNim">NIM yang baru</label>
                <input type="text" name="newNim" id="nim">
            </div>

            <div class="input">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $edit['nama']; ?>">
            </div>
            <div class="input">
                <label for="newNama">Nama yang baru</label>
                <input type="text" name="newNama" id="nama">
            </div>

            <div class="input">
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" id="prodi" value="<?= $edit['prodi']; ?>">
            </div>
            <div class="input">
                <label for="newProdi">Prodi yang baru</label>
                <input type="text" name="newProdi" id="prodi">
            </div>

            <div class="input">
                <label for="universitas">Universitas</label>
                <input type="text" name="universitas" id="universitas" value="<?= $edit['universitas']; ?>">
            </div>
            <div class="input">
                <label for="newUniversitas">Universitas yang baru</label>
                <input type="text" name="newUniversitas" id="universitas">
            </div>

            <div class="input">
                <label for="no_hp">Nomor Handphone</label>
                <input type="text" name="no_hp" id="no_hp" value="<?= $edit['no_hp']; ?>">
            </div>
            <div class="input">
                <label for="new_no_hp">Nomor Handphone yang baru</label>
                <input type="text" name="new_no_hp" id="no_hp">
            </div>

            <div class="button">
                <button type="submit" value="Submit">Submit</button>
            </div>
        </form>
    </div>
</main>

<?= $this->endSection(); ?>
