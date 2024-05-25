<?php
include("../Assets/Connection/Connection.php");
ob_flush();
include('Head.php');
?>
<?php
$roomid=$_GET['rid'];
$selQry="select * from tbl_room r inner join tbl_owner o on r.owner_id=o.owner_id inner join tbl_place p on o.place_id=p.place_id inner join tbl_category c on r.category_id=c.category_id where room_id='".$roomid."'";
$value=$connection->query($selQry);
$i=0;
while($row=$value-> fetch_assoc())
{
	$i++;
?>




<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <style>
        .image-div img {
            object-fit: contain;
            height: 500px;
        }
    </style>
</head>

<body>
    <section class="section slider-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade-up">Photos</h2>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        <?php
                        $SelGallery="select * from tbl_gallery where room_id='".$roomid."'";
                        $rowGalery=$connection->query($SelGallery);
                        while($dataGallery=$rowGalery->fetch_assoc())
                        {
                        ?>

                        <div class="slider-item image-div">
                            <a href="../Assets/Files/owner/gallery/<?php echo $dataGallery['gallery_photo'] ?>"
                                data-fancybox="images" data-caption="Caption for this image"><img
                                    src="../Assets/Files/owner/gallery/<?php echo $dataGallery['gallery_photo'] ?>"
                                    alt="Image placeholder" class="img-fluid"></a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- END slider -->
                </div>

            </div>
        </div>
    </section>


    <div class="container">
        <table class="table table-bordered table-hover mx-auto" style="width: 50%;">
            <tr>
                <td colspan="2" class="text-center">
                    <h4 class="mt-4"><strong>OWNER:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['owner_name'] ?>
                        </strong></p>
                </td>
                <td colspan="2" class="text-center">
                    <h4 class="mt-4"><strong>PLACE:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['place_name'] ?>
                        </strong></p>
                </td>
                <td colspan="2" class="text-center">
                    <h4 class="mt-4"><strong>PHONE:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['owner_number'] ?>
                        </strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <h4 class="mt-4"><strong>CATEGORY:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['category_name'] ?>
                        </strong></p>
                </td>
                <td colspan="2" class="text-center">
                    <h4 class="mt-4"><strong>SECURITY:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['room_security'] ?>
                        </strong></p>
                </td>
                <td colspan="2" class="text-center">
                    <h4 class="mt-4"><strong>RENT/mon:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['room_rent'] ?>
                        </strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="text-center">
                    <a href="<?php echo $row['room_location']?>" class="btn btn-primary mt-4">Location</a>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="text-center">
                    <h4 class="mt-4"><strong>DESCRIPTION:</strong></h4>
                    <p class="mt-2"><strong>
                            <?php echo $row['room_discription'] ?>
                        </strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="text-center">
                    <?php
                     $selCheck="select * from tbl_booking where booking_status!=4 and room_id=".$row['room_id'];
                        $resCheck=$connection->query($selCheck);
                        if( $resCheck->num_rows > 0)   {
                            $selGuest="select sum(booking_guest) as guest from tbl_booking where booking_status!=4 and room_id=".$row['room_id'];
                            $resGuest=$connection->query($selGuest);
                            $dataGuest=$resGuest->fetch_assoc();
                            if( $dataGuest["guest"] < $row['room_guest']){
                                $rooms=$row['room_guest']-$dataGuest['guest'];
                                echo $rooms." Rooms Left!";
                                ?><br>
                    <a href="Booking.php?rid=<?php echo $row['room_id']?>" class="btn btn-success mt-4">BOOK</a>
                    <?php
                            }
                            else{
                                echo "Room Full";
                            }
                        }
                        else{
                            ?>
                    <a href="Booking.php?rid=<?php echo $row['room_id']?>" class="btn btn-success mt-4">BOOK</a>
                    <?php
                        }
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <p>
        <?php
}
?>
    </p>


</body>
<?php
include('Foot.php');
ob_flush();
?>

</html>