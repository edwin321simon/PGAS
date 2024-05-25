
<?php



include('Head.php');



 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <!-- Include Bootstrap CSS (Assuming you have Bootstrap files in your project directory) -->
</head>
<body><?php
include("../Assets/Connection/connection.php");
?>
 
    <form action="#" method="post" class="form-reg"  enctype="multipart/form-data">
    <div class="container">
        
        <table class="table mt-3">
            <thead>
                <tr>
                <th scope="col">SL NO</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Room Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Review</th>
                 
                    <th scope="col">Rating</th>
                    <th scope="col">Owner Name</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
               $selqry="select * from tbl_review re inner join tbl_user u on re.user_name=u.user_name inner join tbl_room r on re.room_id=r.room_id inner join tbl_owner o on r.owner_id=o.owner_id inner join tbl_category c on c.category_id=r.category_id";
               
                $row = $connection->query($selqry);
                $i = 0;
                while($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $data["user_name"]?></td>
                    <td><?php echo $data["room_discription"]?></td>
                    <td><?php echo $data["category_name"]?></td>
                 
                    <td><?php echo $data["user_review"]?></td>
                    <td><?php echo $data["user_rating"]?></td>
                    <td><?php echo $data["owner_name"]?></td>
               
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
