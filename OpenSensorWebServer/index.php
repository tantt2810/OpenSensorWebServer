<?php
session_start();
if(!isset($_SESSION['login'])){
	header("location: login.php");
}
else{}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HỆ THỐNG GIÁM SÁT QUAN TRẮC CHẤT LƯỢNG KHÔNG KHÍ</title>
	<link rel="stylesheet" href="css/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome-4.5.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery-1.12.2.min.js"></script>
	<script type="text/javascript" src="css/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="css/jscolor/jscolor.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style type="text/css">
		#title{
			/*height: 5%;*/
			text-align:left;
		}
		#row1{
			/*height:50%;*/
		}
		#row2{
			/*height:50%;*/
		}
		#mq2{
			/*height:90%; */
			border: 2px solid; 
			border-radius: 10px;
			/*background-color: #888888;*/
		}
		#mq135{
			/*height:90%;*/
			border: 2px solid; 
			border-radius: 10px;
		}
		#mg811{
			/*height:90%; */
			border: 2px solid; 
			border-radius: 10px;
		}
		#gp2y10{
			/*height:90%; */
			border: 2px solid; 
			border-radius: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" style="background-color: #f1f1f1" id="header">
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
				    <li><a href="logout.php"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
				  </ul>
				</div>
			</div>
		</div>
		<!-- <br> -->

		<div class="row">
			<img class="img-rounded" alt="Responsive image" src="images/pollution-banner1.jpg" width="100%" height= "auto">
		</div>
	<!-- </div> -->

	<br>

	<!-- <div class="container"> -->
		<div class="row" id="row1">
			<div class="col-md-5" id="mq2">
				<div class="row">
					<div class="col-md-8">
						<h4>Cảm Biến MQ2</h4>		
					</div>
					<div class="col-md-4" style="text-align:right">
						<div class="btn-group">
						  <button type="label" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mq2-setting" onclick="LoadThreshold('MQ2')">
						    <i class="fa fa-cog"></i>
						  </button>
						   
						  <ul class="dropdown-menu pull-right" style="padding: 10px 10px">
						  	<li>
						  		<form action="value/mq2-lpg.php" method="POST">
							  		<div class="input-group">
							        	<span class="input-group-addon">Ngưỡng cảnh báo</span>
								        <input type="number" step="any" name="thresholdvalue" required="" id="mq2-thresholdvalue">
							        </div>	
							        <div class="input-group">
							        	<span class="input-group-addon">Màu sắc cảnh báo</span>
								        <!-- <input class="jscolor" id="mq2-thresholdcolor" name="thresholdcolor" required="" > -->
								        <input type="color" value="#ff0000" id="mq2-thresholdcolor" name="thresholdcolor" required="" style="width:100%">
								        <!-- <input type="color" value="#ff0000" name="thresholdcolor" id="mq2-thresholdcolor"> -->
							        </div>	
							        <br>
							        <input class="btn btn-primary" value="Lưu lại" type="submit" name="setting">
							    </form>
					        </li>
						  </ul>
						</div>
					</div>
				</div>
			  	
			  	<table class="table table-hover table-striped">
			  		<tr>
			  			<th>Thời điểm</th>
			  			<th>Nồng độ</th>
			  			<th>Giá trị</th>
			  			<th>Đơn vị đo</th>
			  		</tr>
				  <tr id="MQ2_LGP">
				  </tr>
				</table>

				<div class="row">
					<div class="col-md-6">
					<form action="export/mq2-exportExcel.php" method="POST">
						<input class="btn btn-primary" type="submit" value="Xuất Excel" name="export_excel">
					</form>
					</div>
					<div class="col-md-2 col-md-offset-4">
					<form action="tablevalue/mq2-tablevalue.php" method="POST">
						<input class="btn btn-primary" value="Xem" type="submit" name="show">
					</form>
					</div>
				</div>

				<div><br></div>

			</div>

			<div class="col-md-2"></div>	

			<div class="col-md-5" id="mq135">	
				<div class="row">
					<div class="col-md-8">
						<h4>Cảm Biến MQ135</h4>		
					</div>
					<div class="col-md-4" style="text-align:right">
						<div class="btn-group">
						  <button type="label" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mq135-setting" onclick="LoadThreshold('MQ135')">
						    <i class="fa fa-cog"></i>
						  </button>
						   
						  <ul class="dropdown-menu pull-right" style="padding: 10px 10px">
						  	<li>
						  		<form action="value/mq135-co.php" method="POST">
							  		<div class="input-group">
							        	<span class="input-group-addon">Ngưỡng cảnh báo</span>
								        <input type="number" step="any" name="thresholdvalue" required="" id="mq135-thresholdvalue">
							        </div>	
							        <div class="input-group">
							        	<span class="input-group-addon">Màu sắc cảnh báo</span>
								        <!-- <input class="jscolor" id="mq2-thresholdcolor" name="thresholdcolor" required="" > -->
								        <input type="color" value="#ff0000" id="mq135-thresholdcolor" name="thresholdcolor" required="" style="width:100%">
								        <!-- <input type="color" value="#ff0000" name="thresholdcolor" id="mq2-thresholdcolor"> -->
							        </div>	
							        <br>
							        <input class="btn btn-primary" value="Lưu lại" type="submit" name="setting">
							    </form>
					        </li>
						  </ul>
						</div>
					</div>
				</div>

			  	<table class="table table-hover table-striped">
			  		<tr>
			  			<th>Thời điểm</th>
			  			<th>Nồng độ</th>
			  			<th>Giá trị</th>
			  			<th>Đơn vị đo</th>
			  		</tr>
				  <tr id="MQ135_CO">				    
				  </tr>
			  	</table>

			  	<div class="row">
				<div class="col-md-6">
				<form action="export/mq135-exportExcel.php" method="POST">
					<input class="btn btn-primary" type="submit" value="Xuất Excel" name="export_excel">
				</form>
				</div>
				<div class="col-md-2 col-md-offset-4">
				<form action="tablevalue/mq135-tablevalue.php" method="POST">
					<input class="btn btn-primary" value="Xem" type="submit" name="show">
				</form>
				</div>
				</div>

				<div><br></div>

		  	</div>
		</div>
		<br>
		<div class="row" id="row2">
			  <div class="col-md-5" id="mg811">
			  <div class="row">
					<div class="col-md-8">
						<h4>Cảm Biến MG811</h4>		
					</div>
					<div class="col-md-4" style="text-align:right">
						<div class="btn-group">
						  <button type="label" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mg811-setting" onclick="LoadThreshold('MG811')">
						    <i class="fa fa-cog"></i>
						  </button>
						   
						  <ul class="dropdown-menu pull-right" style="padding: 10px 10px">
						  	<li>
						  		<form action="value/mg811-co2.php" method="POST">
							  		<div class="input-group">
							        	<span class="input-group-addon">Ngưỡng cảnh báo</span>
								        <input type="number" step="any" name="thresholdvalue" required="" id="mg811-thresholdvalue">
							        </div>	
							        <div class="input-group">
							        	<span class="input-group-addon">Màu sắc cảnh báo</span>
								        <!-- <input class="jscolor" id="mq2-thresholdcolor" name="thresholdcolor" required="" > -->
								        <input type="color" value="#ff0000" id="mg811-thresholdcolor" name="thresholdcolor" required="" style="width:100%">
								        <!-- <input type="color" value="#ff0000" name="thresholdcolor" id="mq2-thresholdcolor"> -->
							        </div>	
							        <br>
							        <input class="btn btn-primary" value="Lưu lại" type="submit" name="setting">
							    </form>
					        </li>
						  </ul>
						</div>
					</div>
				</div>

			  	<table class="table table-hover table-striped">
			  		<tr>
			  			<th>Thời điểm</th>
			  			<th>Nồng độ</th>
			  			<th>Giá trị</th>
			  			<th>Đơn vị đo</th>
			  		</tr>
				  <tr id="MG811_CO2">
				  </tr>
				  </table>

				  <div class="row">
				<div class="col-md-6">
				<form action="export/mg811-exportExcel.php" method="POST">
					<input class="btn btn-primary" type="submit" value="Xuất Excel" name="export_excel">
				</form>
				</div>
				<div class="col-md-2 col-md-offset-4">
				<form action="tablevalue/mg811-tablevalue.php" method="POST">
					<input class="btn btn-primary" value="Xem" type="submit" name="show">
				</form>
				</div>
				</div>

				<div><br></div>
		  	  </div>

		  	  <div class="col-md-2"></div>	

		  	  <div class="col-md-5" id="gp2y10">	
				<!-- <h4>Cảm Biến GP2Y10</h4> -->

				<div class="row">
					<div class="col-md-8">
						<h4>Cảm Biến GP2Y10</h4>		
					</div>
					<div class="col-md-4" style="text-align:right">
						<div class="btn-group">
						  <button type="label" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="gp2y10-setting" onclick="LoadThreshold('GP2Y10')">
						    <i class="fa fa-cog"></i>
						  </button>
						   
						  <ul class="dropdown-menu pull-right" style="padding: 10px 10px">
						  	<li>
						  		<form action="value/gp2y10-dust.php" method="POST">
							  		<div class="input-group">
							        	<span class="input-group-addon">Ngưỡng cảnh báo</span>
								        <input type="number" step="any" name="thresholdvalue" required="" id="gp2y10-thresholdvalue">
							        </div>	
							        <div class="input-group">
							        	<span class="input-group-addon">Màu sắc cảnh báo</span>
								        <input type="color" value="#ff0000" id="gp2y10-thresholdcolor" name="thresholdcolor" required="" style="width:100%">
							        </div>	
							        <br>
							        <input class="btn btn-primary" value="Lưu lại" type="submit" name="setting">
							    </form>
					        </li>
						  </ul>
						</div>
					</div>
				</div>

			  	<table class="table table-hover table-striped">
			  		<tr>
			  			<th>Thời điểm</th>
			  			<th>Nồng độ</th>
			  			<th>Giá trị</th>
			  			<th>Đơn vị đo</th>
			  		</tr>
				  <tr id="GP2Y10_DUST">
				  </tr>
			  	</table>

			  	<div class="row">
				<div class="col-md-6">
				<form action="export/gp2y10-exportExcel.php" method="POST">
					<input class="btn btn-primary" type="submit" value="Xuất Excel" name="export_excel">
				</form>
				</div>
				<div class="col-md-2 col-md-offset-4">
				<form action="tablevalue/gp2y10-tablevalue.php" method="POST">
					<input class="btn btn-primary" value="Xem" type="submit" name="show">
				</form>
				</div>
				</div>

				<div><br></div>
			  </div>
		</div>	
		<br>
		<div class="row">
			<hr>
			<h5>Copyright © 2016 by <a style="cursor: pointer"><b>TAN TRAN</b></a> </h5>
		</div>
