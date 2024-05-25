<?php
ob_flush();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <!-- Include Bootstrap CSS (Assuming you have Bootstrap files in your project directory) -->
</head>
<body>
    <?php
    include("../Assets/Connection/connection.php");
    
    if(isset($_GET['sid'])) {
        $delqry = "delete from tbl_subadmin where subadmin_id=" . $_GET['sid'];
        if($connection->query($delqry)) {
            ?>
            <script>
                alert("Data Deleted");
                window.location="SubAdmins.php";
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("FAILED");
                window.location="SubAdmins.php";
            </script>
            <?php
        }
    }
    ?>
    <div class="container">
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">SL.NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">District</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selqry = "select * from tbl_subadmin s inner join tbl_district d on s.district_id=d.district_id";
                $row = $connection->query($selqry);
                $i = 0;
                while($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $data["subadmin_name"]?></td>
                    <td><?php echo $data["subadmin_number"]?></td>
                    <td><?php echo $data["subadmin_email"]?></td>
                    <td><?php echo $data["district_name"]?></td>
                    <td><?php echo $data["subadmin_gender"]?></td>
                    
                    <td><a href="SubAdmins.php?sid=<?php echo $data['subadmin_id']?>" class="btn btn-danger">DELETE</a></td>
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
