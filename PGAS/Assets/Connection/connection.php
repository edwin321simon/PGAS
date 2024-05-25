<?php
	$server="localhost";
	$user="root";
	$password="";
	$db="Db_pgas";
	$connection=mysqli_connect($server,$user,$password,$db);
		if(!$connection)
			{
				echo "db error";
			}
?>