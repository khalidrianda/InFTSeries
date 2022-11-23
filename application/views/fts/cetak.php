<?php
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=databandwidth.xls");
?>

<table border='1'>
    <h3>
        <thead>
        <tr>
			<td>Date</td>
			<td>Actual</td>
			<td>Fuzzified</td>
			<td>Forcasted</td>
        </tr>
        </thead>
        <h3>
            <tbody>
            <?php 
                $no =1; 
                foreach($data as $dtl) : ?>
                <tr>
					<td ><?php echo $dtl->tanggal." ".ucwords($dtl->bulan)." ".$dtl->tahun; ?></td>
					<td ><?php echo $dtl->jumlah; ?></td>
					<td ><?php echo "A".$dtl->fuzzy; ?></td>
					<td ><?php echo $dtl->hasil_ramal; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </h3>
</table>