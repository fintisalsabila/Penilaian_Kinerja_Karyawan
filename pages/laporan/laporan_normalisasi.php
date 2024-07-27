<?php  
  $normali = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria");
  $siswa = mysqli_query($koneksi_db, "SELECT ID_Alter, NIP, Nama_Karyawan FROM data_alternatif");
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h5 class="mb-3 text-gray-800 my-sm-auto">Cetak Hasil Normalisasi</h5>
  <a href="assets/report/report_normalisasi.php" class="d-inline-block btn btn-sm btn-success rounded-0" target="_blank">
  	<i class="fas fa-file-pdf fa-sm"></i> Cetak Laporan
	</a>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th class="text-nowrap">No</th>
            <th class="text-nowrap">NIP</th>
            <th class="text-nowrap">Nama Karyawan</th>
            <?php  
                while ($krit = mysqli_fetch_assoc($normali)) :
            ?>
                <th class="text-nowrap"><?= $krit['Nama_Kriteria']; ?></th>
            <?php endwhile; ?>
          </tr>
        </thead>
        <tbody>
          <?php 
          		$no = 0;
              while ($sis = mysqli_fetch_assoc($siswa)) :
              $no++;
          ?>
            <tr>
            	<td class="text-nowrap"><?= $no; ?></td>
              <td class="text-nowrap"><?= $sis['NIP']; ?></td>
              <td class="text-nowrap"><?= $sis['Nama_Karyawan']; ?></td>
              <?php  
                $hasil = mysqli_query($koneksi_db, "SELECT Hasil_Norm FROM hasil_normalisasi 
                WHERE ID_Alter = '$sis[ID_Alter]'");

                while ($nilai = mysqli_fetch_assoc($hasil)) :
              ?>
                <td class="text-nowrap"><?= $nilai['Hasil_Norm']; ?></td>
              <?php endwhile; ?>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
	</div>
</div>