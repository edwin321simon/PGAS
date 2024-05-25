<?php
include("../Assets/Connection/connection.php");
ob_flush();
include('Head.php');
	if(isset($_POST['btn_save']))
	{
		$subadmin_name=$_POST['txt_name'];
		$subadmin_number=$_POST['txt_number'];
		$subadmin_email=$_POST['txt_email'];
		$district_name=$_POST['txt_district'];
    	$subadmin_gender=$_POST['radio'];
		$subadmin_password=$_POST['txt_password'];
		$selAdmin="select * from tbl_admin where admin_email='".$subadmin_email."' ";
		$selsubadmin="select * from tbl_subadmin where subadmin_email='".$subadmin_email."' ";
		$selUser="select * from tbl_user where user_email='".$subadmin_email."' "; 
		$selOwner="select * from tbl_owner where owner_email='".$subadmin_email."'";
		
		$resAdmin=$connection->query($selAdmin);
		$ressubadmin=$connection->query($selsubadmin);
		$resUser=$connection->query($selUser);
		$resOwner=$connection->query($selOwner);




		if($resAdmin->num_rows>0 || $ressubadmin->num_rows>0 || $resUser->num_rows>0 || $resOwner->num_rows>0)
		{
?>
<script>
	alert('email exist');
</script>
<?php


		}
		else
	{
		
		$insQry="insert into tbl_subadmin(subadmin_name,subadmin_number,subadmin_email,district_id,subadmin_gender,subadmin_password)values('".$subadmin_name."','".$subadmin_number."','".$subadmin_email."','".$district_name."','".$subadmin_gender."','".$subadmin_password."')";
	$connection->query($insQry);	
	}
}
	?>


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="#" method="post" class="form-reg"  enctype="multipart/form-data">
<div class="form-group first">
								<label for="txt_name">Name</label>
								<input type="text" class="form-control" placeholder="Name"
									name="txt_name" id="txt_name" required autocomplete="off" title="This Field Allows Only Alphabets"onchange="nameval(this)" /><span id="name"></span>
							</div>
              <div class="form-group first">
								<label for="txt_number">Contact</label>
								<input type="text" class="form-control" placeholder="Contact Number"
									name="txt_number" id="txt_number" required pattern="([0-9]{10,10})" title="This Field Allows Only Digits" autocomplete="off" onchange="checknum(this)"/><span id="contact"></span>
							</div>
              <div class="form-group first">
								<label for="txt_email">Email</label>
								<input type="email" class="form-control" placeholder="E-mail"
									name="txt_email" id="txt_email" required autocomplete="off" onchange="emailval(this)"/><span id="content"></span>
							</div>
              <div class="form-group first">
								<label for="txt_district">District</label>
								<select name="txt_district" id="txt_district" class="form-control" required >
        
        <option value="">-Select district-</option>
         <?php
  $selQryDist="select * from tbl_district";
  $result=$connection->query($selQryDist);
  while($row=$result->fetch_assoc())
  {
  ?>
          <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
          <?php }
  ?>
      </select>
							</div>
              <div class="form-group first">
								<label for="txt_gender">Gender</label><br>
								<input type="radio" name="radio" id="rdo_gender" value="M" />&nbsp;
      <label for="rdo_gender">MALE</label>&nbsp;&nbsp;
        <input type="radio" name="radio" id="rdo_gender" value="F" />&nbsp;<label for="rdo_gender">FEMALE</label>
							</div>
              <div class="form-group first">
								<label for="txt_password">Password</label>
								<input type="password" class="form-control" placeholder="Password"
									name="txt_password" id="txt_password" required autocomplete="off" pattern="{8,16}"/>
							</div>
              <div class="form-group first">
								<label for="txt_cpassword">Confirm Password</label>
								<input type="password" class="form-control" placeholder="Confirm Password"
									name="txt_cpassword" id="txt_cpassword" required autocomplete="off" onchange="chkpwd(this,txt_password)"  required/><span id="pass"></span>
							</div>
              <input type="submit" value="REGISTER" name=btn_save id=btn_save
								class="btn btn-block btn-primary">
</form>
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
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>This Field Allows Only Alphabets, Spaces and First Letter Must Be Capital</span>";
		elem.focus();
		return false;
	}
}
</script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
