<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Karyawan</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>JMC-Human Resources</h1>
            <div class="user-info">
                <p>Ed MO</p>
                <a href="<?= base_url('logout') ?>">Logout</a>
            </div>
        </div>
        <div class="main-content">
            <h2>Penilaian Karyawan</h2>
            <form action="<?= base_url('penilaian_karyawan/save') ?>" method="post">
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <select name="nama_karyawan" id="nama_karyawan" class="form-control">
                        <option value="">Pilih Nama Karyawan</option>
                        <?php foreach ($karyawan as $k) : ?>
                            <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <select name="periode" id="periode" class="form-control">
                        <option value="">Pilih Periode</option>
                        <?php foreach ($periode as $p) : ?>
                            <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_penilaian">Tanggal Penilaian</label>
                    <input type="date" name="tanggal_penilaian" id="tanggal_penilaian" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="penilai">Penilai</label>
                    <select name="penilai" id="penilai" class="form-control">
                        <option value="">Pilih Penilai</option>
                        <?php foreach ($penilai as $p) : ?>
                            <option value="<?= $p->id ?>"><?= $p->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aspek</th>
                            <th>Detail Aspek</th>
                            <th>Bobot</th>
                            <th>Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aspek as $a) : ?>
                            <tr>
                                <td><?= $a->id ?></td>
                                <td><?= $a->nama ?></td>
                                <td><?= $a->deskripsi ?></td>
                                <td><?= $a->bobot ?>%</td>
                                <td>
                                    <div class="form-check">
                                        <?php for ($i = 0; $i <= 4; $i++) : ?>
                                            <input type="radio" name="penilaian[<?= $a->id ?>]" value="<?= $i ?>" id="penilaian<?= $a->id ?>_<?= $i ?>" class="form-check-input">
                                            <label class="form-check-label" for="penilaian<?= $a->id ?>_<?= $i ?>"><?= $i ?></label>
                                        <?php endfor; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</body>
</html>