</div>
</body>
</html>



<script type="text/javascript">
			    
$(document).ready(function(){
	setInterval(function(){
		$('#MQ2_LGP').load('value/mq2-lpg.php');
		$('#MQ135_CO').load('value/mq135-co.php');
		$('#MG811_CO2').load('value/mg811-co2.php');
		$('#GP2Y10_DUST').load('value/gp2y10-dust.php')
	}, 100);
});

function LoadThreshold(modelname){
	var model = modelname;
    $.ajax({
      type: "POST",
      dataType: "json",
      url: 'threshold_config/threshold_config.php',
      data: {"model": model},
      
      success: function(data) {
      	if(model == 'MQ2'){
        	$('#mq2-thresholdvalue').val(data.val1);
        	$('#mq2-thresholdcolor').val(data.val2);
    	}
    	if(model == 'MQ135'){
	            $('#mq135-thresholdvalue').val(data.val1);
	            $('#mq135-thresholdcolor').val(data.val2);
    	}
    	if(model == 'MG811'){
	            $('#mg811-thresholdvalue').val(data.val1);
	            $('#mg811-thresholdcolor').val(data.val2);    		
    	}
    	if(model == 'GP2Y10'){
    		$('#gp2y10-thresholdvalue').val(data.val1);
            $('#gp2y10-thresholdcolor').val(data.val2);
    	}
      }
    });
}

