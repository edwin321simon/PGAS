<?php
include("../Assets/Connection/connection.php");

ob_start();
include('head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$selQry="select * from tbl_admin where admin_id=".$_SESSION['aid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();

if(isset($_POST['btn_save']))
{
	$admin_name=$_POST['txt_name'];
	$admin_number=$_POST['txt_number'];

	
	$updtQry="update tbl_admin set admin_name='".$admin_name."',admin_contact='".$admin_number."', where admin_id=".$_SESSION['aid'];
	
	if($connection->query($updtQry))
	{ header("location:viewprofile.php");
	}
}
?>

<form action="#" method="post" class="form-reg"  enctype="multipart/form-data">
<div class="form-group first">
								<label for="txt_name">Name</label>
								<input type="text" class="form-control" placeholder="Name"
									value="<?php echo $row['admin_name'] ?>"
                                    name="txt_name" id="txt_name" required autocomplete="off">
							</div>
              <div class="form-group first">
								<label for="txt_number">Contact</label>
								<input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $row['admin_contact'] ?>"
									name="txt_number" id="txt_number" required autocomplete="off">
							</div>
              
                            <div align="center">
                            <div class="col-sm-3">
                <input type="submit" name="btn_save" id="btn_save" value="SAVE" class="btn btn-success" />
                </div>
                </div>

</form>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>