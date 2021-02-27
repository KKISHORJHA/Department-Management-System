<?php

include "include/header.php";
?>
<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".p_state").change(function()
	{
		var get_state=$(".p_state").val();
		var dataString = 'state='+ get_state;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".p_dist").html(html);
			} 
		});
	});
}); 
$(document).ready(function()
{	
	$(".c_state").change(function()
	{
		var get_state=$(".c_state").val();
		var dataString = 'state='+ get_state;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".c_dist").html(html);
			} 
		});
	});
	
});
</script>



	<script>
								function sameAs() {
							  // Get the checkbox
							  var checkBox = document.getElementById("sameas");
							  // Get the output text
							  

							  // If the checkbox is checked, display the output text
							  if (checkBox.checked == true){
								var p_add = document.getElementById("p_add").value;
								var p_dis = document.getElementById("p_dis").value;
								var p_stat = document.getElementById("p_stat").value;
								var p_pin = document.getElementById("p_pin").value;
								var p_mob = document.getElementById("p_mob").value;
								var p_mob2 = document.getElementById("p_mob2").value;
								document.getElementById("c_add").value = p_add;
								document.getElementById("c_add").disabled = true;
								document.getElementById("c_dis").value = p_dis;
								document.getElementById("c_dis").disabled = true;
								document.getElementById("c_stat").value = p_stat;
								document.getElementById("c_stat").disabled = true;
								document.getElementById("c_pin").value = p_pin;
								document.getElementById("c_pin").disabled = true;
							} else {
								document.getElementById("c_add").value ='';
								document.getElementById("c_add").disabled = false;
								document.getElementById("c_dis").value ='';
								document.getElementById("c_dis").disabled =false;
								document.getElementById("c_stat").value = '';
								document.getElementById("c_stat").disabled = false;
								document.getElementById("c_pin").value = '';
								document.getElementById("c_pin").disabled = false;
							  }
							}
							
			</script>

