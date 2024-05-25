
<?php
if($_GET['val']=='true')
{
	?>
<select name="txt_ftype" id="txt_ftype" >
<option value="">Select Food Type</option>
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_ftype";
$res=$connection->query($selQry);
while($row=$res->fetch_assoc())
{
?>
<option value="<?php echo $row['ftype_id'] ?>"><?php echo $row['ftype_name'] ?></option>
<?php
}
?>
</select>
<?php
}
else
{
	?>
     <select name="txt_ftype" id="txt_ftype" disabled="disabled">
        <option value="">Select Food Type</option>
      </select>
    <?php
}
?>