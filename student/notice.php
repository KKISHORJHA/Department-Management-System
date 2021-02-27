<?php

include "include/header.php";
?>

<html>
	<head>
		<style>
			.head
			{
				height:110px;
				width:100%;
				background-color:blue;
				float:left;
				
			}
			.main
			{
				width:100%;
			//height:1000px;
			margin:auto;
			background:lightgrey;
			}
			.left_panel
			{
				width:35%;
				height:100%;
				background-color:skyblue;
				border:1px solid blue;
				float:left;
			}
			.right_panel
			{
				width:64.65%;
				height:100%;
				background-color:skyblue;
				border:1px solid blue;
				float:left;
			}
			.temp
			{
				height:120px;
				width:120px;
				border:2px solid white;
				float:left;
				margin:10px;
				//padding:10px;
			}
			.temp:hover
			{
				border:2px solid red;
				cursor:pointer;
			}
			.prof
			{
				height:100px;
				font-size:16px;
				font-weight:bold;
				color:black;
				
				width:95%;
				float:left;
				border:5px solid white;
				//padding:10px;
			}
			.item
			{
				height:100%;
				width:99%;
				float:left;
				border:5px solid white;
			}
			.notice
			{
				height:360px;
				width:99%;
				float:left;
				border:5px solid white;
			}
			.temp_cont
			{
				text-align:center;
				
			}
			.prof_pic
			{
				width:100px;
				height:100%;
				border-right:2px solid white; 
				float:left;
			}
			.prof_detail
			{
				height:100%;
				width:70%;
				float:left;
				padding:10px;
			}
		</style>
	</head>
	<body>
		<div class="head">
			<img src="../image/logo.png" alt="logo.png"/>
		</div>
	<div class="main">
			<div class="left_panel">
				<div class="prof">
					<div class="prof_pic">
						<?php
							if(empty($login_user_image))
							  {
								$enc= new Encryption;
								$encdata=$enc->safe_b64encode($login_session );
							  echo '
							  <img src="image/profile.png" height="100%" width="100%" style=""/></img>';
							  }
							  else
							  {
								$enc= new Encryption;
								$encdata=$enc->safe_b64encode($login_session );
								echo '
								<img src="data:image/jpeg;base64,'.base64_encode($login_user_image).'" height="100%" width="100%" style=""/></img>';
							 } 
						?>
					</div>
					<div class="prof_detail">
					<span style="margin:5px">Name : <?php echo $login_user_name ?></span><br>
					<span style="margin:5px">Roll No. :<?php echo $login_user_roll ?>
					&nbsp&nbspSemester :<?php echo $login_user_sem?></span><br>
					<span style="margin:5px">Session :<?php echo $login_user_session ?></span><br>
					<span style="margin:5px"><a href="../connection/logout.php">Log out</a></span>
					</div>
				</div>
			
			<center>
			<div class="temp_cont">
				<div class="temp" ><a href="profile.php"><img src="image/profile.png" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="result.php"><img src="image/result.png" height="100%" width="100%"/></a></div>
				<div class="temp" > <a href="attendance_report.php"><img src="image/attendance.jpg" height="100%" width="100%"/></a></div>
				<div class="temp" > <a href="time_table.php"><img src="image/time_table.jpg" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="syllabus.php"><img src="image/syllabus.jpg" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="assignment.php"><img src="image/assignment.jpg" height="100%" width="100%"/></a></div>
				<div class="temp" style="border:2px solid red;"><a href="notice.php"><img src="image/notice.png" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="calender.php"><img src="image/calender.jpg" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="write_to_us.php"><img src="image/write_to_us.jpg" height="100%" width="100%"/></a></div>
			</div>
			</center>
			</div>
			<div class="right_panel">
				<div class="item">
					<div style="height:30px; width:100%; text-align:center; background-color:blue; color:white; font-size:20px; font-weight:bold; ">
						NOTICE
					</div>
					<?php
						$month=date('m');
						$year=date('Y');
						$sl_no=0;
						$query2 = mysqli_query($conn,"SELECT *FROM notice order by ID DESC");
						//$row = mysqli_fetch_array($query1,MYSQLI_BOTH);
						echo '<table style="margin:auto;" class="table">';
						echo '<th></th><th>DATE</th><th>NOTICE</th><th>DOWNLOAD</th>';
						while($row = mysqli_fetch_array($query2,MYSQLI_BOTH))
						{
							$sl_no=$sl_no+1;
							//$enc= new Encryption;
							//$encdata=$enc->safe_b64encode($row['S_ID']);
							echo '<tr><td style="text-align:center;">'.$sl_no.'</td><td style="text-align:center;">'.$row['DATE'].'</td><td style="text-align:center;">'.$row['NOTICE'].'</td><td style="text-align:center;"><a href="'.$row['FILE_PATH'].'" download>Click Here</td>';
						}
						echo '</table>';
					
					?>
				</div>
			</div>
	</div>
	</body>
</html>
