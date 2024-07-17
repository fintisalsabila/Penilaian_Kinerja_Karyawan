<?php
	require '../../config/connect_db.php';

	require_once __DIR__ . '../../../vendor/autoload.php';

	// format tgl indonesia
	setlocale(LC_ALL, 'id-ID', 'id_ID');
	$tgl1 = strftime("%A, %d %B %Y");
	$tgl2 = strftime("%d %B %Y");

	$normali = mysqli_query($koneksi_db, "SELECT Nama_Kriteria FROM data_kriteria");
  $siswa = mysqli_query($koneksi_db, "SELECT ID_Alter, NISN, Nama_Siswa FROM data_alternatif");

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->debug = false;

	$header = '<div class="head" style="border-bottom: 5px double black; font-family: sans-serif;">	
							<img src="../img/Icon_UMJ.png" width="100" height="100" style="float: left; margin-right: 15px;">
							<h3 style="float: right; padding-top: 15px;">Laporan Hasil Normalisasi<br>SPK Penilaian Kinerja Karyawan<br>
							Kepaniteraan Mahkamah Agung RI</h3>
						</div>'; 

	$subhead = '<div style="font-family: sans-serif;">
								<p style="font-weight: bold;">Hasil Normalisasi</p>
								<p style="font-size: 12px;">'. $tgl1 .'</p>
							</div>';
	
	$tabel = '<table border="1" width="100%" cellspacing="0" cellpadding="4" style="font-size: 11px; font-family: sans-serif;">
	            <thead>
	                <tr>
	                    <th>No</th>
	                    <th>NIP</th>
	                    <th>Nama Karyawan</th>'; 
	                    while ($krit = mysqli_fetch_assoc($normali)) {
	                   		$tabel .= ' <th>'. $krit['Nama_Kriteria'] .'</th>';
	                    }
	    $tabel .= '</tr>
	            </thead>
	            <tbody>';
                  $no = 0;   
                  while ($sis = mysqli_fetch_assoc($siswa)) {
                  $no++;
	      $tabel .= '<tr>
	                    <td>'. $no .'</td>
	                    <td>'. $sis['NISN'] .'</td>
	                    <td>'. $sis['Nama_Siswa'] .'</td>';
                      $hasil = mysqli_query($koneksi_db, "SELECT Hasil_Norm FROM hasil_normalisasi 
                      WHERE ID_Alter = '$sis[ID_Alter]'");
	                    
	                    while ($nilai = mysqli_fetch_assoc($hasil)) {
	                   		$tabel .= '<td>' .$nilai['Hasil_Norm']. '</td>';
	                    }
	      $tabel .= '</tr>';
	                }
	$tabel .= '</tbody>
	        </table>';

	$date = '<div style="text-align: right; margin-top:50px; font-family: sans-serif;">
					 	<p>Jakarta, '. $tgl2 .'</p>
					 	<p style="margin-right: 60px;">Admin</p>
					 	<br><br>
					 	<p style="margin-right: 12px;">..................................</p>
					</div>';

	$mpdf->SetTitle('Laporan Normalisasi');
	$mpdf->WriteHTML($header);
	$mpdf->WriteHTML($subhead);
	$mpdf->WriteHTML($tabel);
	$mpdf->WriteHTML($date);
	$mpdf->SetFooter('SPK Penilaian Kinerja Karyawan|{PAGENO}|Hasil Normalisasi');
	$mpdf->Output('Laporan Normalisasi - ' . $tgl1 . '.pdf', \Mpdf\Output\Destination::INLINE);

?>

