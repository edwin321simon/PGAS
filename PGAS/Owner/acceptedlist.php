<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');


 if(isset($_GET['declain']))
 {
   $updtQry="update tbl_booking set booking_status=2 where booking_id=".$_GET['declain'];
  $connection->query($updtQry);
 }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acceptedlist List </title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="1000" align="center" border="1">
    <tr>
      <th width="54"><strong>SL.NO</strong></th>
      <th width="89"><strong>USER NAME</strong></th>
      <th width="75"><strong>CONTACT</strong></th>
      <th width="53"><strong>PHOTO</strong></th>
      <th width="48"><strong>ROOM</strong></th>
      <th width="49">GUEST</th>
      <th width="60">ACTION</th>
    </tr>
     <?php
	$selQry="select * from tbl_booking b inner join tbl_room r on b.room_id=r.room_id inner join tbl_user u on u.user_id=b.user_id where r.owner_id='".$_SESSION['oid']."' and b.booking_status=1";
 $row=$connection->query($selQry);
 $i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td>
      <td><?php echo $data["user_number"]?></td>
      <td><img src="../Assets/Files/User/Photos/<?php echo $data["user_photo"]?>" height="50",width="50"/></td>
      <td><?php echo $data["room_discription"]  ?></td>
      <td><?php echo $data["booking_guest"] ?></td>
     <td>
  <a href="acceptedlist.php?declain=<?php echo $data['booking_id']?>" class="btn btn-danger">Declain</a></td>
      </tr>
    <?php
	}
	?>
 

  </table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>