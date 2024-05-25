
<?php
		session_start();
		if($_SESSION["oid"]=="")
		{
			header("location:../Guest/Login.php");
		}
?>


