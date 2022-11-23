<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>


<body>
    <div class="header">
        <h3 style="text-align:center; margin-top: 0px;"><strong>Laporan Hasil Peramalan</strong></h3>

        <h1 align="center">_____________________________________________________</h1>
    </div>
    <div style="padding: 10px;" class="col-lg-8" >
        <table class="table table-striped table-bordered table-hover"  border='1' style="text-align: center;">
        <thead>
        <tr>
            <td >Date</td>
            <td >Actual</td>
            <td >Fuzzified</td>
            <td >Forcasted</td>
        </tr>
        </thead>
            <tbody>
            <?php 
                $no =1; 
                foreach($data as $dtl) : ?>
                <tr>
                    <td><?php echo $dtl->tanggal." ".ucwords($dtl->bulan)." ".$dtl->tahun; ?></td>
                    <td><?php echo $dtl->jumlah; ?></td>
                    <td><?php echo "A".$dtl->fuzzy; ?></td>
                    <td><?php echo $dtl->hasil_ramal; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        
</table>
    </div>
</body>

<script>
		// window.load = print_d();  
		// function print_d(){  
	 		window.print();
	 	//}  
</script>
