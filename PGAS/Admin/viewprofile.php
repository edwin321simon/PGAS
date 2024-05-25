<?php
ob_flush();
include('Head.php');
include("../Assets/Connection/connection.php");


$selqry = "select * from tbl_admin";
$row = $connection->query($selqry);
$data = $row->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile Viewer</title>
</head>
<body>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.profile-card {
    background-color: #fff;
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.profile-header h1 {
    text-align: center;
}

.profile-content {
    margin-top: 20px;
}

.profile-field {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    display: block;
}

span {
    display: inline-block;
    margin-left: 10px;
}
</style>

    <div class="profile-card">
        <div class="profile-header">
            <h1>Profile Information</h1>
        </div>
        <div class="profile-content">
           
            <div class="profile-field">
                <label for="name">Name:</label>
                <span><?php echo $data["admin_name"]?></span>
            </div>
            <div class="profile-field">
                <label for="number">Number:</label>
                <span><?php echo $data["admin_contact"]?></span>
            </div>
            <div class="profile-field">
                <label for="email">Email:</label>
                <span><?php echo $data["admin_email"]?></span>
            </div>
        </div>
    </div>
    <div align="center">
        <a href="editprofile.php">
                <input type="submit" value="Edit" class="btn btn-success" /></a>
                <a href="changepassword.php">
                <input type="submit" value="Change Password" class="btn btn-success" /></a>
                </div> 

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
