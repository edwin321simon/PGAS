<?php
ob_flush();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relation Management</title>
    <!-- Include Bootstrap CSS (Assuming you have Bootstrap files in your project directory) -->
</head>
<body>
    <?php
    include("../Assets/Connection/connection.php");
    if(isset($_POST["btn_save"])) {
        $relation = $_POST["txt_relation"];
        $insQry = "insert into tbl_relation(relation_name) values ('".$relation."')";
        if($connection->query($insQry)) {
            ?>
            <script>
                alert("Data Inserted");
                window.location="Relation.php";
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("FAILED");
                window.location="Relation.php";
            </script>
            <?php
        }
    }
    if(isset($_GET['rid'])) {
        $delqry = "delete from tbl_relation where relation_id=" . $_GET['rid'];
        if($connection->query($delqry)) {
            ?>
            <script>
                alert("Data Deleted");
                window.location="Relation.php";
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("FAILED");
                window.location="Relation.php";
            </script>
            <?php
        }
    }
    ?>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
            <div class="row mb-3">
                <label for="txt_relation" class="col-sm-2 col-form-label">Relation</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="txt_relation" id="txt_relation" required autocomplete="off"/>
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
                    <th scope="col">Relation</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selqry = "select * from tbl_relation";
                $row = $connection->query($selqry);
                $i = 0;
                while($data = $row->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $data["relation_name"]?></td>
                    <td><a href="Relation.php?rid=<?php echo $data['relation_id']?>" class="btn btn-danger">DELETE</a></td>
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
