<?php
	include "koneksi.php";
	include "function1.php";
?>
	<head>
	
    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	
	</head>

<div class="content-wrapper">
	<div class="col-lg-12">
		<h2 class="page-header"><b>.:: Proses Perhitungan ::.</b><!-- Button trigger modal -->
			
		</h2>	
		
<!-- /.row -->
	<div class="modal fade" id="addSurvey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
	</div>	
                    <div class="panel panel-info">
                        <div class="panel-heading">
							<ul class="nav nav-pills">
								<li class="active"><a href="#interval" data-toggle="tab">Interval</a></li>
								<li><a href="#fuzzifikasi" data-toggle="tab">Fuzzifikasi</a></li>
								<li><a href="#flr" data-toggle="tab">Fuzzy Logic Relationship</a></li>
								<li><a href="#flrg" data-toggle="tab">Fuzzy Logic Relationship Group</a></li>
								<li><a href="#defuzzifikasi" data-toggle="tab">Defuzzifikasi FLRG</a></li>
								<li><a href="#hasil" data-toggle="tab">Hasil Peramalan</a></li>
								<li><a href="#akurasi" data-toggle="tab">Akurasi</a></li>
								<li><a href="#grafik" data-toggle="tab">Grafik</a></li>
							</ul>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="col-lg-12">
								<!-- /.panel-heading -->
								<div class="panel-body">
									<!-- Tab panes -->
									<div class="tab-content" style='margin-top:-20px'>
										<div class="tab-pane fade in active" id="interval">
											<?php
												$qry = "select * from bandwidth where id_projek = $id";
												$qryR = mysql_query($qry);
												while($data = mysql_fetch_array($qryR)){
													$data_band[] = $data['jumlah'];
													
												}
												
												$jml = 0;
												for($i=0; $i<(count($data_band)-1); $i++){
													if($data_band[$i] > $data_band[$i+1])
														$jml += $data_band[$i] - $data_band[$i+1];
													else 
														$jml += $data_band[$i+1] - $data_band[$i];
												}
												$jarak = round((($jml/(count($data_band)-1))/2),0);
												$jarak = $jarak/2;
												$jarak = round ($jarak, 0);
												
												$qry1 = "SELECT min(jumlah) as min FROM `bandwidth` where id_projek = $id";
												$qry2 = mysql_query($qry1);
												$min = mysql_fetch_array($qry2);
												$min = $min['min'];
												
												$qry3 = "SELECT max(jumlah) as max FROM `bandwidth` where id_projek = $id";
												$qry4 = mysql_query($qry3);
												$max = mysql_fetch_array($qry4);
												$max = $max['max'];

												$max = (round($max, -2)+100);
												$max = (round($max, -2)+100);
												
												
												$temp_min = $max;
												$temp_max = 0;
												$i=0;
												while($temp_min > $min){
													$temp_max = $temp_min;
													$temp_min = $temp_min-$jarak;
													$temp_interval[$i][0] = $temp_min;
													$temp_interval[$i][1] = $temp_max;
													$i++;
												}
												//$interval = transpose($temp_interval);
												$interval = ($temp_interval);
												echo "<br>";
												$temp_id= NULL;
												$qrygrapp = "select * from nilai_cheng where id_projek = $id";
															$qrygrappR = mysql_query($qrygrapp);
															if($qrygrappR){
																mysql_query("DELETE FROM nilai_cheng WHERE id_projek = $id");
																mysql_query("INSERT INTO nilai_cheng (id, id_projek, min, max, jarak) 
																VALUES ('".$temp_id."','".$id."','".$min."','".$max."','".$jarak."')");
															}else{
																mysql_query("INSERT INTO nilai_cheng (id, id_projek, min, max, jarak) 
																VALUES ('".$temp_id."','".$id."','".$min."','".$max."','".$jarak."')");
															}
												
											?>
											
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<?php
																$warna = array("danger","primary","success","info","warning");
																$count_warna = 0;
																for($i=0; $i<count($interval); $i++){
																	echo "<div class='col-xs-2 col-sm-2 col-md-2 col-lg-2'>";
																	echo "<a class='btn btn-sm btn-block btn-".$warna[$count_warna]." block' style='margin-top:10px;'>U<sub>".($i+1)."</sub></a>";
																	echo "<a class='btn btn-sm btn-block btn-default block' style='margin-bottom:10px;'><center>".$interval[$i][0]."-".$interval[$i][1]."</center></a>";
																	echo "</div>";
																	if($count_warna < 4) $count_warna++;
																	else $count_warna = 0;
																}
																
															?>
														</div>
										</div>
										<div class="tab-pane fade in" id="fuzzifikasi">
											<br>
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Tanggal</center></th>
														<th><center>Bulan</center></th>
														<th><center>Tahun</center></th>
														<th><center>Bandwidth</center></th>
														<th><center>Fuzzifikasi</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													
														$qryS = "SELECT k.id, k.id_projek, k.tanggal, b.nama as bulan, k.tahun, k.jumlah
																FROM `bandwidth` k, id_bulan b
																WHERE k.bulan = b.bulan and k.id_projek= $id";
														$qry2 = mysql_query($qryS);
														$i=0;
														while($data = mysql_fetch_array($qry2)){
															echo "<tr>";
															echo "<td><center>".($i+1)."</center></td>";
															echo "<td align='center'>".ucwords($data['tanggal'])."</td>";
															echo "<td align='center'>".ucwords($data['bulan'])."</td>";
															echo "<td align='center'>".ucwords($data['tahun'])."</td>";
															echo "<td><center>".$data['jumlah']."</center></td>";
															
															$indeks = cek_interval($data['jumlah'],$interval);
															$fuzzifikasi[$i] = $indeks;
															echo "<td><center>A<sub>".$indeks."</sub></center></td>";
															echo "</tr>";
															
															// save fuzzifikasi UPDATE `fts` SET `id_fts`=[value-1],`id_bandwidth`=[value-2],`fuzzyfikasi`=[value-3] WHERE 1
															//$qryFts = "UPDATE `fts` SET `id_projek`= ".$id.", `id`= ".$data['id'].",`fuzzyfikasi`= 'A".$indeks."' 
															//where `id_fts`= ".$data['id_fts'];
															//$qryFts2 = mysql_query($qryFts);
															//if(!$qryFts2) echo "Update Failure";
															
															$i++;
														}
														//print_r($fuzzifikasi[20])
													?>
													
												</tbody>
												</table>
											</div>
											<!-- /.table-responsive -->
										</div>
										
										<div class="tab-pane fade in" id="flr">
											<br>
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Urutan Waktu</center></th>
														<th><center>FLR</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
														
														$qryS = "SELECT k.id, k.id_projek, k.tanggal, b.bulan, b.nama as bulan, k.tahun, k.jumlah 
														FROM `bandwidth` k, id_bulan b 
														where k.bulan = b.bulan and k.id_projek= $id";
														$qry2 = mysql_query($qryS);
														while($dataa = mysql_fetch_array($qry2)){
															$waktu[] = $dataa;
														}
														/* for($i=0; $i<count($interval); $i++){
															$flrg[$i][0] = "";
														} */
														
														for($i=0; $i<(count($waktu)-1); $i++){
														
															echo "<tr>";
															echo "<td><center>".($i+1)."</center></td>";
															echo "<td style='padding-left:30px'>".ucwords($waktu[$i][4])." ".$waktu[$i][5]." - ".ucwords($waktu[($i+1)][4])." ".$waktu[($i+1)][5]."</td>";
															echo "<td><center>A<sub>".$fuzzifikasi[$i]."</sub> - A<sub>".$fuzzifikasi[($i+1)]."</sub></center></td>";
															echo "</tr>";
															
															$save_flrg[($fuzzifikasi[$i]-1)][] = $fuzzifikasi[($i+1)] ;
														}
														
															
													?>
												</tbody>
												</table>
											</div>
                            <!-- /.table-responsive -->
										</div>
										
										
										<div class="tab-pane fade in" id="flrg">
											<br>
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example3">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Current State</center></th>
														<th><center>Bandwidth Hasil Peramalan</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													
														for($i=0; $i<count($interval); $i++){
															if(!empty($save_flrg[$i])){
																$unik[$i] = array_unique($save_flrg[$i]);
																foreach($unik[$i] as $key=>$value){
																	$flrg[$i][] = $value;
																}
															}
														}
														$x=0;
														for($i=0; $i<count($interval); $i++){
															if(!empty($flrg[$i])){
																echo "<tr>";
																	echo "<td align='center'>".($x+1)."</td>";
																	echo "<td align='center'>A<sub>".($i+1)."</sub> => </td>";
																	echo "<td align='center'>";
																	for($j=0; $j<count($flrg[$i]); $j++){
																		if($j<(count($flrg[$i])-1))
																			echo "A<sub>".$flrg[$i][$j]."</sub>, ";
																		else
																			echo "A<sub>".$flrg[$i][$j]."</sub>";
																	}
																	echo "</td>";
																echo "</tr>";
																$x++;
															}
														}
													
													?>
													
												</tbody>
												</table>
											</div>
										<!-- /.table-responsive -->
										</div>
										
										<div class="tab-pane fade in" id="defuzzifikasi">
											<br>
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example4">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Current State</center></th>
														<th><center>Next State</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													
														
														for($i=0; $i<count($interval); $i++){
															$jml = 0;
															if(!empty($flrg[$i])){
																for($j=0; $j<count($flrg[$i]); $j++){
																	$jml += (($interval[($flrg[$i][$j]-1)][0] + $interval[($flrg[$i][$j]-1)][1])/2);
																}
																$rata2[] = $jml / count($flrg[$i]);
															}
															else{
																$rata2[] = (($interval[$i][0]+$interval[$i][1])/2);
															}
														}
														
														for($i=0; $i<count($rata2); $i++){
															echo "<tr>";
																echo "<td align='center'>".($i+1)."</td>";
																echo "<td align='center'>A<sub>".($i+1)."</sub></td>";
																echo "<td align='center'>".number_format($rata2[$i], 2)."</td>";
															echo "</tr>";
														}
														
														
													?>
												</tbody>
												</table>
											</div>
										<!-- /.table-responsive -->
										</div>
										
										<div class="tab-pane fade in" id="hasil">
											<br>
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example5">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Tanggal</center></th>
														<th><center>Bulan</center></th>
														<th><center>Tahun</center></th>
														<th><center>Bandwidth Aktual</center></th>
														<th><center>Fuzzifikasi</center></th>
														<th><center>Bandwidth Peramalan</center></th>
														<th><center>MAPE</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
														$_SESSION['interval'] = $interval;
														$_SESSION['rata2'] = $rata2;
														
														$qryS = "SELECT k.id, k.id_projek, k.tanggal, b.bulan, b.nama as bulan, k.tahun, k.jumlah 
														FROM `bandwidth` k, id_bulan b 
														where k.bulan = b.bulan and k.id_projek= $id";
														$qry2 = mysql_query($qryS);
														$i=0; $ramalan = "-"; $mape= 0;
														$hasila[]=[1];
														
														while($data = mysql_fetch_array($qry2)){
															echo "<tr>";
															echo "<td><center>".($i+1)."</center></td>";
															echo "<td align='center'>".ucwords($data['tanggal'])."</td>";
															echo "<td align='center'>".ucwords($data['bulan'])."</td>";
															echo "<td align='center'>".ucwords($data['tahun'])."</td>";
															echo "<td><center>".$data['jumlah']."</center></td>";
															
															$indeks = cek_interval($data['jumlah'],$interval);
															echo "<td><center>A<sub>".$indeks."</sub></center></td>";
															echo "<td><center>";
															
																if($i==0) echo $ramalan;
																else echo number_format($ramalan,0);
															echo "</center></td>";
															echo "<td><center>";
															$map = abs($data['jumlah']-$ramalan);
															$mape = $map*100/$data['jumlah'];
																if($i==0) echo $mape;
																else echo number_format($mape ,2);
															echo "</center></td>";
															echo "</tr>";
															
															$mapee[]=$mape;
															$fuzzy[]= $indeks;
															$temp_tanggal=$data['tanggal'];
															$toge[] = $temp_tanggal;
															
															if ($temp_bulan!=$data['bulan']){
																$tampung[] = $temp_bulan;
															}
															
															$temp_bulan = $data['bulan'];
															$temp_tahun = $data['tahun'];
															$jumlah = $data['jumlah'];
															$tempjum = $ramalan;
															$ramalan = $rata2[$indeks-1];
															$tah[]=$temp_tahun;
															$hasil[] = round($ramalan, 0);
															$hasila[] = round($ramalan, 0);
															$jumla[] = round($jumlah, 0);
															$i++;
														}	
															
															if ($temp_bulan!=$data['bulan']){
																$tampung[] = $temp_bulan;
																}

															$jumlah =  round($tempjum, 0);
															$lima= $i+$prediksi-1;
															for($i; $i<$lima; $i++){
																$tggl=cek_tanggal($temp_tanggal, $temp_bulan);
																$bln = cek_bulan($temp_bulan);
																$data_bln = mysql_fetch_array(mysql_query("select * from id_bulan where bulan = ".$bln));
																$bulan = $data_bln['nama'];
																$tahun = cek_tahun($bln, $temp_tahun);
																
																echo "<tr>";
																echo "<td><center>".($i+1)."</center></td>";
																echo "<td align='center'>".ucwords($tggl)."</td>";
																echo "<td align='center'>".ucwords($bulan)."</td>";
																echo "<td align='center'>".ucwords ($tahun)."</td>";
																echo "<td align='center'>".ucwords ($jumlah)."</td>";
																$indeks = cek_interval($jumlah,$interval);
																echo "<td><center>A<sub>".$indeks."</sub></center></td>";
																echo "<td><center>";
															
																if($i==0) echo $ramalan;
																else echo number_format($ramalan,0);
																echo "</center></td>";
																echo "<td><center>";
																	$map = abs($jumlah-$ramalan);
																	$mape = $map*100/$jumlah;
																if($i==0) echo $mape;
																else echo number_format($mape ,2);
																echo "</center></td>";
																echo "</tr>";
																
																$mapee[]=$mape;
																$fuzzy[]= $indeks;
																$jumla[] = round($jumlah, 0);
																$temp_tanggal=$tggl;
																$toge[] = $temp_tanggal;
																$temp_bulan = $bulan;
																if ($temp_bulan!=$data['bulan']){
																$tampung[] = $temp_bulan;
																}
																$temp_tahun = $tahun;
																$tah[]=$temp_tahun;
																$ramalan = $rata2[$indeks-1];
																$jumlah = round($ramalan, 0);
																$hasila[] = round($ramalan, 0);
																
															}
															
															
															$tggl=cek_tanggal($temp_tanggal, $temp_bulan);
															$bln = cek_bulan($temp_bulan);
															$data_bln = mysql_fetch_array(mysql_query("select * from id_bulan where bulan = ".$bln));
															$bulan = $data_bln['nama'];
															$tahun = cek_tahun($bln, $temp_tahun);
															$tampung[] = $bulan;
															$toge[] = $tggl;
															$tah[]=$tahun;

															echo "<tr>";
																echo "<td><center>".($i+1)."</center></td>";
																echo "<td align='center'>".ucwords($tggl)."</td>";
																echo "<td align='center'>".ucwords($bulan)."</td>";
																echo "<td align='center'>".ucwords ($tahun)."</td>";
																echo "<td align='center'>-</td>";
																echo "<td><center>-</center></td>";
																echo "<td><center>".number_format($ramalan,0)."</center></td>";
																echo "<td><center>";
																	$map = abs($jumlah-$ramalan);
																	$mape = $map*100/$data['jumlah'];
																if($i==0) echo $mape;
																else echo number_format($mape ,2);
																echo "</center></td>";
															echo "</tr>";
															
															$mapee[]=$mape;
															$qrygrap = "select * from hasil_akhir where id_projek = $id";
															$qrygrapR = mysql_query($qrygrap);
															if($qrygrapR){
																mysql_query("DELETE FROM hasil_akhir WHERE id_projek = $id");
																for($i=0; $i<(count($hasila)); $i++){
																	$result[] = array(
																		'id' => NULL,
																        'id_projek'  => $id,
																        'tanggal' => $toge[$i],
																        'bulan'    => $tampung[$i+1],
																		'tahun'    => $tah[$i],
																		'fuzzy'    => $fuzzy[$i],
																        'jumlah'    => $jumla[$i],
																        'hasil_ramal'    => $hasila[$i],
																		'mape'    => $mapee[$i],
																    );
																}

																foreach ($result as $test) {
																mysql_query("INSERT INTO hasil_akhir (id, id_projek, tanggal, bulan, tahun, fuzzy, jumlah, hasil_ramal, mape) 
																VALUES ('".$test[id]."','".$test[id_projek]."','".$test[tanggal]."','".$test[bulan]."','".$test[tahun]."','".$test[fuzzy]."','".$test[jumlah]."','".$test[hasil_ramal]."','".$test[mape]."')");

																}
															}else{
																for($i=0; $i<(count($hasila)); $i++){
																	$result[] = array(
																		'id' => NULL,
																        'id_projek'  => $id,
																        'tanggal' => $toge[$i],
																        'bulan'    => $tampung[$i+1],
																		'tahun'    => $tah[$i],
																		'fuzzy'    => $fuzzy[$i],
																        'jumlah'    => $jumla[$i],
																        'hasil_ramal'  => $hasila[$i],
																		'mape'    => $mapee[$i],
																    );
																}

																foreach ($result as $test) {
																mysql_query("INSERT INTO hasil_akhir (id, id_projek, tanggal, bulan, tahun, fuzzy, jumlah, hasil_ramal, mape) 
																VALUES ('".$test[id]."','".$test[id_projek]."','".$test[tanggal]."','".$test[bulan]."','".$test[tahun]."','".$test[fuzzy]."','".$test[jumlah]."','".$test[hasil_ramal]."','".$test[mape]."')");

																}
															}
													?>

												</tbody>
												</table>
											</div>
										<!-- /.table-responsive -->
										</div>
										
										<div class="tab-pane fade in" id="akurasi">
											<br>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<?php
														
														$i=0; $jml = 0;
														$row = 0;
														while($i<count($mapee)){
															$jml += $mapee[$i];
															$i++;
															$row++;
														}
														$row = $row-2;
														$akurasi = ($jml-100)/$row;
														echo "<button class='btn btn-info'>MAPE</button>&nbsp;= <u>100 % x ".number_format($jml,2);
														echo "</u><br/>";
														echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
														echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
														echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row;
														echo "<br/>";
														
														echo "<button class='btn btn-info'>MAPE</button>&nbsp;= ".number_format($akurasi,2)." %";
														echo "<br/>";
														
													?>
												</div>
										</div>
										
										<div class="tab-pane fade in" id="grafik">
											<br>
												<canvas id="lineChart"></canvas>
										</div>
										
									</div>
								</div>
								<!-- /.panel-body -->
			</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
    </div>
                <!-- /.col-lg-12 -->
</div>
<?php $title="Proses%20Peramalan"; $tipe="Fuzzy%20Time%20Series";
	echo "<script type=\"text/javascript\">alert('Proses Peramalan Berhasil');document.location = '../fungsi/detail/$id/$title/$tipe'</script>"; ?>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url() ?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url() ?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
		
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
                responsive: true
        });
    });
    </script>
	
	 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
                responsive: true
        });
    });
    </script>
	
	
	 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
                responsive: true
        });
    });
    </script>
	
	
	 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example5').DataTable({
                responsive: true
        });
    });
    </script>
	
	 <script>
    	//line
    var dataa = new Array();
    <?php foreach($hasila as $key => $val){ ?>
        dataa.push('<?php echo $val; ?>');
    <?php } ?>

    var juml = new Array();
    <?php foreach($jumla as $key => $val1){ ?>
        juml.push('<?php echo $val1; ?>');
    <?php } ?>

    var tamp = new Array();
    <?php foreach($tampung as $key => $val1){ ?>
        tamp.push('<?php echo $val1; ?>');
    <?php } ?>
	
	var ctxL = document.getElementById("lineChart").getContext('2d');
	var myLineChart = new Chart(ctxL, {
	type: 'line',
	data: {
	labels: tamp,
	datasets: [{
	label: "Bandwidth Aktual",
	data: juml,
	backgroundColor: [
	'rgba(105, 0, 132, .2)',
	],
	borderColor: [
	'rgba(200, 99, 132, .7)',
	],
	borderWidth: 2
	},
	{
	label: "Bandwidth Hasil Ramal",
	data: dataa,
	backgroundColor: [
	'rgba(0, 137, 132, .2)',
	],
	borderColor: [
	'rgba(0, 10, 130, .7)',
	],
	borderWidth: 2
	}
	]
	},
	options: {
	responsive: true
	}
	});

    </script>
	