// $(document).ready(function(){
// 	$('#mq2-setting').click(function (){
// 	        var model='MQ2';
// 	        $.ajax({
// 	          type: "POST",
// 	          dataType: "json",
// 	          url: 'threshold_config/mq2-setting.php',
// 	          data: {"model": model},
	          
// 	          success: function(data) {
// 	            $('#mq2-thresholdvalue').val(data.val1);
// 	            $('#mq2-thresholdcolor').val(data.val2);
// 	          }
// 	        });
// 	    });
// });

// $(document).ready(function(){
// 	$('#mq135-setting').click(function (){
// 	        var model='MQ135';
// 	        $.ajax({
// 	          type: "POST",
// 	          dataType: "json",
// 	          url: 'threshold_config/mq2-setting.php',
// 	          data: {"model": model},
	          
// 	          success: function(data) {
// 	            $('#mq135-thresholdvalue').val(data.val1);
// 	            $('#mq135-thresholdcolor').val(data.val2);
// 	          }
// 	        });
// 	    });
// });

// $(document).ready(function(){
// 	$('#mg811-setting').click(function (){
// 	        var model='MG811';
// 	        $.ajax({
// 	          type: "POST",
// 	          dataType: "json",
// 	          url: 'threshold_config/mq2-setting.php',
// 	          data: {"model": model},
	          
// 	          success: function(data) {
// 	            $('#mg811-thresholdvalue').val(data.val1);
// 	            $('#mg811-thresholdcolor').val(data.val2);
// 	          }
// 	        });
// 	    });
// });

// $(document).ready(function(){
// 	$('#gp2y10-setting').click(function (){
// 	        var model='GP2Y10';
// 	        $.ajax({
// 	          type: "POST",
// 	          dataType: "json",
// 	          url: 'threshold_config/mq2-setting.php',
// 	          data: {"model": model},
	          
// 	          success: function(data) {
// 	            $('#gp2y10-thresholdvalue').val(data.val1);
// 	            $('#gp2y10-thresholdcolor').val(data.val2);
// 	          }
// 	        });
// 	    });
// });
</script>

<!-- <div id="show"></div>
		
<script type="text/javascript">
$(document).ready(function(){
	setInterval(function(){
		$('#show').load('connection.php')
	}, 3000);
});
</script> -->