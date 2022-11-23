
<div class="content-wrapper">
	<section class="content-header">
		<h1 class="page-header"><b>.:: <?php echo $title; ?> ::.</b><!-- Button trigger modal -->
		</h1>
		<ol class="breadcrumb">
        <li><a href="<?php echo base_url('projek'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('fungsi/proses'); ?>"><i class="fa fa-dashboard"></i> Proses Peramalan</a></li>
        <li class="active"><?php echo $title; ?></li>
      </ol>
	</section>
	<section class="content">
<!-- /.row -->
	<div class="modal fade" id="addSurvey" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			
			<div class="modal-dialog">
				<div class="modal-content">
					
				</div>
				<button type="button" onclick="window.location='<?php echo site_url("fungsi/export/".$id."/".$title);?>'" class="btn btn-primary" style="float:right;">
				 Export (.xls)</button>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
	</div>	

                    <div class="panel panel-info">
                        <div class="panel-heading">
							<ul class="nav nav-pills">
								
					            
					            <li><a href="#interval" data-toggle="tab">Nilai Linguistik</a></li>
								<li><a href="#fuzzifikasi" data-toggle="tab">Fuzzifikasi</a></li>
								<li><a href="#flr" data-toggle="tab">Aturan Transisi</a></li>
								<li><a href="#flrg" data-toggle="tab">Rule Fuzzy Time Series</a></li>
								<li><a href="#defuzzifikasi" data-toggle="tab">Defuzzifikasi Rule</a></li>
								<li class="active"><a href="#hasil" data-toggle="tab">Hasil Peramalan</a></li>
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
										
										<div class="tab-pane fade in" id="interval">
											<?php foreach($nilai as $pjk) : ?>
											<?php 
												if($tipe=="FTSCHENG"){
													$min = $pjk->min;
													$max= $pjk->max;
													$jarak = $pjk->jarak;
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
													$interval = ($temp_interval);
													
												}else{
													$DU = $pjk->DU;
													$DL = $pjk->DL; $o= $pjk->interval_o;
													$min = $pjk->min;
													$max= $pjk->max;

													$temp_min = $max;
													$temp_max = 0;
													$i=0;
													$angka = 1;
													
													while ($o>$i){
														$temp_min = round ($min+(($angka-1)*(($DU-$DL)/$o)), 0);
														$temp_max = round ($min+($angka*(($DU-$DL)/$o)), 0);
														if($DU > $temp_max){
															$temp_interval[$i][0] = $temp_min;
															$temp_interval[$i][1] = $temp_max;
														}else{
															$temp_max=round($max, 0);
															$temp_interval[$i][0] = $temp_min;
															$temp_interval[$i][1] = $temp_max;
														}
														$angka++;
														$i++;
													}
													$interval = ($temp_interval);
												}
											 ?>
											<?php endforeach; ?>
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
														<th><center>Data Aktual</center></th>
														<th><center>Fuzzifikasi</center></th>
														
													</tr>
												</thead>
												<tbody>
													<?php 
										                $no =1; $i=0; $a=count($detail);
										                foreach($detail as $dtl) : 
										                	if ($i == ($a-1)) { break; }?>
															<tr>
																<td><center><?php echo $no++ ?></center></td>
												                <td align="center"><?php echo $dtl->tanggal." ".ucwords($dtl->bulan)." ".$dtl->tahun ?></td>
												                <td align="center"><?php echo $dtl->jumlah ?></td>
												                <td align="center">A<sub><?php echo $dtl->fuzzy ?></sub></td>
												                <?php $i++; ?>

															</tr>
															
													 <?php endforeach; ?>
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
														$i=0;
														foreach ($detail as $dtl) : ?>
													<?php 	
															$temp_intervall[$i][0] = $dtl->tanggal;
															$temp_intervall[$i][1] = $dtl->bulan;
															$temp_intervall[$i][2] = $dtl->tahun;
															$temp_intervall[$i][3] = $dtl->fuzzy;
															$i++;
													 ?>
													<?php endforeach; ?>

													 <?php $waktu = ($temp_intervall); ?>
													 
													<?php
														

														for($i=0; $i<(count($waktu)-2); $i++){
														
															echo "<tr>";
															echo "<td><center>".($i+1)."</center></td>";
															echo "<td style='padding-left:30px'>".ucwords($waktu[$i][0])." ".ucwords($waktu[$i][1])." ".$waktu[$i][2]." &rarr; ".ucwords($waktu[$i+1][0])." ".ucwords($waktu[($i+1)][1])." ".$waktu[($i+1)][2]."</td>";
															echo "<td><center>A<sub>".$waktu[$i][3]."</sub> &rarr; A<sub>".$waktu[($i+1)][3]."</sub></center></td>";
															echo "</tr>";

															$save_flrg[($waktu[$i][3]-1)][] = $waktu[($i+1)][3] ;
														}
														
															
													?>
												

												</tbody>
												</table>
											</div>
                            <!-- /.table-responsive -->
										</div>

										<div class="tab-pane fade in" id="flrg">
											<br>
											<div class="col-lg-10" style="align-content: center;">
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example3">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Rules Fuzzy Time Series</center></th>
													</tr>
												</thead>
												<tbody>
													<?php
													
														for($i=0; $i<(count($waktu)); $i++){
															if(!empty($save_flrg[$i])){
																$unik[$i] = array_unique($save_flrg[$i]);
																foreach($unik[$i] as $key=>$value){
																	$flrg[$i][] = $value;
																}
															}
														}
														$x=0;
														for($i=0; $i<(count($waktu)); $i++){
															if(!empty($flrg[$i])){
																
																	for($j=0; $j<count($flrg[$i]); $j++){
																		if($j<(count($flrg[$i])-1)){
																			echo "<tr>";
																			echo "<td align='center'>".($x+1)."</td>";
																			echo "<td align='center'>{ r<sub>".($x+1)."</sub> : A<sub>".($i+1)."</sub> &rarr;";
																			
																			echo "A<sub>".$flrg[$i][$j]."</sub> }";
																			echo "</td>";
																			echo "</tr>";
																			$x++;
																		}else{
																			echo "<tr>";
																			echo "<td align='center'>".($x+1)."</td>";
																			echo "<td align='center'>{ r<sub>".($x+1)."</sub> : A<sub>".($i+1)."</sub> &rarr;";
																			
																			echo "A<sub>".$flrg[$i][$j]."</sub> }";
																			echo "</td>";
																			echo "</tr>";
																			$x++;
																		}
																	}
																	
															}
														}
													
													?>
													
												</tbody>
												</table>
											</div>
										<!-- /.table-responsive -->
										</div>
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


										<div class="tab-pane fade in active" id="hasil">
											<br>
											<div class="dataTable_wrapper">
												<table class="table table-striped table-bordered table-hover" id="dataTables-example5">
												<thead>
													<tr>
														<th><center>No</center></th>
														<th><center>Tanggal</center></th>
														<th><center>Data Aktual</center></th>
														<th><center>Fuzzifikasi</center></th>
														<th><center>Data Hasil Peramalan</center></th>
														<th><center>MAPE</center></th>
													</tr>
												</thead>
												<tbody>
													<?php 
										                $no =1; $row=-1; $akurasi=0;
										                foreach($detail as $dtl) : ?>
															<?php $akurasi += $dtl->mape; $row++; 
																
																if($dtl->jumlah==0){
																	$jumla[] = "-";
																}else{
																	$jumla[] = $dtl->jumlah;	
																}
																if($dtl->hasil_ramal==0){
																	$hasila[] = "-";
																}else{
																	$hasila[] = $dtl->hasil_ramal;
																}
																$toge[] = $dtl->tanggal;
																$tog = ($dtl->tanggal." ".ucwords($dtl->bulan)." ".$dtl->tahun);
																$tampung[] = $tog;
															?>
															<tr>
																<td><center><?php echo $no++ ?></center></td>
												                <td><?php echo $dtl->tanggal." ".ucwords($dtl->bulan)." ".$dtl->tahun ?></td>
												                <td align="center"><?php echo $dtl->jumlah ?></td>
												                <td align="center">A<sub><?php echo $dtl->fuzzy ?></sub></td>
												                <td align="center"><?php echo $dtl->hasil_ramal ?></td>
												                <td align="center"><?php echo number_format($dtl->mape, 2) ?></td>
															</tr>
															
													 <?php endforeach; ?>
												</tbody>
												</table>
											</div>
										<!-- /.table-responsive -->
										</div>
										
										<div class="tab-pane fade in" id="akurasi">
											<br>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<?php
														$akurasi = $akurasi-100;
														$query=$this->db->query('SELECT * FROM bandwidth WHERE id_projek = '.$id);
															$row = $query->num_rows()-1;
														$akurat =  $akurasi/$row;?>

														<button class='btn btn-info'>MAPE</button> &nbsp;  <u>100 % x <?php echo number_format($akurasi); ?>
														</u><br/>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row;  ?>
														<br/>
														
														<button class='btn btn-info'>MAPE</button> &nbsp; = <?php echo number_format($akurat,2) ?> %
														<br/>
														<br>
														<?php if($akurat<10){
														echo '<button class="btn btn-success">PERAMALAN SANGAT BAIK</button>';
														}else if($akurat<20){
														echo '<button class="btn btn-info">PERAMALAN BAIK</button>';
														}else if($akurat<30){
														echo '<button class="btn btn-warning">PERAMALAN CUKUP</button>';
														}else if($akurat>30){
														echo '<button class="btn btn-danger">PERAMALAN TIDAK AKURAT</button>';
														}
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
    
                <!-- /.col-lg-12 -->
    </section>
</div>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  	
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
	label: "Data Aktual",
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
	label: "Data Hasil Ramal",
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
    