</head>
	
	<div class="temp_container">
	<div class="form_reg">
	<div Style="width:100%; height:70px; font-size:30px; color:blue;margin:0px; margin-top:0px; //padding:10px;"><hr> Student Admission Form<hr></div>
	<center>
				<form action="" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<td colspan="1">Name of the Student (in block letter) :</td>
							<td colspan="1"><input type="text" name="s_name" id="" class="" placeholder=" Enter Name" tabindex="1" required="required"/></td>
							
							<td colspan="1">Date: </td><td><input type="date" name="doa" style="width:200px;"/></td>
						<tr>
							<td colspan="0">Roll No.: </td>
							<td colspan="0"><input type="text" name="sid" placeholder=" Enter Roll No." tabindex="2" required="required"/></td>
						</tr>
						</tr>
							<td colspan="1">Date Of Birth  :</td>
							<td colspan="1"><input type="date" name="dob" id="" class="" tabindex="2" required="required"/></td>
							<td colspan="2" rowspan="6" style="text-align:center;">
								<div id="img" style="margin:auto;align:center;height:160px;width:140px;background:white;border:0px solid black;border-radius:5px;box-shadow:0 0 5px 5px grey;">
									<img id="prev" src="image/p.jpg"alt="Upload" width="140" height="160" style="border-radius:5px;" />
								</div><br>
							
								<input type="file" class="formfile" name="img" class="formfile" onchange="document.getElementById('prev').src = window.URL.createObjectURL(this.files[0])">
							</td>
						</tr>
						<tr>	
							<td>Gender</td>
							<td>
								<input type="radio" name="gender" value = "Male" tabindex="3" required="required"> Male  </input>
								<input type="radio" name="gender" value = "Female"  tabindex="3" required="required">Female </input>
							</td>
						</tr>
						<tr>
							<td>Father's Name:</td>
							<td><input type="text" name="f_name" id="" class="" placeholder=" Enter father's Name" tabindex="4" /></td>
						</tr>
						<tr>
							<td>Mother's Name:</td>
							<td><input type="text" name="m_name" id="" class="" tabindex="6" placeholder=" Enter mother's Name"/></td>
						</tr>
						<tr>
						</tr>
						<tr>
						</tr>
						<tr>
							<th colspan="2" style="text-align:center;">Permanent Address:</th>
							
							<th colspan="2" style="text-align:center;">Corresponding Address:</th>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="p_address" id="p_add" class="" tabindex="8" placeholder=" Enter Address"/ required="required"></td>
							<td>Address</td>
							<td><input type="text" name="c_address" id="c_add" class="" placeholder=" Enter Address"/ required="required"></td>
						</tr>
						
						<tr>						
							<td>State</td>
							<td><select name="p_state" class="p_state" id="p_stat" tabindex="9" required="required">
									<option value="">---Select State---</option>
									<?php
									$select_states=mysqli_query($conn,"SELECT STATE FROM states");
									$cont = mysqli_num_rows($select_states);
									if($cont!=0)
									{
										while($row = mysqli_fetch_array($select_states,MYSQLI_BOTH))
										{
										?>
										<option value="<?php echo $row['STATE']?>"><?php echo $row['STATE'] ?></option>
								<?php
										}
									}
									else
									{
										echo mysqli_error($conn);
									}
								
								?>	
							</select>
							
							</td>
							<td>State</td>
							<td><select name="c_state" class="c_state" id="c_stat" required="required">
									<option value="">---Select State---</option>
									<?php
									$select_states=mysqli_query($conn,"SELECT STATE FROM states");
									$cont = mysqli_num_rows($select_states);
									if($cont!=0)
									{
										while($row = mysqli_fetch_array($select_states,MYSQLI_BOTH))
										{
										?>
										<option value="<?php echo $row['STATE']?>"><?php echo $row['STATE'] ?></option>
								<?php
										}
									}
									else
									{
										echo mysqli_error($conn);
									}
								
								?>	
							</select>
							</td>
						</tr>
						<tr>
							<td>District</td>
							<td><select name="p_dist" class="p_dist" tabindex="10" id="p_dis" required="required">
									<option value="">---Select District---</option>
								</select>
							</td>
							<td>District</td>
							<td><select name="c_dist" class="c_dist" id="c_dis" required="required">
									<option value="">---Select District---</option>
								</select>
							</td>
						</tr>
						<tr>						
							<td>PIN</td>
							<td><input type="text" name="p_pin" id="p_pin" class="" tabindex="11" placeholder=" Enter PIN" required="required"/></td>
							</td>
							<td>PIN</td>
							<td><input type="text" name="c_pin" id="c_pin" class="" placeholder=" Enter PIN" required="required"/></td>
						</tr>
						<tr>
							<td>Contact No.:</td>
							<td><input type="text" name="p_tel1" id="p_mob" class="" tabindex="12" placeholder="Contact No." required="required"/></td>
							<td>Alt. Contact No :</td>
							<td><input type="text" name="p_tel2" id="p_mob2" class="" tabindex="13" placeholder="Alt. Contact No."/></td>
						</tr>
						<tr>
							<td colspan="2">Corresponding Address same as Permanent Address?&nbsp &nbsp
							<input type="checkBox" name="same" tabindex="14" id="sameas" onclick="sameAs();"></td>
						</tr>
						<tr>
							<td colspan="1">E-mail</td>
							<td colspan="3"><input type="email" class="formtext" name="email" placeholder="abc@example.com" tabindex="15" style="width:750px;"/></td>
						</tr>
						<tr>
							<td colspan="1">Religion:</td>
							<td colspan="1"><select name="religion" tabindex="16" />
									<option value="">---Select Religion---</option>
									<option value="Hinduism">Hinduism</option>
									<option value="Islam">Islam</option>
									<option value="Buddhism">Buddhism</option>
									<option value="Sikhism">Sikhism</option>
									<option value="Jainism">Jainism</option>
									<option value="Christianity">Christianity</option>
								</select>
							<td>Category</td>
							<td><select name="cast" class="" id="" tabindex="17">
									<option value=""> ---Select Category---</option>
									<option value="SC"> SC </option>
									<option value="ST"> ST </option>
									<option value="BC"> BC </option>
									<option value="OBC"> OBC </option>
									<option value="General"> General </option>
									<option value="Other"> Other </option>
								</select>
							</td>
						
						
						
							
						</tr>
						<tr>
							<td>Whether the condidate belong to PH</td>
							<td><input type="radio" name="ph" class="" id="" tabindex="18" value="Yes" required="required">Yes</input>
								<input type="radio" name="ph" class="" id="" tabindex="18" value="No" required="required">No</input>
							</td>
							
						</tr>
						<tr>
							<td colspan="1">Name Of the School/College/University last attended:</td>
							<td colspan="1"><input type="text" name="lastschool" id="" tabindex="19" class="" placeholder=" Enter Name"/></td>
						</tr>
						<tr>
							
						</tr>
						<tr>
							<td colspan="4" style="text-align:center;">
								<input type="submit" name="submit" id="submit" tabindex="28" value="Submit"/>
								<input type="reset" name="reset" id="reset" value="Cancle"/>
							</td>
						</tr>
						
		
		

		
					</table>
				</form>
