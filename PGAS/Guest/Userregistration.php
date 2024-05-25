<?php
	include("../Assets/Connection/connection.php");
	if(isset($_POST['btn_save']))
	{
		$user_name=$_POST['txt_name'];
		$user_number=$_POST['txt_number'];
		$user_adress=$_POST['txt_address'];
		$user_gender=$_POST['rdo_gender'];
		$user_dob=$_POST['txt_dob'];
		$user_email=$_POST['txt_email'];
		$place_id=$_POST['txt_place'];
		$proof=$_FILES['txt_proof']['name'];
		$tempproof=$_FILES['txt_proof']['tmp_name'];
		move_uploaded_file($tempproof, '../Assets/Files/User/Proof/'.$proof);
		$photo=$_FILES['txt_photo']['name'];
		$tempphoto=$_FILES['txt_photo']['tmp_name'];
		move_uploaded_file($tempphoto, '../Assets/Files/User/Photos/'.$photo);
		$user_password=$_POST['txt_password'];




		$selAdmin="select * from tbl_admin where admin_email='".$user_email."' ";
		$selsubadmin="select * from tbl_subadmin where subadmin_email='".$user_email."' ";
		$selUser="select * from tbl_user where user_email='".$user_email."' "; 
		$selOwner="select * from tbl_owner where owner_email='".$user_email."'";
		
		$resAdmin=$connection->query($selAdmin);
		$ressubadmin=$connection->query($selsubadmin);
		$resUser=$connection->query($selUser);
		$resOwner=$connection->query($selOwner);




		if($resAdmin->num_rows>0 || $ressubadmin->num_rows>0 || $resUser->num_rows>0 || $resOwner->num_rows>0)
		{




		}
		else
	{
		

		$insQry="insert into tbl_user(user_name,user_number,user_address,user_gender,user_dob,user_email	,place_id,user_proof,user_photo,user_password)values('".$user_name."','".$user_number."','".$user_adress."','".$user_gender."','".$user_dob."','".$user_email."','".$place_id."','".$proof."','".$photo."','".$user_password."')";
		$connection->query($insQry);	

	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../Assets/Templates/Login/fonts/icomoon/style.css">
		<link rel="stylesheet" href="../Assets/Templates/Login/css/owl.carousel.min.css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../Assets/Templates/Login/css/bootstrap.min.css">
		<!-- Style -->
		<link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">
		<title>User Registration</title>
			<style>
				.slider-tab{
					overflow-y:scroll;
					padding-top: 3rem;
				}
				.form-reg{
					padding-bottom: 3rem;
				}
			</style>
		<title>User Registration</title>
	</head>
	<body>
		<div class="d-lg-flex half">
			<div class="bg order-1 order-md-1" style="background-image: url('../Assets/Templates/Login/images/bg_1.jpg');"></div>
			<div class="contents order-2 order-md-2 slider-tab">
				<div class="container">
					<div class="row align-items-center justify-content-center">						
						<div class="col-md-7">
						
							<form action="#" method="post" class="form-reg"  enctype="multipart/form-data">
								<div class="form-group first">
									<label for="txt_name">Name</label>
									<input type="text" class="form-control" placeholder="your name" name="txt_name" id="txt_name" title="This Field Allows Only Alphabets" required autocomplete="off" onchange="nameval(this)" /><span id="name"></span>
								</div>
								<div class="form-group first">
									<label for="txt_number">Contact</label>
									<input type="text" class="form-control" placeholder="your contact number" name="txt_number" id="txt_number" title="This Field Allows Only 10 Digits" required autocomplete="off" onchange="checknum(this)"><span id="contact"></span>
								</div>
								<div class="form-group first">
									<label for="txt_address">Address</label>
									<textarea class="form-control" name="txt_address" id="txt_address" required ></textarea>
								</div>
								<div class="form-group first">
									<label for="txt_gender">Gender</label><br>
									<input type="radio" name="rdo_gender" id="rdo_gender" value="M" />&nbsp;
										<label for="rdo_gender">MALE</label>&nbsp;&nbsp;
											<input type="radio" name="rdo_gender" id="rdo_gender" value="F" />&nbsp;<label for="rdo_gender">FEMALE
										</label>
								</div>
								<div class="form-group first">
									<label for="txt_name">DOB</label>
									<input type="date"  class="form-control" placeholder="date of birth" name="txt_dob" id="txt_dob" required>
								</div>
								<div class="form-group first">
									<label for="txt_email">Email</label>
									<input type="email" class="form-control" placeholder="your email@gmail.com" name="txt_email" id="txt_email" required autocomplete="off"  onchange="emailval(this)"/><span id="content"></span>
								</div>
								<div class="form-group first">
									<label for="txt_district">District</label>
									<select name="txt_district" id="txt_district" class="form-control" onchange="getPlace(this.value)" required>
										<option value="">-Select district-</option>
										<?php
											$selQryDist="select * from tbl_district";
											$result=$connection->query($selQryDist);
											while($row=$result->fetch_assoc())
												{
										?>
										<option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
										<?php
											}
										?>
									</select>
								</div>
								<div class="form-group first">
									<label for="txt_place">Place</label>
									<select name="txt_place" class="form-control" id="txt_place" required>
										<option value="">-Select Place-</option>
									</select>
								</div>
								<div class="form-group first">
									<label for="txt_proof">Proof</label>
									<input type="file" class="form-control" placeholder="your proof" name="txt_proof" id="txt_proof"required >
								</div>
								<div class="form-group first">
									<label for="txt_photo">Photo</label>
									<input type="file" class="form-control" placeholder="your photo" name="txt_photo" id="txt_photo" required>
								</div>
								<div class="form-group first">
									<label for="txt_password">Password</label>
									<input type="password" class="form-control" placeholder="enter your password" name="txt_password" id="txt_password"  pattern="{8,16}" title="Field must contain minimum 8 characters" required autocomplete="off">
								</div>
								<div class="form-group first">
									<label for="txt_cpassword">Confirm Password</label>
									<input type="password" class="form-control" placeholder="enter your password again" name="txt_cpassword" id="txt_cpassword"onchange="chkpwd(this,txt_password)"  required/><span id="pass"></span>
								</div>
								<input type="submit" value="REGISTER" name=btn_save id=btn_save class="btn btn-block btn-primary">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="../Assets/Jquery/jQuery.js"></script>
		<script>
function getState(cid)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxState.php?cid="+cid,
		success: function(html){
			$("#ddl_state").html(html);
		}
	});
}

function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function checknum(elem)
{
	var numericExpression = /^[6-9]{1}[0-9]{9}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>Field must contain 10 digits starting with 6-9</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^([a-zA-Z0-9.\_\-])+\@([a-zA-Z0-9.\_\-])+\.([a-zA-Z]{2,4})$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Field should contain alphabets only</span>";
		elem.focus();
		return false;
	}
}
</script>
<script>
    $(function () {
        console.log("haii")
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;


        console.log(maxDate);
        $('#txt_dob').attr( 'max', maxDate);
    });
</script>
		<script>
			function getPlace(did)
				{
					$.ajax({
						url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
						success: function(html){
							$("#txt_place").html(html);
						}
					});
				}
		</script>
		<script src="../Assets/Templates/Login/js/jquery-3.3.1.min.js"></script>
		<script src="../Assets/Templates/Login/js/popper.min.js"></script>
		<script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
		<script src="../Assets/Templates/Login/js/main.js"></script>
		
	</body>
</html>