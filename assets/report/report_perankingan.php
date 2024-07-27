<?php  
	require '../../config/connect_db.php';

	require_once __DIR__ . '../../../vendor/autoload.php';

	// format tgl indonesia
	setlocale(LC_ALL, 'id-ID', 'id_ID');
	$tgl1 = strftime("%A, %d %B %Y");
	$tgl2 = strftime("%d %B %Y");

	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter, data_alternatif.NIP,
	data_alternatif.Nama_Karyawan, data_alternatif.Stasiun_Kerja, hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN 
	data_alternatif ON hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->debug = false;

	$header = '<div class="head" style="border-bottom: 5px double black; font-family: sans-serif; text-align: center;">	
							<img src="../img/Icon_DKB.png" alt="" width="100" height="100" style="float: left; margin-right: 15px;">
							<h2 style="float: right; padding-top: 15px;">Laporan Hasil Normalisasi<br>SPK Penilaian Kinerja Karyawan<br>
							Universitas Muhammadiyah Jakarta</h2>
						</div>'; 

	$subhead = '<div style="font-family: sans-serif;">
								<p style="font-weight: bold;">Hasil Perankingan</p>
								<p style="font-size: 12px;">'. $tgl1 .'</p>
							</div>';

	$tabel = '<table border="1" width="100%" cellspacing="0" cellpadding="5" style="font-size: 12px; font-family: sans-serif;">
	            <thead>
	                <tr>
	                		<th>No</th>
	                		<th>NIP</th>
	                    <th>Nama Karyawan</th>
	                    <th>Stasiun Kerja</th>
	                    <th>Nilai Akhir</th>
	                    <th>Peringkat</th>
	                </tr>
	            </thead>
	            <tbody>';
            			$no = 0;  
            			while ($res = mysqli_fetch_assoc($pref)) :
            			$no++;	
         	$tabel .= '<tr>
         							<td>'. $no .'</td>
                  		<td>'. $res['NIP'] .'</td>
                      <td>'. $res['Nama_Karyawan'] .'</td>
                      <td>'. $res['Stasiun_Kerja'] .'</td>
                      <td>'. $res['hasil_pref'] .'</td>
                      <td>'. $no .'</td>  
	                  </tr>';
            			endwhile;
	$tabel .= '</tbody>
	      </table>';

  $date = '<div style="text-align: right; margin-top:50px; font-family: sans-serif;">
					 	<p>Jakarta, '. $tgl2 .'</p>
					 	<p style="margin-right: 60px;">Admin</p>
					 	<br><br>
					 	<p style="margin-right: 12px;">..................................</p>
					</div>';

	$mpdf->SetTitle('Laporan Perankingan');								
	$mpdf->WriteHTML($header);
	$mpdf->WriteHTML($subhead);
	$mpdf->WriteHTML($tabel);
	$mpdf->WriteHTML($date);
	$mpdf->SetFooter('SPK Penilaian Kinerja Karyawan|{PAGENO}|Hasil Perankingan');
	$mpdf->Output('Laporan Penilaian Kinerja Karyawan - ' . $tgl1 . '.pdf', \Mpdf\Output\Destination::INLINE);

?>