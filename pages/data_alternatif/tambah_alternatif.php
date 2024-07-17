<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Tambah Alternatif</h1>
</div>

<!-- popup status -->
<?php  
    if (isset($_SESSION['pesan']) && isset($_SESSION['status'])) :
?>
    <div class="alert alert-<?= $_SESSION['status']; ?> rounded-0" role="alert" id="notif">
      <?= $_SESSION['pesan']; ?>
    </div>
<?php  
    unset($_SESSION['pesan']);
    unset($_SESSION['status']);
    endif;
?>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Masukkan Data Alternatif Baru</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_alternatif/proses_tambah_alternatif.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIP</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nisn" placeholder="Masukkan NIP" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_siswa" placeholder="Masukkan Nama Karyawan"required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">JK</label>
                <select class="form-control rounded-0" aria-label="Default select example" name="jenis_kelamin" required>
                    <option selected disabled>-- Jenis Kelamin --</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Stasiun Kerja</label>
                <select class="form-control rounded-0" aria-label="Default select example" name="kelas">
                    <option selected disabled>-- Pilih Stasiun Kerja --</option>
                    <option value="Bengkel Mekanik">Bengkel Mekanik</option>
                    <option value="Bengkel Pipa">Bengkel Pipa</option>
                    <option value="Bengkel Konstruksi">Bengkel Konstruksi</option>
                    <option value="Bengkel Outfiting">Bengkel Outfiting</option>
                    <option value="Safety dan Renwas">Safety dan renwas</option>
                    <option value="Sarana Laut dan Darat">Sarana Laut dan darat</option>
                    <!-- <option value="XII DKV 1">XII DKV 1</option>
                    <option value="XII DKV 2">XII DKV 2</option>
                    <option value="XII DKV 3">XII DKV 3</option>
                    <option value="X PBKM 1">X PBKM 1</option>
                    <option value="X PBKM 2">X PBKM 2</option>
                    <option value="X PBKM 3">X PBKM 3</option>
                    <option value="XI PBKM 1">XI PBKM 1</option>
                    <option value="XI PBKM 2">XI PBKM 2</option>
                    <option value="XI PBKM 3">XI PBKM 3</option>
                    <option value="XII PBKM 1">XII PBKM 1</option>
                    <option value="XII PBKM 2">XII PBKM 2</option>
                    <option value="XII PBKM 3">XII PBKM 3</option>
                    <option value="X SIJA 1">X SIJA 1</option>
                    <option value="X SIJA 2">X SIJA 2</option>
                    <option value="X SIJA 3">X SIJA 3</option>
                    <option value="XI SIJA 1">XI SIJA 1</option>
                    <option value="XI SIJA 2">XI SIJA 2</option>
                    <option value="XI SIJA 3">XI SIJA 3</option>
                    <option value="XII SIJA 1">XII SIJA 1</option>
                    <option value="XII SIJA 2">XII SIJA 2</option>
                    <option value="XII SIJA 3">XII SIJA 3</option> -->
                </select>
            </div>
            <a href="index.php?page=data_siswa" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-save fa-sm"></i> Simpan
            </button>
        </form>
    </div>
</div>