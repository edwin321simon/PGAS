<?php
	include("../Assets/Connection/connection.php");
  ob_flush();
  include('Head.php');
$flag=0;
if(isset($_POST['btn_add']))
{
    $photos=$_FILES['txt_image'];
    for ($i = 0; $i < count($photos['name']); $i++) {
        $photoName = $photos['name'][$i];
        $photoTmpName = $photos['tmp_name'][$i];
        move_uploaded_file($photoTmpName, '../Assets/Files/owner/gallery/'.$photoName);
        $query = "INSERT INTO tbl_gallery (gallery_photo,room_id) VALUES ('$photoName','".$_GET['rid']."')";
        if($connection->query($query))
        {
            $flag++;
        }
    }
    if($flag==$i)
    {
        echo '<script>alert("Upload Successfull");</script>';
    }
    else{
        ?>
        <script>alert("Only <?php echo $flag ?> Uploaded. Remaining Failed!");</script>'
        <?php
    }
}
?>




<?php
		
if(isset($_GET['oid']))
{	
	$delqry="delete from tbl_gallery where gallery_id=".$_GET['oid'];
	if($connection->query($delqry))
	{
		
	 ?>
        <script>alert("Deleted");
        window.location="AddGallery.php?rid=<?php echo $_GET['id'] ?>";
        </script>
        <?php
	}
?>
<?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Gallery</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Image</td>
      <td><label for="txt_image"></label>
      <input type="file" multiple name="txt_image[]" id="txt_image" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_add" id="btn_add" value="Add" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </td>
    </tr>
  </table>

</br>




<table border="1">
  <tr>

  <th>IMAGE</th>
  <th>ACTION</th>
  </tr>
  <tr>
    <?php
	$selqry="select * from tbl_gallery";
	$row=$connection->query($selqry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>

    

      <td><img src="../Assets/Files/owner/gallery/<?php echo $data['gallery_photo'] ?>"/></td>
      <td><a href="AddGallery.php?oid=<?php echo $data['gallery_id']?>&id=<?php echo $_GET['rid'] ?>">DELETE</a></td>
    </tr>
    <?php
	}
	?>
  </tr>
</table>
</form>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>