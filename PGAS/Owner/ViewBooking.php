<?php
include("../Assets/Connection/connection.php");
// include("sessionvalidation.php");
ob_start();
include('Head.php');

if(isset($_GET["cid"]))
{
	$up = "update tbl_booking set booking_status='4' where booking_id='".$_GET["cid"]."'";
	if($connection->query($up))
	{
		header("location:MyBooking.php");
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" style="border-collapse:collapse">
    <tr>
      <th ><strong>SL.NO</strong></th>
      <th><strong>USER NAME</strong></th>
      <th><strong>CONTACT</strong></th>
      <th><strong>PHOTO</strong></th>
      <th><strong>ROOM</strong></th>
      <th><strong>GUEST</strong></th>
      <th><strong>STATUS</strong></th>
	  <th><strong>VIEW GUEST</strong>
	  </th>
   
    </tr>
    <?php
	  $selQry="select * from tbl_booking b inner join tbl_room r on b.room_id=r.room_id inner join tbl_user u on u.user_id=b.user_id where r.owner_id='".$_SESSION['oid']."' and b.booking_status>=1 and b.booking_payment>=1";
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
      <td><a href="../Assets/Files/User/Photos/<?php echo $data["user_photo"]?>"><img src="../Assets/Files/User/Photos/<?php echo $data["user_photo"]?>" height="50",width="50"/></a></td>
      <td><?php echo $data["room_discription"]  ?></td>
      <td><?php echo $data["booking_guest"] ?></td>
     <td> <?php if($data["booking_status"]==1)
	 {
		 if($data["booking_payment"]==0)
		 {
			echo "ACCEPTED";
		 }
		 else{
			echo "Payment Completed";
		 }
	 }
	 else if($data["booking_status"]==2)
	 {
		 echo "REJECTED" ;
	 }
	 else if($data["booking_status"]==0)
	 {
		 echo "Pending" ;
	 }
	 else if($data["booking_status"]==4)
	 {
		 echo "Canceld" ;
	 }
	 
	?></td>
	<td><a href="GuestDetails.php?bid=<?php echo $data['booking_id'] ?>" class="btn btn-success">VIEW</a></td>
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