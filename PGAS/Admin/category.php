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
        if(isset($_POST["btn_save"])) {
            $category = $_POST["txt_category"];
            $insQry = "insert into tbl_category(category_name) values ('".$category."')";
            if($connection->query($insQry)) {
                ?>
                <script>
                    alert("Data Inserted");
                    window.location="category.php";
                </script>
                <?php
            }
            else {
                ?>
                <script>
                    alert("FAILED");
                    window.location="category.php";
                </script>
                <?php
            }
        }
        if(isset($_GET['cid'])) {
            $delqry = "delete from tbl_category where category_id=" . $_GET['cid'];
            if($connection->query($delqry)) {
                ?>
                <script>
                    alert("Data Deleted");
                    window.location="category.php";
                </script>
                <?php
            }
            else {
                ?>
                <script>
                    alert("FAILED");
                    window.location="category.php";
                </script>
                <?php
            }
        }
        ?>
        <div class="container">
            <form id="form1" name="form1" method="post" action="">
                <div class="row mb-3">
                    <label for="txt_category" class="col-sm-2 col-form-label">CATEGORY</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="txt_category" id="txt_category" pattern="([a-z][A-Z])" required/>
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
                        <th scope="col">CATEGORY</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selqry = "select * from tbl_category";
                    $row = $connection->query($selqry);
                    $i = 0;
                    while($data = $row->fetch_assoc()) {
                        $i++;
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $data["category_name"]?></td>
                        <td><a href="category.php?did=<?php echo $data['category_id']?>" class="btn btn-danger">DELETE</a></td>
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