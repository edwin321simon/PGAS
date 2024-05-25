<?php

ob_flush();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Management</title>
    <!-- Include Bootstrap CSS (Assuming you have Bootstrap files in your project directory) -->
</head>
<body>
    <?php
    include("../Assets/Connection/connection.php");
    if(isset($_POST["btn_save"])) {
        $district = $_POST["txt_district"];
        $insQry = "insert into tbl_district(district_name) values ('".$district."')";
        if($connection->query($insQry)) {
            ?>
            <script>
                alert("Data Inserted");
                window.location="District.php";
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("FAILED");
                window.location="District.php";
            </script>
            <?php
        }
    }
    if(isset($_GET['did'])) {
        $delqry = "delete from tbl_district where district_id=" . $_GET['did'];
        if($connection->query($delqry)) {
            ?>
            <script>
                alert("Data Deleted");
                window.location="District.php";
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("FAILED");
                window.location="District.php";
            </script>
            <?php
        }
    }
    ?>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <div class="row mb-3">
                <label for="txt_district" class="col-sm-2 col-form-label">district</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="txt_district" id="txt_district" required autocomplete="off"/>
                </div>
                <div class="col-sm-3">
                <input type="submit" name="btn_save" id="btn_save" value="SAVE" class="btn btn-success" />
                </div>
            </div>
        </form>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">SL.NO</th>
                    <th scope="col">District</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selqry = "select * from tbl_district";
                $row = $connection->query($selqry);
                $i = 0;
                while($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $data["district_name"]?></td>
                    <td><a href="District.php?did=<?php echo $data['district_id']?>" class="btn btn-danger">DELETE</a></td>
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
