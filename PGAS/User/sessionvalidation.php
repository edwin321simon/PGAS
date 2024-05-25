<?php
		session_start();
		if($_SESSION["uid"]=="")
		{
			header("location:../Guest/Login.php");
		}
?>
