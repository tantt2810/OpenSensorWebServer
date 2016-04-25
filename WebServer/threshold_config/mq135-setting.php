<?php
session_start();
if(!isset($_SESSION['login'])){
  header("location: ../login.php");
}
else{
  include('../connection.php');
  if($_POST)
  {
    $model=$_POST['model'];
    $query1=mysqli_query($conn,"select THRESHOLD_VALUE, THRESHOLD_COLOR from thresholdvalue where SENSORMODEL='".$model."'");
    $val1 = '';
    $val2 = '';

    if(mysqli_num_rows($query1) > 0){
    	$query2=mysqli_fetch_array($query1);	
    	$val1=$query2['THRESHOLD_VALUE'];
      $val2=$query2['THRESHOLD_COLOR'];
    }
    else{
    	$val1="0";
      $val2="#0000FF";
    }
    
    // {
      
    // }
    $response=array(
              'val1'=>$val1,
              'val2'=>$val2,
              );  
  }
  print json_encode($response);
}
?>