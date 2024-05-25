
<?php
include('../Connection/Connection.php');
$selQry="select * from tbl_room r inner join tbl_category c on r.category_id=c.category_id inner join tbl_owner o on r.owner_id=o.owner_id inner join tbl_place p on o.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where true";
if($_GET['did']!="")
{
	$selQry=$selQry." and d.district_id IN(".$_GET['did'].")";
}	
if($_GET['pid']!="")
{
	$selQry=$selQry." and p.place_id IN(".$_GET['pid'].")";
}
if($_GET['cid']!="")
{
	$selQry=$selQry." and c.category_id IN(".$_GET['cid'].")";
}
$row=$connection->query($selQry);
if($row->num_rows>0)
{
	?>
	 <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Choos it</h2>
            <p data-aos="fade-up">Care like your home.Doesn't fell you lonely. Enjoy your life with us.</p>
          </div>
        </div>
	<?php
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
}
else{
	?>
	 <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">No Data Found</h2>
            <p data-aos="fade-up">Care like your home.Doesn't fell you lonely. Enjoy your life with us.</p>
          </div>
        </div>
	<?php
}
?>