
	<head>
	
    <!-- DataTables CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url() ?>assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

	
	</head>

<div class="content-wrapper">
	<section class="content">
	<section class="content">
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
								<button type="button" onclick="window.location='<?php echo site_url("fungsi/export/".$id."/".$title);?>'" class="btn btn-primary" style="float:right;">
					                Export (.xls)
					            </button>
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
										
										<div class="tab-pane fade in active" id="hasil">
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
										                $no =1; $row=-1; $akurasi=0;
										                foreach($detail as $dtl) : ?>
															<?php $akurasi += $dtl->mape; $row++; 
																$hasila[] = $dtl->hasil_ramal;
																$jumla[] = $dtl->jumlah;
																$toge[] = $dtl->tanggal;
																$tog = ($dtl->tanggal." ".ucwords($dtl->bulan));
																$tampung[] = $tog;
															?>
															<tr>
																<td><center><?php echo $no++ ?></center></td>
												                <td align="center"><?php echo $dtl->tanggal ?></td>
												                <td align="center"><?php echo ucwords($dtl->bulan) ?></td>
												                <td align="center"><?php echo $dtl->tahun ?></td>
												                <td align="center"><?php echo $dtl->jumlah ?></td>
												                <td align="center">A<?php echo $dtl->fuzzy ?></td>
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
														$row = $row-1;
														$akurat =  $akurasi/$row;?>

														<button class='btn btn-info'>MAPE</button> &nbsp;  <u>100 % x <?php echo number_format($akurasi); ?>
														</u><br/>
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
														&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row;  ?>
														<br/>
														
														<button class='btn btn-info'>MAPE</button> &nbsp; = <?php echo number_format($akurat,2) ?> %
														<br/>
														
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
    </section>
                <!-- /.col-lg-12 -->
    </section>
</div>

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