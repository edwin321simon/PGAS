<option value="">Select Place</option>
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_place where district_id=".$_GET['did'];
$res=$connection->query($selQry);
while($row=$res->fetch_assoc())
{
?>
<option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
<?php
}
?>