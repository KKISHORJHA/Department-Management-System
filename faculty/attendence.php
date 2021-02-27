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
				<div class="temp" > <a href="index.php"><img src="image/attendance.jpg" height="100%" width="100%"/></a></div>
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
					</div>
					<?php
						$sem=$_REQUEST['sem'];
						$query_class=mysqli_query($conn, "SELECT *FROM student WHERE SEM='$sem' AND STATUS='ACTIVE'");
						date_default_timezone_set("Asia/Kolkata");
						$date= date("Y-m-d G:i:s");
						$cont = mysqli_num_rows($query_class);
						if($cont>=1)
						{
							echo '<div style="height:40px; width:200px; padding:10px; margin:auto; margin-top:20px;margin-bottom:20px; background:green; color:white;">
							Class Register : '.$sem.'<br>Date : '.$date.'</div>';
							echo '<table class="table" style="width:800px;">';
							echo '<form action="" method="POST">';
							echo '<th>ROLL NO</th><th>NAME</th><th>MARK ATTENDANCE</th>';
							$sid = array();
							$s_roll = array();
							$s_name = array();
							while($row = mysqli_fetch_array($query_class,MYSQLI_BOTH))
							{
								
								$sid[]=$row['S_ID'];
								$s_roll[] = $row['S_ID'];
								$s_name[] = $row['S_NAME'];
								//$sl_no=$sl_no+1;
								echo '<tr><td>'.$row['S_ID'].'</td><td>'.ucwords(strtolower($row['S_NAME'])).'</td>';
								echo '<td><input type="checkbox" value="'.$row['S_ID'].'" name="atten[]" />Present
								&nbsp<input type="checkbox" value="'.$row['S_ID'].'" name="leave[]" id="leave_check" onClick="addLeaveRemark();"/>On Leave 
								&nbsp<input type="text" name="remark[]"  placeholder="Leave Remark" id="text_remark"  /></td></tr>';
							}
							echo '<tr><td colspan="4" style="text-align:center;"><input type="submit" name="save_attendance" value="Save Attendance" style="margin-bottom:10px;"/></td></tr>';
							echo '</form>';
								echo '</table>';
						}
						else
						{
							echo '<span class="warning" style="margintop:30px;">';
							echo "No student in $sem Semester please add student in Semester.";
							echo '</span>';
						}
						if(isset($_POST['save_attendance']))
{
	$leav[]='';
	$tot_leav=0;
	$attendance[]='';
	$leav_remark[]='';
	$rem[]='';
	if(isset($_POST['leave']))
	{
		$leav=$_POST['leave'];
		$tot_leav=count($leav);
		$leav_remark=$_POST['remark'];
	}
	if(isset($_POST['atten']))
	{
		$attendance=$_POST['atten'];
	}
	if(isset($_POST['leave']))
	{
		$leav_remark=$_POST['remark'];
	}
	$tot_sid=count($sid);
	$tot_present=count($attendance);
	
	$tot_aubsant=$tot_sid-($tot_present+$tot_leav);
	$aubsant=array_diff($sid,$leav,$attendance);
	//print_r($aubsant);
	$comp=array_diff($leav,$attendance);
	$comp2=array_diff($attendance,$leav);
	if(empty($comp)|| empty($comp2))
	{
		echo '<script>alert("Please Tik eighter Present or Leave")</script>';
	}
	else
	{
		//print_r(array_filter($leav_remark, function($value) { return $value !== ''; }));
		$arr_remark=(array_filter($leav_remark, function($value) { return $value !== ''; }));
		foreach($arr_remark as $arr)
		{
			$rem[]=$arr;
		}
	for($i=0;$i<$tot_present;$i++)
		{

			$sid_present=$attendance[$i];
			$select_present=mysqli_query($conn,"SELECT *FROM student WHERE S_ID='$sid_present'");
			$num_present=mysqli_num_rows($select_present);
			if($num_present!=0)
			{
				$row_present=mysqli_fetch_array($select_present,MYSQLI_BOTH);
				$sid_p=$row_present['S_ID'];
				$sname_p=$row_present['S_NAME'];
				$class_p=$row_present['SEM'];
				$roll_p=$row_present['S_ID'];
				$insert_present=mysqli_query($conn,"INSERT INTO attendance VALUES(NULL,'$sid_p','$sname_p','$class_p','$roll_p','P','Present','$date')");
			}
		}
		for($j=0;$j<$tot_leav;$j++)
		{
			$sid_leav=$leav[$j];
			$select_leav=mysqli_query($conn,"SELECT *FROM student WHERE S_ID='$sid_leav'");
			$num_leav=mysqli_num_rows($select_leav);
			if($num_leav!=0)
			{
				$row_leav=mysqli_fetch_array($select_leav,MYSQLI_BOTH);
				$sid_p=$row_leav['S_ID'];
				$sname_p=$row_leav['S_NAME'];
				$class_p=$row_leav['SEM'];
				$roll_p=$row_leav['S_ID'];
				$remark_l=$leav_remark[$j];
				$insert_leav=mysqli_query($conn,"INSERT INTO attendance VALUES(NULL,'$sid_p','$sname_p','$class_p','$roll_p','L','$rem[$j]','$date')");
			}
		}
		

		foreach($aubsant as $sid_aubsant)
		{
			$select_aubsant=mysqli_query($conn,"SELECT *FROM student WHERE S_ID='$sid_aubsant'");
			$num_aubsant=mysqli_num_rows($select_aubsant);
			if($num_aubsant!=0)
			{
				$row_aubsant=mysqli_fetch_array($select_aubsant,MYSQLI_BOTH);
				$sid_a=$row_aubsant['S_ID'];
				$sname_a=$row_aubsant['S_NAME'];
				$class_a=$row_aubsant['SEM'];
				$roll_a=$row_aubsant['S_ID'];
				$insert_aubsant=mysqli_query($conn,"INSERT INTO attendance VALUES(NULL,'$sid_a','$sname_a','$class_a','$roll_a','A','Aubsant','$date')");
			}
		}
		echo '<script>alert("Attendance saved successfully")</script>';
	}
}
?>	
				</div>
			</div>
	</div>
	</body>
</html>
