<?php

include("../Assets/Connection/connection.php");
ob_flush();
include('Head.php');



		if(isset($_POST["btn_save"]))
		{
		$room_guest=$_POST['txt_guest'];	
		$room_discription=$_POST['txt_discription'];
		$room_rent=$_POST['txt_rent'];
		$room_secutity=$_POST['txt_security'];
		$category_id=$_POST['txt_category'];
		$ftype_id=$_POST['txt_ftype'];
		$photo=$_FILES['txt_photo']['name'];
    $temp=$_FILES['txt_photo']['tmp_name'];
    move_uploaded_file($temp, '../Assets/Files/Owner/Room/'.$photo);
    $location=$_POST['txt_location'];
		$insQry="insert into tbl_room(room_guest,room_discription,room_rent,room_security,category_id,ftype_id,owner_id,room_photo,room_location)values('".$room_guest."','".$room_discription."','".$room_rent."','".$room_secutity."','".$category_id."','".$ftype_id."','".$_SESSION['oid']."','".$photo."','".$location."')";
		
	$connection->query($insQry);	
		}
?>
















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Room</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">

  <table width="257" border="1">
    <tr>
      <td width="180">GUEST</td>
      <td width="61"><label for="txt_guest"></label>
      <input type="number" name="txt_guest" id="txt_guest" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>DISCRIPTION</td>
      <td><label for="txt_discription"></label>
      <textarea name="txt_discription" id="txt_discription" cols="45" rows="5" required autocomplete="off"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="txt_discription"></label>
      <input type="file" name="txt_photo" id="txt_photo" required /></td>
    </tr>
    <tr>
      <td>RENT</td>
      <td><label for="txt_rent"></label>
      <input type="number" name="txt_rent" id="txt_rent" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>SECURITY AMOUNT</td>
      <td><label for="txt_security"></label>
      <input type="number" name="txt_security" id="txt_security" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>CATEGORY</td>
      <td><label for="txt_category"></label>
        <select name="txt_category" id="txt_category" required autocomplete="off">
         <option value="">Select Category</option>
  <?php
  $selQry="select * from tbl_category";
  $result=$connection->query($selQry);
  while($row=$result->fetch_assoc())
  {
  ?>
  <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
  <?php }
  ?>
      </select></td>
    </tr>
    <tr id='foodtype1'>
      <td>FOOD TYPE</td>
      <td id='foodtype'><label for="txt_ftype"></label>
        <select name="txt_ftype" id="txt_ftype" required >
          <option value="">Select Food</option>
          <?php
  $selQry="select * from tbl_ftype";
  $result=$connection->query($selQry);
  while($row=$result->fetch_assoc())
  {
  ?>
          <option value="<?php echo $row['ftype_id'] ?>"><?php echo $row['ftype_name'] ?></option>
          <?php }
  ?>
        </select></td>
    </tr>
    <tr>
      <td>LOCATION</td>
      <td><label for="txt_location"></label>
      <input type="text" name="txt_location" id="txt_location" required autocomplete="off"/></td>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="SAVE" />
      <input type="reset" name="txt_cancel" id="txt_cancel" value="CANCEL" /></td>
    </tr>
  </table>
</form>
</div>
<script src="../Assets/Jquery/jQuery.js"></script>
</script>
</body>

<?php
include('Foot.php');
ob_flush();
?>
</html>






























































