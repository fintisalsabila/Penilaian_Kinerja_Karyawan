<?php  
	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.NIP,
	data_alternatif.Nama_Karyawan, data_alternatif.Stasiun_Kerja, hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN 
	data_alternatif ON hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h5 class="mb-3 text-gray-800 my-sm-auto">Cetak Hasil Perankingan</h5>
  <a href="assets/report/report_perankingan.php" class="d-inline-block btn btn-sm btn-success rounded-0" target="_blank">
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
            <th class="text-nowrap">Stasiun Kerja</th>
            <th class="text-nowrap">Nilai Akhir</th>
            <th class="text-nowrap">Peringkat</th>
          </tr>
        </thead>
        <tbody>
      		<?php
      			$no = 0;  
      			while ($res = mysqli_fetch_assoc($pref)) :
      			$no++;	
      		?>
            <tr>
            	<td class="text-nowrap"><?= $no; ?></td>
          		<td class="text-nowrap"><?= $res['NIP']; ?></td>
              <td class="text-nowrap"><?= $res['Nama_Karyawan']; ?></td>
              <td class="text-nowrap"><?= $res['Stasiun_Kerja']; ?></td>
              <td class="text-nowrap"><?= $res['hasil_pref']; ?></td>
              <td class="text-nowrap"><?= $no; ?></td>  
            </tr>
        	<?php endwhile; ?>
        </tbody>
      </table>
    </div>
	</div>
</div>