<?php
include('../Assets/Connection/Connection.php');
include('Head.php');
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>USER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/animate.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/aos.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/jquery.timepicker.css">
    <link rel="stylesheet" href="../Assets/Templates/Main/css/fancybox.min.css">
    
    <link rel="stylesheet" href="fonts/ionicons/../Assets/Templates/Main/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/../Assets/Templates/Main/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="../Assets/Templates/Main/css/style.css">
    <style>
        ul li:hover 
        {
          transform:scale(1.05);
        }
    </style>
  </head>
  <body>
    
    <header class="site-header js-site-header">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a href="homepage.php">P G A S</a></div>
          <div class="col-6 col-lg-8">


            <div class="site-menu-toggle js-site-menu-toggle"  data-aos="fade">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

            <div class="site-navbar js-site-navbar">
              <nav role="navigation">
                <div class="container">
                  <div class="row full-height align-items-center">
                    <div class="col-md-6 mx-auto">
                      <ul class="list-unstyled menu">
                        <li class="active"><a href="homepage.php">Home</a></li>
                        <li><a href="MyProfile.php">MyProfile</a></li>
                        <li><a href="Editprofile.php">Edit Profile</a></li>
                        <li><a href="Changepassword.php">Change Password</a></li>
                        <li><a href="MyBooking.php">My Bookings</a></li>
                        <li><a href="MyComplaint.php">Complaints</a></li>
                        
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END head -->

    

    <section class="site-hero overlay" style="background-image: url(../Assets/Templates/Main/images/hero_4.jpg)" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row site-hero-inner justify-content-center align-items-center">
          <div class="col-md-10 text-center" data-aos="fade-up">

            <span class="custom-caption text-uppercase text-white d-block  mb-3">Welcome To<span class="text-primary"></span>P G A S </span>



            <h1 class="heading">A Best Place To Stay</h1>
          </div>
        </div>
      </div>

      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
      </a>
    </section>
    <!-- END section -->

    <section class="section bg-light pb-0"  >
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form action="#">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                <label for="txt_district" class="font-weight-bold text-black">District</label>
                <select name="txt_district" id="txt_district" class="form-control" onchange="getPlace(this.value),getRoom()">
          <option value="">Select District</option>
          <?php
  $selQryDist="select * from tbl_district";
  $result=$connection->query($selQryDist);
  while($row=$result->fetch_assoc())
  {
  ?>
          <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
          <?php }
  ?>
        </select>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-4">
                  <label for="txt_place" class="font-weight-bold text-black">Place</label>
                  <select class="form-control" name="txt_place" id="txt_place" onchange="getRoom()">
        <option value="">Select</option>
        </select>
                </div>
                
                <div class="col-md-6 col-lg-4 align-self-end">
                <select class="form-control" name="txt_category" id="txt_categhory" onchange="getRoom()" >
          <option value="">--Select Category--</option>
          <?php
  $selQryDist="select * from tbl_category";
  $result=$connection->query($selQryDist);
  while($row=$result->fetch_assoc())
  {
  ?>
          <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
          <?php }
  ?>
        </select>
                  <!-- <button class="btn btn-primary btn-block text-white">Check Availabilty</button> -->
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>

    <section class="section blog-post-entry bg-light">
      <div class="container" id="result">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Choos it</h2>
            <p data-aos="fade-up">Care like your home.Doesn't fell you lonely. Enjoy your life with us.</p>
          </div>
        </div>
        <div class="row" >
        <?php
          $selqry="select * from tbl_room r inner join tbl_category c on r.category_id=c.category_id";
          $row=$connection->query($selqry);
          while($data=$row->fetch_assoc())
          {
        ?>
          <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100" style="margin-bottom:1rem">
            <div class="media media-custom d-block mb-4 h-100">
              <div class="mb-4 d-block" align="center"><img  src="../Assets/Files/Owner/Room/<?php echo $data['room_photo']?>" alt="Image placeholder" class="img-fluid" style="height:250px" align="center"></div>
              <div class="media-body">
                <span class="meta-post"><?php echo $data['category_name']?></span>
                <p><?php echo $data['room_discription']?></p>
                <h2 class="mt-0 mb-3">Rate:<?php echo $data['room_rent']?></h2>
                <?php
										
											
											$average_rating = 0;
											$total_review = 0;
											$five_star_review = 0;
											$four_star_review = 0;
											$three_star_review = 0;
											$two_star_review = 0;
											$one_star_review = 0;
											$total_user_rating = 0;
											$review_content = array();
										
											$query = "SELECT * FROM tbl_review where room_id = '".$data["room_id"]."' ORDER BY review_id DESC";
										
											$result = $connection->query($query);
                      										
											while($row1 = $result->fetch_assoc())
											{
												
										
												if($row1["user_rating"] == '5')
												{
													$five_star_review++;
												}
										
												if($row1["user_rating"] == '4')
												{
													$four_star_review++;
												}
										
												if($row1["user_rating"] == '3')
												{
													$three_star_review++;
												}
										
												if($row1["user_rating"] == '2')
												{
													$two_star_review++;
												}
										
												if($row1["user_rating"] == '1')
												{
													$one_star_review++;
												}
										
												$total_review++;
										
												$total_user_rating = $total_user_rating + $row1["user_rating"];
										
											}
											
											
											if($total_review==0 || $total_user_rating==0 )
											{
												$average_rating = 0 ; 			
											}
											else
											{
												$average_rating = $total_user_rating / $total_review;
											}
											
											?>
                      
                      <p align="center" style="color:#F96;font-size:20px">
                                           <?php
										   if($average_rating==5 || $average_rating==4.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                               <?php
										   }
										   if($average_rating==4 || $average_rating==3.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==3 || $average_rating==2.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==2 || $average_rating==1.5)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==1)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
										   if($average_rating==0)
										   {
											   ?>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                               <?php
										   }
                                           echo "(".$total_review.")";
										   ?>
                                           
                                        </p>
                                        
  
                <a href="viewdetails.php?rid=<?php echo $data['room_id']?>">More..</a>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </section>

    <section class="section bg-image overlay" style="background-image: url('../Assets/Templates/Main/images/hero_4.jpg');">
        <div class="container" >
          <div class="row align-items-center">
            <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
             
            </div>
           
          </div>
        </div>
      </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
             <li><a href="#">Rooms</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="#">The Rooms</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
             
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <!-- <li>198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> 198 West 21th Street, <br> Suite 721 New York NY 10016</span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span> (+91) 8606469091 </span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span> edwin321@gmail.com</span></p>
          </div>
          <div class="col-md-3 mb-5">
            <p>Sign up for our newsletter</p>
            <form action="#" class="footer-newsletter">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email...">
                <button type="submit" class="btn"><span class="fa fa-paper-plane"></span></button>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5">
          <p class="col-md-6 text-left">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
            
          <p class="col-md-6 text-right social">
            <a href="#"><span class="fa fa-tripadvisor"></span></a>
            <a href="#"><span class="fa fa-facebook"></span></a>
            <a href="#"><span class="fa fa-twitter"></span></a>
            <a href="#"><span class="fa fa-linkedin"></span></a>
            <a href="#"><span class="fa fa-vimeo"></span></a>
          </p>
        </div>
      </div>
    </footer>
    
    <script src="../Assets/Templates/Main/js/jquery-3.3.1.min.js"></script>
    <script src="../Assets/Templates/Main/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../Assets/Templates/Main/js/popper.min.js"></script>
    <script src="../Assets/Templates/Main/js/bootstrap.min.js"></script>
    <script src="../Assets/Templates/Main/js/owl.carousel.min.js"></script>
    <script src="../Assets/Templates/Main/js/jquery.stellar.min.js"></script>
    <script src="../Assets/Templates/Main/js/jquery.fancybox.min.js"></script>
    
    
    <script src="../Assets/Templates/Main/js/aos.js"></script>
    
    <script src="../Assets/Templates/Main/js/bootstrap-datepicker.js"></script> 
    <script src="../Assets/Templates/Main/js/jquery.timepicker.min.js"></script> 

    

    <script src="../Assets/Templates/Main/js/main.js"></script>
    
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#txt_place").html(html);
	  }
	});
}
function getRoom(){
	var dist=document.getElementById('txt_district').value;
	var place=document.getElementById('txt_place').value;
	var cat=document.getElementById('txt_categhory').value;
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxSearchRoom.php?did="+dist+"&pid="+place+"&cid="+cat,
	  success: function(html){
		$("#result").html(html);
	  }
	});
}
</script>
  </body>
</html>