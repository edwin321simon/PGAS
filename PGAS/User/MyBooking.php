<?php
include("../Assets/Connection/Connection.php");

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
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <th width="54"><strong>SL.NO</strong></th>
      <th width="89"><strong>USER NAME</strong></th>
      <th width="75"><strong>CONTACT</strong></th>
      <th width="53"><strong>PHOTO</strong></th>
      <th width="48"><strong>ROOM</strong></th>
      <th width="49">GUEST</th>
      <th width="60">STATUS</th>
      <th width="60">ACTION</th>
    </tr>
     <?php
	$selQry="select * from tbl_booking b inner join tbl_room r on b.room_id=r.room_id inner join tbl_owner o on o.owner_id=r.owner_id where b.user_id='".$_SESSION['uid']."'";
 $row=$connection->query($selQry);
 $i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["owner_name"]?></td>
      <td><?php echo $data["owner_number"]?></td>
      <td><img src="../Assets/Files/owner/photos/<?php echo $data["owner_photo"]?>" height="50",width="50"/></td>
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
	<td>
	<?php if($data["booking_status"]==1)
	 {
		 if($data["booking_payment"]==0)
		 {
			$selGst="select * from tbl_guest where booking_id = '".$data["booking_id"]."'";
			$data_guest=$connection->query($selGst);
			if($rowGst=$data_guest->fetch_assoc())
			{
				?>
<a href="MyBooking.php?cid=<?php echo $data["booking_id"]?>" style="color:red">Cancel</a><a href="Payment.php?bid=<?php echo $data["booking_id"]?>">Pay Now</a>
				<?php
			}
			else
			{
				 
			?><a href="AddGuest.php?bid=<?php
			echo $data["booking_id"]?>">Add Guest Details</a>
<a href="MyBooking.php?cid=<?php echo $data["booking_id"]?>" style="color:red">Cancel</a>			<?php
			}
		 }
		 else{
			?>
			<a href="MyBooking.php?cid=<?php echo $data["booking_id"]?>" style="color:red">Cancel</a>
			<a href="Rating.php?rid=<?php echo $data["room_id"]?>">Review</a>
			 <br/>
			 <a href="PostComplaint.php?rid=<?php echo $data["room_id"]?>">Complaint</a>
		 <?php
		 }
	 }
	 ?>
	</td>
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