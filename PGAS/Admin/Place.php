<?php
ob_flush();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Management</title>
    <!-- Include Bootstrap CSS (Assuming you have Bootstrap files in your project directory) -->
</head>
<body>
    <?php
    include("../Assets/Connection/connection.php");
    if(isset($_POST["btn_save"])) {
        
        $district=$_POST["txt_district"];
        $place=$_POST["txt_place"];
            $insQry="insert into tbl_place(place_name,district_id)values('".$place."','".$district."')";
            if($connection->query($insQry))
            {
                ?>
                <script>
                alert("Data Inserted");
                window.location="place.php";
                </script>
                <?php
            }
            else{
                
                    ?>
                    <script>
                    alert("Data Not Inserted");
                    window.location="place.php";
                    </script>
                    <?php
                
        }
            }
    
        
    if(isset($_GET['pid'])) {
        $delqry = "delete from tbl_place where place_id=" . $_GET['pid'];
        if($connection->query($delqry)) {
            ?>
            <script>
                alert("Data Deleted");
                window.location="place.php";
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("FAILED");
                window.location="place.php";
            </script>
            <?php
        }
    }
    ?>
    <div class="container">
        <form id="form1" name="form1" method="post" action="">
           
       
            <label for="txt_category" class="col-sm-2 col-form-label">District</label>
     <label for="txt_district"></label>
  <select name="txt_district" id="txt_district">
  <option value="">-Select District-</option>
  <?php
  $selQry="select * from tbl_district";
  $result=$connection->query($selQry);
  while($row=$result->fetch_assoc())
  {
  ?>
  <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
  <?php }
  ?>
  </select>


            <div class="row mb-3">
                <label for="txt_category" class="col-sm-2 col-form-label">Place</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="txt_place" id="txt_place" required autocomplete="off"/>
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
                    <th scope="col">Place</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
              
               $selQry = "SELECT * FROM tbl_place p INNER JOIN tbl_district d ON p.district_id = d.district_id";
               $result = $connection->query($selQry);
               
               if ($result === false) {
                   echo "Query error: " . $mysqli->error;
               } else {
                   $i = 0;
                   while ($data = $result->fetch_assoc()) {
                       $i++;
               ?>
                       <tr>
                           <td><?php echo $i ?></td>
                           <td><?php echo $data["district_name"] ?></td>
                           <td><?php echo $data["place_name"] ?></td>
                           <td><a href="Place.php?pid=<?php echo $data['place_id'] ?>" class="btn btn-danger">DELETE</a></td>
                       </tr>
               <?php
                   }
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
