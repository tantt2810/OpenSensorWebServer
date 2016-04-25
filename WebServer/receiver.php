<?php 
	include('connection.php');

	$val1 = $_GET['mq2'];
	$val2 = $_GET['mq135'];
	$val3 = $_GET['mg811'];
	$val4 = $_GET['gp2y10'];

	$fileContent = "MQ2: ".$val1." - MQ135: ".$val2." - MG811: ".$val3." - GP2Y10: ".$val4."\n";

	$fileStatus = file_put_contents('myFile.txt', $fileContent, FILE_APPEND);

	date_default_timezone_set("Asia/Bangkok");

	$result1 = $conn->query("INSERT INTO sensorvalue(SENSORMODEL, GAS, TIME, VALUE, UNIT) VALUES('MQ2', 'LPG', '".date("Y-m-d H:i:s")."',".$val1.",'ppm')");
	$result2 = $conn->query("INSERT INTO sensorvalue(SENSORMODEL, GAS, TIME, VALUE, UNIT) VALUES('MQ135', 'CO', '".date("Y-m-d H:i:s")."',".$val2.",'ppm')");
	$result3 = $conn->query("INSERT INTO sensorvalue(SENSORMODEL, GAS, TIME, VALUE, UNIT) VALUES('MG811', 'CO2', '".date("Y-m-d H:i:s")."',".$val3.",'ppm')");
	$result4 = $conn->query("INSERT INTO sensorvalue(SENSORMODEL, GAS, TIME, VALUE, UNIT) VALUES('GP2Y10', 'BUI', '".date("Y-m-d H:i:s")."',".$val4.",'mg/m3')");

	if($fileStatus != false){
		echo "SUCCESS: data written to file";
	}
	else{
		echo "FAIL: could not written data to file";
	}


	if($result4 == true)
		echo "INSERT SUCCESS !!!";
	else 
		echo "INSERT FAIL !!!";
?>