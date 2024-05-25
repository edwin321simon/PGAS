<?php
		session_start();
		if($_SESSION["aid"]=="")
		{
			header("location:../Guest/Login.php");
		}
?>
