<?php
include("../Assets/Connection/Connection.php");

ob_start();
include('Head.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <th width="54"><strong>SL.NO</strong></th>
      <th width="89"><strong>USER NAME</strong></th>
      <th width="75"><strong>CONTACT</strong></th>
      <th width="53"><strong>ADDRESS</strong></th>
      <th width="48"><strong>GENDER</strong></th>
      <th width="49">PHOTO</th>
      <th width="60">RELATION</th>
      <th width="60">DOB</th>
	
   
    </tr>
    <?php
	$selQry="select * from tbl_guest g inner join tbl_relation r on g.relation_id=r.relation_id where booking_id=".$_GET['bid'];
  $row=$connection->query($selQry);
 $i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data["guest_name"]?></td>
      <td><?php echo $data["guest_number"]?></td>
      <td><?php echo $data["guest_address"]?></td>
      <td><?php echo $data["guest_gender"]?></td>
      <td><a href="../Assets/Files/User/Guest/<?php echo $data["guest_photo"]?>" target="_blank"><img src="../Assets/Files/User/Guest/<?php echo $data["guest_photo"]?>" height="50",width="50"/></a></td>
      <td><?php echo $data["relation_name"]  ?></td>
      <td><?php echo $data["guest_age"] ?></td>

      </tr>
    <?php
	}
	?>
 

  </table>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>