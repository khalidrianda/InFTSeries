<!DOCTYPE html>
<html>
<head>
	<title>Daftar Bandwidth Bulanan</title>
</head>
<body>

	<table border="1px solid black">
		<tr>
			<th>Bulan</th>
			<th>Tahun</th>
			<th>Bandwidth</th>
		</tr>

		<?php foreach ($fuzzy as $fzy) : ?>
		<tr>
			<td><?php echo $fzy['id_bulan']; ?></td>
			<td><?php echo $fzy['tahun']; ?></td>
			<td><?php echo $fzy['jumlah']; ?></td>
		</tr>
	<?php endforeach; ?>

	</table>

</body>
</html>