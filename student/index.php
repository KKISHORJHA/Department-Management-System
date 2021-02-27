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
				height:120px;
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
				<div class="temp" ><a href="notice.php"><img src="image/notice.png" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="calender.php"><img src="image/calender.jpg" height="100%" width="100%"/></a></div>
				<div class="temp" ><a href="write_to_us.php"><img src="image/write_to_us.jpg" height="100%" width="100%"/></a></div>
			</div>
			</center>
			</div>
			<div class="right_panel">
				<div class="item">
					<div style="height:30px; width:100%; text-align:center; background-color:blue; color:white; font-size:20px; font-weight:bold; ">
						Attendance
						<?php
						$month=date('m');
						$year=date('Y');
						$roll=$login_user_roll;
							$query=mysqli_query($conn,"SELECT *FROM attendance WHERE MONTH(DATE)='$month' AND YEAR(DATE) = '$year' AND S_ID='$roll'");
							$count=mysqli_num_rows($query);
							if($count!=0)
							{
								$query_present=mysqli_query($conn,"SELECT *FROM attendance WHERE MONTH(DATE)='$month' AND YEAR(DATE) = '$year' AND S_ID='$roll' AND ATTENDANCE='P'");
								$count_present=mysqli_num_rows($query_present);	
									if(!$count_present)
									{
										$count_present=0;
									}
								$query_absent=mysqli_query($conn,"SELECT *FROM attendance WHERE MONTH(DATE)='$month' AND YEAR(DATE) = '$year' AND S_ID='$roll' AND ATTENDANCE='A'");
								$count_absent=mysqli_num_rows($query_absent);
									if(!$count_absent)
									{
										$count_absent=0;
									}
								$percent=($count_present*100)/$count;
							}
							else
							{
								$count_present=0;
								$count_absent=0;
								$percent=0;
							}
					
					
					
					
					
					
						?>
					</div>
					<div style="width:15%; height:80px; background-color:grey; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Month :<br>
						<?php echo date('F Y'); ?>
						
					</div>
					<div style="width:15%; height:80px; background-color:grey; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Total Class :<br>
						<?php echo $count;?>
					</div>
					<div style="width:15%; height:80px; background-color:green; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Present :<br>
						<?php echo $count_present;?>
					</div>
					<div style="width:15%; height:80px; background-color:red; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Absent :<br>
						<?php echo $count_absent;?>
					</div>
					<div style="width:15%; height:80px; background-color:grey; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Percentage :<br>
						<?php
							echo $percent;
						?>
					</div>
					
				</div>
				<div class="item">
					<div style="height:30px; width:100%; text-align:center; background-color:blue; color:white; font-size:20px; font-weight:bold; ">
						Assignment
						<?php
						$roll=$login_user_roll;
							$query_assignment=mysqli_query($conn,"SELECT *FROM assignment");
							$count_assignment=mysqli_num_rows($query_assignment);
							if($count_assignment!=0)
							{
								$query_submitted=mysqli_query($conn,"SELECT *FROM assignment WHERE STATUS='submitted'");
								$count_submitted=mysqli_num_rows($query_submitted);	
									if(!$count_submitted)
									{
										$count_submitted=0;
									}
								$query_not_submitted=mysqli_query($conn,"SELECT *FROM assignment WHERE STATUS='NOT SUBMITTED'");
								$count_not_submitted=mysqli_num_rows($query_not_submitted);
									if(!$count_not_submitted)
									{
										$count_not_submitted=0;
									}
									$percent_assignment=($count_submitted*100)/$count_assignment;
							}
							else
							{
								$count_submitted=0;
								$count_not_submitted=0;
								$percent_assignment=0;
							}
						?>
						
						
						
						
					</div>
					<div style="width:15%; height:80px; background-color:grey; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Total Assignment :<br>
						<?php echo $count_assignment;?>
					</div>
					<div style="width:15%; height:80px; background-color:green; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
					Completed :<br>
						<?php echo $count_submitted;?>
					</div>
					<div style="width:15%; height:80px; background-color:red; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Uncompleted :<br>
						<?php echo $count_not_submitted;?>
					</div>
					<div style="width:15%; height:80px; background-color:grey; font-size:18px; font-weight:bold; margin-left:10px; float:left;bprder:2 px solid white;padding:5px; text-align:center; color:white">
						Percentage :<br>
						<?php echo $percent_assignment;?>
					</div>
				
				</div>
				<div class="notice">
					<div style="height:30px; width:100%; text-align:center; background-color:blue; color:white; font-size:20px; font-weight:bold; ">
						Notice Board
					</div>
				
				</div>
			</div>
	</div>
	</body>
</html>
