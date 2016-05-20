<?php
	session_start();
	if(!isset($_SESSION['login'])){
		header("location: ../login.php");
	}	 
?>
<!DOCTYPE html>
<html>
<head>
	<title>He Thong Hien Thi Du Lieu Cam Bien</title>
	<link rel="stylesheet" href="../css/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/font-awesome-4.5.0/css/font-awesome.min.css">
	<script type="text/javascript" src="../js/jquery-1.12.2.min.js"></script>
	<script type="text/javascript" src="../css/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style type="text/css">
		#title{
			/*height: 5%;*/
			text-align:left;
		}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" style="background-color: #f1f1f1">
			<div class="col-md-1"></div>
			<div class="col-md-9">
				<!-- <h3 style="font-family:'Roboto Condensed', sans-serif" id="title">HỆ THỐNG GIÁM SÁT QUAN TRẮC CHẤT LƯỢNG KHÔNG KHÍ</h3> -->
				<marquee behavior="alternate" direction="left" scrollamount="3"><h3>HỆ THỐNG GIÁM SÁT QUAN TRẮC CHẤT LƯỢNG KHÔNG KHÍ</h3></marquee>
			</div>
			<div class="col-md-2" style="text-align:right">
				<br>
				<div class="btn-group">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="fa fa-user"></i> admin <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu pull-right">
				    <li><a href="../logout.php"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
				  </ul>
				</div>
			</div>
		</div>
		<!-- <br> -->

		<div class="row">
			<img class="img-rounded" alt="Responsive image" src="../images/pollution-banner1.jpg" width="100%" height= "30%">
		</div>

		<div class="row">
			<ul><li><h3><i>Dữ liệu cảm biến GP2Y10</i></h3></li></ul>
				<?php
					include('../connection.php');
					$sql = "SELECT * FROM sensorvalue WHERE SENSORMODEL = 'GP2Y10' ORDER BY TIME DESC";
				      $result = mysqli_query($conn, $sql);  
				      if(mysqli_num_rows($result) > 0)  
				      {  
				           $output = '  
				                <table class="table table-hover table-bordered table-striped">  
				                     <tr>  
				                          <th>Model</th>  
				                          <th>Nồng độ</th>  
				                          <th>Thời điểm</th>  
				                          <th>Giá trị</th>  
				                          <th>Đơn vị</th>  
				                     </tr>  
				           ';  
				           while($row = mysqli_fetch_array($result))  
				           {  
				                $output .= '  
				                     <tr>  
				                          <td>'.$row["SENSORMODEL"].'</td>  
				                          <td>'.$row["GAS"].'</td>  
				                          <td>'.$row["TIME"].'</td>  
				                          <td>'.$row["VALUE"].'</td>  
				                          <td>'.$row["UNIT"].'</td>  
				                     </tr>  
				                ';  
				           }  
				           $output .= '</table>';  
				           // header("Content-Type: application/xls");   
				           // header("Content-Disposition: attachment; filename=download.xls");  
				           echo $output;
				       }
				?>
			<input class="btn btn-primary" value="Quay lại" type="submit" onclick="window.location='../index.php'"> 

		</div>

		<div class="row">
			<hr>
			<h5>Copyright © 2016 by <a style="cursor: pointer"><b>TAN TRAN</b></a> </h5>
		</div>
		
	</div>

</body>
</html>