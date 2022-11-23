<?php
	function transpose($temp_interval){
		$x = 0;
		for($i=count($temp_interval); $i>0; $i--){
			$data[$x] = $temp_interval[$i-1];
			$x++;
		}
		return $data;
	}
	
	function cek_interval($data, $interval){
		$indeks = 0;
		for($i=0; $i<count($interval); $i++){
			if(($data >= $interval[$i][0]) && ($data < $interval[$i][1]))
				$indeks = ($i+1);
		}
		return $indeks;
	}
	
	function cek_tanggal($temp_tanggal, $temp_bulan){
		if ($temp_bulan="januari" OR $temp_bulan="maret" OR $temp_bulan="mei" 
		OR $temp_bulan="juli" OR $temp_bulan="agustus" OR $temp_bulan="oktober" OR $temp_bulan="desember"){
			if($temp_tanggal != 31){
				$tanggal = ($temp_tanggal+1);
			}
			else{
				$tanggal = 1;
			}return $tanggal;
		}else if($temp_bulan="april" OR $temp_bulan="juni" OR $temp_bulan="september" OR $temp_bulan="november"){
			if($temp_tanggal != 30){
				$tanggal = ($temp_tanggal+1);
			}
			else{
				$tanggal = 1;
			}return $tanggal;
		}else{
			if($temp_tanggal != 28){
				$tanggal = ($temp_tanggal+1);
			}
			else{
				$tanggal = 1;
			}return $tanggal;
		}
	}
	
	
	function cek_bulan($temp_bulan){
		$qry = "select * from id_bulan where nama = '".$temp_bulan."'";
		$qry1 = mysql_query($qry);
		$data = mysql_fetch_array($qry1);
		if($data['bulan'] != 12)
			$bulan = ($data['bulan']);
		else
			$bulan = $data['bulan'];
		return $bulan;
	}	
	
	function cek_tahun($temp_tahun){
		$temp_tahun = ($temp_tahun+1);
		return $temp_tahun;
	}
	
	function cekk_bulan($temp_tanggal, $temp_bulan){
		$qry = "select * from id_bulan where nama = '".$temp_bulan."'";
		$qry1 = mysql_query($qry);
		$data = mysql_fetch_array($qry1);
		if($data['bulan'] != 12){
			if ($temp_bulan="januari" OR $temp_bulan="maret" OR $temp_bulan="mei" 
		OR $temp_bulan="juli" OR $temp_bulan="agustus" OR $temp_bulan="oktober" OR $temp_bulan="desember"){
			if($temp_tanggal != 31){
				$bulan = ($data['bulan']);
			}
			else{
				$bulan = ($data['bulan']+1);
			}
		}else if($temp_bulan="april" OR $temp_bulan="juni" OR $temp_bulan="september" OR $temp_bulan="november"){
			if($temp_tanggal != 30){
				$bulan = ($data['bulan']);
			}
			else{
				$bulan = ($data['bulan']+1);
			}
		}else{
			if($temp_tanggal != 28){
				$bulan = ($data['bulan']);
			}
			else{
				$bulan = ($data['bulan']+1);
			}
		}
		}else{
			$bulan = 1;
		}
		return $bulan;
	}
	
?>
