<?php
 include("../Assets/Connection/connection.php");

  ob_flush();
  include('head.php');

 
 if(isset($_GET['accept']))
 {
  $updtQry="update tbl_user set user_vstatus=1 where user_id=".$_GET['accept'];
 
  $connection->query($updtQry);
 }
 if(isset($_GET['declain']))
 {
   $updtQry="update tbl_user set user_vstatus=2 where user_id=".$_GET['declain'];
  $connection->query($updtQry);
 }
 
	 
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <style>
    
    .verification-list {
      margin-top: 300px;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      align-items: center;
    }

    .verification-card {
      background: linear-gradient(135deg, #3498db, #9b59b6);
      color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      width: 300px;
      text-align: center;
      transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
    }

    .verification-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
      background: linear-gradient(135deg, #2980b9, #8e44ad);
    }

    .verification-info {
      padding: 20px;
    }

    .user-avatar {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      transition: transform 0.2s ease-in-out;
    }

    .user-avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .user-avatar:hover {
      transform: scale(1.05);
    }

    h2 {
      margin: 0;
      font-size: 24px;
    }

    p {
      margin: 5px 0;
      font-size: 16px;
      opacity: 0.8;
    }

    .verification-actions {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;
    }

    button {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin: 5px;
      font-size: 16px;
      transition: background-color 0.2s, color 0.2s, transform 0.2s ease-in-out, border 0.2s;
    }

    .accept-button:hover {
      background-color: #4CAF50;
      border-color: #4CAF50;
      transform: scale(1.05);
    }

    .reject-button:hover {
      background-color: #FF5733;
      border-color: #FF5733;
      transform: scale(1.05);
    }
  </style>
</head>

<body>
  <div class="verification-list">
  <?php
	$selQry="select * from tbl_user u inner join tbl_place p on u.place_id=p.place_id where user_vstatus='0' and p.district_id=".$_SESSION['sdistrict'];
 $row=$connection->query($selQry);
	while($data=$row->fetch_assoc())
	{
	?>
    <div class="verification-card">
      <div class="verification-info">
        <div class="user-avatar">
          <a href="../Assets/Files/User/Photos/<?php echo $data["user_photo"]?>" target="_blank"><img src="../Assets/Files/User/Photos/<?php echo $data["user_photo"]?>"></a>
        </div>
        <h2><?php echo $data["user_name"]?></h2>
        <p>Email: <?php echo $data["user_email"]?></p>
        <p>Phone: <?php echo $data["user_number"]?></p>
        <p>Address : <?php echo $data["user_address"]?></p>
        <p>DOB :<?php echo $data["user_dob"]?></p>
        <p>PROOF: <a href="../Assets/Files/User/Proof/<?php echo $data["user_proof"]?>" target="_blank"><?php echo $data["user_proof"]?></a></p>
      </div>
      <div class="verification-actions">
      <a href="UserVerification.php?accept=<?php echo $data['user_id']?>">
        <button class="accept-button">Accept</button>
      </a>
      <a href="UserVerification.php?declain=<?php echo $data['user_id']?>" >
      <button class="reject-button">Reject</button>
      </a>
      </div>
    </div>
    <?php
	}
	?>
  </div>
</body>

</html>