</center>
	</div>
</div>

<?php

if (isset($_POST['submit']))
{
	if (empty($_POST['s_name']))
		{
			echo "Please fill all Field";
			//header("location:generatebill.php");
		}
	else
	{	$doa=$_POST['doa'];
		$name=$_POST['s_name'];
		$sid=$_POST['sid'];
		$dob=$_POST['dob'];
		$gender=$_POST['gender'];
		$fname=$_POST['f_name'];
		$mname=$_POST['m_name'];
		$p_address=$_POST['p_address'];
		$p_dist=$_POST['p_dist'];
		$p_state=$_POST['p_state'];
		$p_pin=$_POST['p_pin'];
		$p_tel1=$_POST['p_tel1'];
		$p_tel2=$_POST['p_tel2'];
		if(isset($_POST['same']))
		{
			$c_address=$p_address;
			$c_dist=$p_dist;
			$c_state=$p_state;
			$c_pin=$p_pin;
		}
		else
		{
			$c_address=$_POST['c_address'];
			$c_dist=$_POST['c_dist'];
			$c_state=$_POST['c_state'];
			$c_pin=$_POST['c_pin'];
		}
		

		
		$religion=$_POST['religion'];
		$cast=$_POST['cast'];
		$ph=$_POST['ph'];
		$lastschool=$_POST['lastschool'];
		
		$email=$_POST['email'];
		//$roll=$_POST['roll'];
		$status="";
		
		
		
		
		$imgData =addslashes(file_get_contents($_FILES['img']['tmp_name']));
		$imageProperties = getimageSize($_FILES['img']['tmp_name']);
		$sql = "INSERT INTO image(ID,S_ID,IMAGE,IMAGE_TYPE) VALUES(NULL,'$sid', '{$imgData}','{$imageProperties['mime']}')";
		$current_id = mysqli_query($conn,$sql);
		$insert=mysqli_query($conn,"INSERT INTO student VALUES (NULL,'$sid','$name','$fname','$mname','$dob','$gender',
		'$religion','$cast','$ph','$lastschool','$p_address','$p_dist','$p_state','$p_pin','$p_tel1','$p_tel2','$c_address','$c_dist','$c_state','$c_pin','$email','','$doa')") or die (mysqli_error($conn));
		if($insert && $current_id)
		{
			//header("location:href=viestudent.php?id='.$sid.'");
			//mysqli_close($conn);
			
			//$enc= new Encryption;
			//$encdata=$enc->safe_b64encode($sid);
			
			//echo '<script>alert("Student Added Successfully.");</script>';
		}
		else 
		{
			echo 'Failed To Insert Data';
			echo mysqli_error($conn);
		}
		
	}
	

	
	
	
}
?>

<?php

include "include/footer.php";
?>

