<?php
include("../Assets/Connection/connection.php");

ob_start();
include('head.php');


	
$selcount="select * from tbl_booking where booking_id='".$_GET["bid"]."'";
$datacount=$connection->query($selcount);
$rowcount=$datacount->fetch_assoc();
$count=$rowcount["booking_guest"];
if(isset($_POST['formsubmit'])){
  $names = $_POST['txtname'];
  $contacts = $_POST['txtnum'];
  $addresses = $_POST['txtaddress'];
  $genders = $_POST['radgender'];
  $relations = $_POST['selRel'];
  $dobs = $_POST['txtdob'];
  $photo = $_FILES["txtphoto"]["name"];
  $temp = $_FILES["txtphoto"]["tmp_name"];

  $ins = "INSERT INTO `tbl_guest`( `guest_name`, `guest_address`, `guest_gender`, `guest_number`, `relation_id`, `booking_id`, `guest_photo`, `guest_age`) VALUES ";
  
  for ($i = 0; $i < $count; $i++) {
      move_uploaded_file($temp[$i],'../Assets/Files/User/Guest/'.$photo[$i]);
      $ins = $ins."('".$names[$i]."','".$addresses[$i]."','".$genders[$i]."','".$contacts[$i]."','".$relations[$i]."','".$_GET["bid"]."','".$photo[$i]."','".$dobs[$i]."')";
      if($i!=($count-1))
      {
        $ins = $ins.",";
      }
  }
  if($connection->query($ins))
  {
    ?>
      <script>
        alert('Inserted');
        window.location="MyBooking.php";
        </script>
    <?php
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
<form method="post" action="" enctype="multipart/form-data">
  <table border="1" align="center" cellpadding="10" cellspacing="20" style="border-collapse:collapse">
    <tr>
      <td>SL.No</td>
      <td>Name</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Gender</td>
      <td>Photo</td>
      <td>Relation</td>
      <td>DOB</td>
    </tr>
    <?php
    for ($i = 1; $i <= $count; $i++) {
      ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><input type="text" name="txtname[]" id="txtname" required></td>
        <td><input type="text" name="txtnum[]" id="txtnum" required></td>
        <td><textarea name="txtaddress[]" id="txtaddress" required></textarea></td>
        <td>
            <select name="radgender[]" id="radgender[]" required>
              <option value="">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
        </td>
        <td><input type="file" name="txtphoto[]" id="txtphoto" required></td>
        <td><select name="selRel[]" id="selRel[]" required>
            <option value="">-Select Relation</option>
                      <?php
              $selQry="select * from tbl_relation";
              $result=$connection->query($selQry);
              while($row=$result->fetch_assoc())
              {
              ?>
                      <option value="<?php echo $row['relation_id'] ?>"><?php echo $row['relation_name'] ?></option>
                      <?php }
              ?>
            </select>
        </td>
        <td><input type="date" name="txtdob[]" id="txtdob" required></td>
      </tr>
    <?php
    }
    ?>
  <tr>
    <td colspan="8" align="center">
      <input type="submit" name="formsubmit" value="Submit All">
    </td>
  </tr>
</form>
  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>