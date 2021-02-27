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
				<div class="temp" style="border:2px solid red;"> <a href="index.php"><img src="image/attendance.jpg" height="100%" width="100%"/></a></div>
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
						RESULT
					</div>
					<form action="" method="POST">
					<table>
						<tr>
							<td>Select Semester</td>
							<td><select name="sem">
									<option value="" >--Select Semester--</option>
									<option value="First">First</option>
									<option value="Second">Second</option>
									<option value="Third">Third</option>
									<option value="Fourth">Fourth</option>
									<option value="Fifth">Fifth</option>
									<option value="Sixth">Sixth</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Select Exam</td>
							<td><select name="exam">
									<option value="" >--Select Exam--</option>
									<option value="TEE" >Term End Exam</option>
									<option value="INTERNAL" >Internal Assesment</option>
									<option value="PRACTICAL" >Pratical</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="submit" value="Submit"/>
							</td>
						</tr>
						</table>
						</form>
						<?php
if(isset($_POST['submit']))
{
	echo'<form action="" method="POST">';
	echo '<table>';
	echo '<tr>';
		echo '<td>Enter Roll No.</td>';
		echo '<td><input type="text" name="roll_no" placeholder="Enter Roll No."/></td>';
	echo '</tr>';
	echo '<tr>';
		echo '<td colspan="2">';
		echo 'Enter Marks:';
		echo '</td>';
	 echo '</tr>';
	$exam=$_POST['exam'];
	$sem=$_POST['sem'];
	$select_subject=mysqli_query($conn,"SELECT *FROM subject WHERE SEM='$sem'");
	$count=mysqli_num_rows($select_subject);
	if($count!=0)
	{
		while($row=mysqli_fetch_array($select_subject,MYSQLI_BOTH))
		{
		   echo '<tr>
				<td>'.$row['SUBJECT'].'</td>
				<td><input type="text" name="mark[]" placeholder="Enter Mark"/></td>
				<input type="hidden" name="subject[]" value="'.$row['SUBJECT'].'"/>
				
			</tr>';
		}
		echo '<input type="hidden" name="exam" value="'.$exam.'"/>
			<input type="hidden" name="sem" value="'.$sem.'"/>';
		echo'<tr><td colspan="2"><input type="submit" name="save" value="Save"/></td></tr></form>';
	}
}
?>
<?php
if(isset($_POST['save']))
{
	$roll=$_POST['roll_no'];
	if(isset($_POST['mark']))
	{
		$mark=$_POST['mark'];
		$subject=$_POST['subject'];
		
		$exam=$_POST['exam'];
		$tot_mark=count($mark);
		for($i=0;$i<$tot_mark;$i++)
		{
			
			$insert_result=mysqli_query($conn,"INSERT INTO result VALUES( NULL ,'$roll','$subject[$i]','$mark[$i]',100,'$exam')");
			if($insert_result)
			{
			}
			else
				echo mysqli_error($conn);
			
		}
	}
}
					
?>						
				</div>
			</div>
	</div>
	</body>
</html>
