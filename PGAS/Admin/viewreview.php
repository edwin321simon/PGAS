
<?php



include('Head.php');



 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
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
                    <th scope="col">SL.NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                 
                    <th scope="col">Date</th>
                    <th scope="col">Owner Name</th>
                    <th scope="col">Reply</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
               $selqry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_room r on c.room_id=r.room_id inner join tbl_owner o on r.owner_id=o.owner_id";
               
                $row = $connection->query($selqry);
                $i = 0;
                while($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $data["user_name"]?></td>
                    <td><?php echo $data["complaint_title"]?></td>
                    <td><?php echo $data["complaint_content"]?></td>
                 
                    <td><?php echo $data["complaint_date"]?></td>
                    <td><?php echo $data["owner_name"]?></td>
                    <td><?php 
                    if($data['complaint_status']==1){
                    echo $data["complaint_reply"];
                    }
                    ?></td>
     
                    <td><a href="Reply.php?rid=<?php echo $data['complaint_id']?>" class="btn btn-danger">Reply</a></td>
               
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
