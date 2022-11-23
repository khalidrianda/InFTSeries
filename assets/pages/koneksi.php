<?php
	error_reporting(0);
	$connect = mysql_connect("localhost", "root", "");
	if(! $connect) echo "koneksi localhost gagal"; 
	
	$db = mysql_select_db("codeignitor");
	if(! $db) echo "koneksi database gagal"; 

?>