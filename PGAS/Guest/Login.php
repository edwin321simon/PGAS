<?php
	include("../Assets/Connection/connection.php");
	session_start();	
	if(isset($_POST['btn_login']))
	{
		$email=$_POST['txt_email'];
		$password=$_POST['txt_password'];
		$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
		$selsubadmin="select * from tbl_subadmin where subadmin_email='".$email."' and subadmin_password='".$password."'";
		$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'"; 
		$selOwner="select * from tbl_owner where owner_email='".$email."' and owner_password='".$password."'";
		$resAdmin=$connection->query($selAdmin);
		$ressubadmin=$connection->query($selsubadmin);
		$resUser=$connection->query($selUser);
		$resOwner=$connection->query($selOwner);
			if($resAdmin->num_rows>0)
			{
			$row=$resAdmin->fetch_assoc();
			$_SESSION['aid']=$row['admin_id'];
			$_SESSION['aname'] = $row['admin_name'];
			header('location: ../Admin/Homepage.php');
		}
		else if($ressubadmin->num_rows>0)
		{
				$row=$ressubadmin->fetch_assoc();
			$_SESSION['sid']=$row['subadmin_id'];
			$_SESSION['sdistrict']=$row['$district_id'];
			$_SESSION['sname'] = $row['subadmin_name'];
			$_SESSION['sdistrict']=$row['district_id'];
			header('location: ../Subadmin/Homepage.php');
		}
		else if($resUser->num_rows>0)
		{
			$row=$resUser->fetch_assoc();
			if($row["user_vstatus"]==1)
			{
				$_SESSION['uid']=$row['user_id'];
				$_SESSION['uname'] = $row['user_name'];			
				header('location: ../User/Homepage.php');
			}
			elseif($row["user_vstatus"]==2)
			{
				?>
				<script>
					alert("Admin rejected you");
					window.location="Login.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
					alert("You are not varified");
					window.location="Login.php";
				</script>
				<?php
			}
		}
		else if($resOwner->num_rows>0)
		{
			$row=$resOwner->fetch_assoc();
			if($row["owner_vstatus"]==1)
			{
				$_SESSION['oid']=$row['owner_id'];
				$_SESSION['oname'] = $row['owner_name'];			
				header('location: ../Owner/Homepage.php');
			}
			elseif($row["owner_vstatus"]==2)
			{
				
				?>
				<script>
					alert("Admin rejected you");
					window.location="Login.php";
				</script>
				<?php
			}
			else
			{
				?>
				<script>
					alert("You are not varified");
					window.location="Login.php";
				</script>
				<?php
			}
		}
	 	else
		{
			?>
			<script>
				alert("Invalid User");
				window.location="Login.php";
			</script>
			<?php
		}
		
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../Assets/Templates/Login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Assets/Templates/Login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Assets/Templates/Login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">

    <title>Login</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../Assets/Templates/Login/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>P G A S</strong></h3>
           <br>
		   <br>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="txt_email">Email</label>
                <input type="email" class="form-control" placeholder="your email @gmail.com" name="txt_email" id="txt_email" required autocomplete="off">
              </div>
              <div class="form-group last mb-3">
                <label for="txt_passsword">Password</label>
                <input type="password" class="form-control" placeholder="Your password" id="txt_password" name="txt_password" required autocomplete="off">
              </div>
              
          <br>
		  <br>
		  

              <input type="submit" value="LOGIN" name=btn_login id=btn_login class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="../Assets/Templates/Login/js/jquery-3.3.1.min.js"></script>
    <script src="../Assets/Templates/Login/js/popper.min.js"></script>
    <script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
    <script src="../Assets/Templates/Login/js/main.js"></script>
  </body>
</html>