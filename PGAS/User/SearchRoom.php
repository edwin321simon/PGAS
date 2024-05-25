<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse" >
    <tr>
      <td width="153"><strong>DISTRICT:  
       <p>
        <select name="txt_district" id="txt_district" onchange="getPlace(this.value),getRoom()">
          <option value="">--Select District--</option>
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
      </strong></td>
      <td width="121"><strong>PLACE: 
        <label for="txt_place"></label>
        <select name="txt_place" id="txt_place" onchange="getRoom()">
        <option value="">--select place--</option>
        </select>
      </strong></td>
      <td width="164"><strong>CATEGORY: 
               <p>
        <select name="txt_category" id="txt_categhory" onchange="getRoom()" >
          <option value="">--Select Category--</option>
          <?php
  $selQryDist="select * from tbl_category";
  $result=$connection->query($selQryDist);
  while($row=$result->fetch_assoc())
  {
  ?>
          <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
          <?php }
  ?>
        </select>
      </strong></td>
    </tr>
  </table>
  <div align="center"></div>
</form>
<p>&nbsp; </p>
<p>&nbsp; </p>
<table border="1" align="center" id='result'>
  <tr>

 <?php
	$selqry="select * from tbl_room r inner join tbl_category c on r.category_id=c.category_id";
	$row=$connection->query($selqry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
		?>
        <td>
         <p><?php echo $data['room_guest'] ?></p>
        <p><?php echo $data['room_rent'] ?></p>
        <p><?php echo $data['category_name'] ?></p>
        <p><a href="viewdetails.php?rid=<?php echo $data['room_id']?>">DETAILS</a></p>
        </td>
        
        <?php
		if($i==4)
		{
			echo "</tr><tr>";
		}
	}
	?>
  </tr>
</table>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#txt_place").html(html);
	  }
	});
}
function getRoom(){
	var dist=document.getElementById('txt_district').value;
	var place=document.getElementById('txt_place').value;
	var cat=document.getElementById('txt_categhory').value;
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxSearchRoom.php?did="+dist+"&pid="+place+"&cid="+cat,
	  success: function(html){
		$("#result").html(html);
	  }
	});
}
</script>