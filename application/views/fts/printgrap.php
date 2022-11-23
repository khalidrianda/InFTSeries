<?php 
    		$no =1; $row=-1; $akurasi=0;
			foreach ($data as $dtl) {
				$akurasi += $dtl->mape; $row++; 
			
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
			}			
		?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>


		 <div>
		<br style="padding: 10px">
			<canvas id="lineChart"></canvas>
		</div>

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
    <script>
		// window.load = print_d();  
		// function print_d(){  
	 		window.print();
	 	//}  
</script>