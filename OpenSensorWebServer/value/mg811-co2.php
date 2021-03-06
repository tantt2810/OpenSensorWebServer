<?php
	session_start();
	if(!isset($_SESSION['login'])){
		header("location: ../login.php");
	}
	else{}

	include('../connection.php');

	if(isset($_POST['setting'])){
		$threshold_value = $_POST['thresholdvalue'];
		$threshold_color = $_POST['thresholdcolor'];

		//Check exist MQ2
		$rs1 = mysqli_query($conn, "SELECT SENSORMODEL FROM thresholdvalue WHERE SENSORMODEL = 'MG811'");
		if(mysqli_num_rows($rs1) > 0){
			$sql = "UPDATE thresholdvalue SET THRESHOLD_VALUE = ".$threshold_value.", THRESHOLD_COLOR = '".$threshold_color."' WHERE SENSORMODEL = 'MG811'";
		}
		else{
			$sql = "INSERT INTO thresholdvalue (SENSORMODEL, THRESHOLD_VALUE, THRESHOLD_COLOR)
			VALUES ('MG811', ".$threshold_value.", '".$threshold_color."')";
		}	
		if (mysqli_query($conn, $sql)) {
		    header("location: ../index.php");
		} else {
		    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		    header("location: ../index.php");
		}
	}

	$result = mysqli_query($conn, "SELECT TIME, GAS, VALUE, UNIT FROM sensorvalue WHERE SENSORMODEL = 'MG811' ORDER BY TIME DESC LIMIT 1");

	$result2 = mysqli_query($conn, "SELECT THRESHOLD_VALUE, THRESHOLD_COLOR FROM thresholdvalue WHERE SENSORMODEL = 'MG811'");

	if($result->num_rows > 0){
		if(mysqli_num_rows($result2) <= 0){
			$thresholdvalue = 0;
			$thresholdcolor = '#0000FF';	
		}
		else{
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

		    $thresholdvalue = $row2['THRESHOLD_VALUE'];
		    $thresholdcolor = $row2['THRESHOLD_COLOR'];	
		}
		

		$row = mysqli_fetch_array($result);

		// $output = "<td>".$row['TIME']."</td>".

		$date=date_create($row['TIME']);
		$date = date_format($date,"d-m-Y H:i:s");

		$output = "<td>".$date."</td>".
			    "<td>".$row['GAS']."</td>";
		
	    

		    if($row['VALUE'] < $thresholdvalue){
			    $output .= "<td>".$row['VALUE']."</td>";
		    }
			else{
				$output .= "<td><span style='color: ".$thresholdcolor."'> ".$row['VALUE']."</span></td>";
			}
			$output .= "<td>".$row['UNIT']."</td>";

			echo $output;
	}
?>