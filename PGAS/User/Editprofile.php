






<?php

include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where user_id=".$_SESSION['uid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile Page</title>
</head>
<body>
    <style>

.profile {
    background: #f5f5f5;
    color: #333;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    border-radius: 20px;
    overflow: hidden;
    width: 400px;
    text-align: center;
    padding: 20px;
    transform: translateY(0);
    opacity: 1;
    transition: transform 0.5s, opacity 0.5s;
}

.profile-header {
    background: #3498db;
    color: #fff;
    padding: 20px;
    border-radius: 20px 20px 0 0;
}

.profile h1 {
    margin: 0;
    font-size: 28px;
}

.profile-image {
    border-radius: 50%;
    overflow: hidden;
    margin-top: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
}

.profile-image img {
    max-width: 100%;
    display: block;
}

.profile-table {
    width: 100%;
    text-align: left;
    margin-top: 20px;
    margin-bottom: 20px;
}

.profile-table td {
    padding: 12px;
    border-bottom: 1px solid #ccc;
}

.profile-table tr:last-child td {
    border-bottom: none;
}

.profile:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

.profile-image:hover {
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
}

    </style>
    <?php
$selQry="select * from tbl_user where user_id=".$_SESSION['uid'];
$result=$connection->query($selQry);
$row=$result->fetch_assoc();

if(isset($_POST['btn_save']))
{
	$user_name=$_POST['txt_name'];
	$user_number=$_POST['txt_number'];
	$user_address=$_POST['txt_address'];
	$user_dob=$_POST['txt_dob'];

	
	$updtQry="update tbl_user set user_name='".$user_name."',user_number='".$user_number."',user_address='".$user_address."',user_dob='".$user_dob."' where user_id=".$_SESSION['uid'];
	
	if($connection->query($updtQry))
	{ header("location:Myprofile.php");
	}
}
?>

    <div align="center">
    <div  class="profile">
        <div class="profile-header">
            <h1>Edit Profile</h1>
           
        </div>
        <form action="#" method="post" class="form-reg"  enctype="multipart/form-data">
<div class="form-group first">
								<label for="txt_name">Name</label>
								<input type="text" class="form-control" placeholder="Name"
									name="txt_name" value="<?php echo $row['user_name']?>" id="txt_name">
							</div>
              <div class="form-group first">
								<label for="txt_number">Contact</label>
								<input type="text" class="form-control" placeholder="contact"
									name="txt_number" value="<?php echo $row['user_number']?>" id="txt_number">
							</div>
              <div class="form-group first">
								<label for="txt_address">Address</label>
								<textarea class="form-control" placeholder="Address"
                                name="txt_address" id="txt_address"><?php echo $row['user_address']?></textarea>
							</div> 
              <div class="form-group first">
								<label for="txt_dob">DOB</label>
								<input type="date" class="form-control" placeholder="date of birth"
									name="txt_dob" value="<?php echo $row['user_dob']?>" id="txt_dob">
							</div>  
     
              
                      
                <input type="submit" name="btn_save" id="btn_save" value="SAVE" class="btn btn-success" />
   
               



                
            
        </form>
    

   
    </div>
    </div>
    <?php 
    include('Foot.php');
    ob_flush();
    ?>
    </body>
</html>
