<?php

include "PHPExcel/IOFactory.php";

	$connect = mysql_connect("localhost", "root", "");
	if(! $connect) echo "koneksi localhost gagal"; 
	
	$db = mysql_select_db("codeignitor");
	if(! $db) echo "koneksi database gagal"; 

	
    if (!empty($_FILES['file']['name'])) {
//print_r($_FILES['excelupload']);
        $namearr = explode(".", $_FILES['file']['name']);
        if (end($namearr) != 'xls' && end($namearr) != 'xlsx') {
            echo '<p> Invalid File </p>';
            $invalid = 1;
        }
    }
    if ($invalid != 1) {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $response = move_uploaded_file($_FILES['file']['tmp_name'], $target_file); // Upload the file to the current folder

        if ($response) {

            try {
                $objPHPExcel = PHPExcel_IOFactory::load($target_file);
            } catch (Exception $e) {
                die('Error : Unable to load the file : "' . pathinfo($_FILES['file']['name'], PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
//print_r($allDataInSheet);
            $arrayCount = count($allDataInSheet); // Total Number of rows in the uploaded EXCEL file
//echo $arrayCount;
        }
	    $id = $_POST['id'];
		$title = $_POST['title'];
        for($i=2;$i<=$arrayCount;$i++){

            $empid= $id;
            $name = trim($allDataInSheet[$i]["A"]);
            $address = trim($allDataInSheet[$i]["B"]);
			//$address1 = trim($allDataInSheet[$i]["C"]);
			//$address2 = trim($allDataInSheet[$i]["D"]);
			
			$dateArray = date_parse_from_format('d/m/Y', $name);
			$address1 = $dateArray['day'];
			$address2 = $dateArray['month'];
			$address3 = $dateArray['year'];
			
			//$string = "INSERT INTO bandwidth VALUES( '' , '".$empid."' , '".$name ."','".$address ."','".$address1 ."','".$address2 ."'),";
            $string = "INSERT INTO bandwidth VALUES( '' , '".$empid."' , '".$address1 ."','".$address2 ."','".$address3 ."','".$address ."'),";
            $string = substr($string,0,-1);


            mysql_query($string) or die(mysql_error());
            $qry_max = mysql_query("select max(id) as jml from bandwidth");
            $qry_max2 = mysql_fetch_array($qry_max);
            $jml_data_bandwidth = $qry_max2['jml'];
			
        }
         // Insert all the data into one query
    }// End Invalid Condition
	$query_data = "UPDATE projek SET data_aktual = 1 WHERE id = $id";
	mysql_query($query_data) or die(mysql_error());
		 
echo "<script type=\"text/javascript\">alert('Data berhasil di Import');document.location = '../data/detail/$id/$title'</script>";

