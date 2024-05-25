<?php
include("../Assets/Connection/Connection.php");

include('Head.php');
ob_flush();


$selQry="select * from tbl_owner o inner join tbl_place p on o.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where owner_id=".$_SESSION['oid'];
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
    overflow: hidden;
    margin-top: 20px;
    display: flex;
    justify-content: center; 
}

.profile-image img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: block;  
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
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
    <div align="center">
    <div  class="profile">
        <div class="profile-header">
            <h1>Owner Profile</h1>
            <div class="profile-image">
                <img src="../Assets/Files/Owner/Photos/<?php echo $row['owner_photo'] ?>" alt="Profile Image">
            </div>
        </div>
        <table class="profile-table">
            <tr>
                <td>Name:</td>
                <td><?php echo $row['owner_name']?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?php echo $row['owner_number']?></td>
            </tr>
            <tr>
                <td>Adress:</td>
                <td><?php echo $row['owner_address']?></td>
            </tr>
            <tr>
    <td>GENDER</td>
    <td><?php echo $row['owner_gender'] ?></td>
  </tr>

  <tr>
    <td>EMAIL</td>
    <td><?php echo $row['owner_email'] ?></td>
  </tr>
  <tr>
    <td>DISTRICT</td>
    <td><?php echo $row['district_name']?></td>
  </tr>
  
  <tr>
    <td>PLACE</td>
    <td><?php echo $row['place_name']?></td>
  </tr>
  <tr>
    
    <td colspan="2" align="center">

        <a href="Changepassword.php" class="btn btn-success">Change Password</a>
       
    </td>
    
  </tr>
  
        </table>
    </div>
    </div>
    <?php 
    include('Foot.php');
    ob_flush();
    ?>
    </body>
</html>
