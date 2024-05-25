
<?php
include("../Assets/Connection/connection.php");
include('head.php');
ob_flush();

if(isset($_GET['declain']))
{
  $updtQry="update tbl_owner set owner_vstatus=2 where owner_id=".$_GET['declain'];
 $connection->query($updtQry);
}

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Selected Owners</title>
</head>
<body>
<style>
  
.user-list {
    background: #fff;
    color: #333;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    overflow: hidden;
    width: 100%;
    text-align: center;
    padding: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.user-list h2 {
    margin: 0;
    font-size: 24px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    animation: fadeIn 1s;
}

table th,
table td {
    padding: 12px;
    border-bottom: 1px solid #ccc;
}

table th {
    background-color: #3498db;
    color: #fff;
    transition: background-color 0.2s;
}

table th:hover {
    background-color: #e74c3c;
}

table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
    transition: background-color 0.2s;
}

table tbody tr:hover {
    background-color: #3498db;
    color: #fff;
    transition: background-color 0.2s;
}

.action-button {
    background-color: #3498db;
    border: none;
    color: #fff;
    padding: 10px 20px;
    border-radius: 30px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.2s, transform 0.2s ease-in-out;
    outline: none;
    border: 2px solid #2980b9;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.action-button:hover {
    background-color: #4CAF50;
    transform: scale(1.05);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    
</style>
<div class="user-list">
    <h2>Verified Owners</h2>
    <table>
        <tr>
            <th>Sl.No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry = "select * from tbl_owner o inner join tbl_place p on o.place_id=p.place_id where owner_vstatus='1' and p.district_id=".$_SESSION['sdistrict'];
        $row = $connection->query($selQry);
        $i = 0;
        while ($data = $row->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data["owner_name"] ?></td>
                <td><?php echo $data["owner_email"] ?></td>
                <td><?php echo $data["owner_number"] ?></td>
                <td><?php echo $data["owner_address"] ?></td>
                
                <td><a href="../Assets/Files/owner/photos/<?php echo $data["owner_photo"] ?>" target="_blank"><img src="../Assets/Files/owner/photos/<?php echo $data["owner_photo"] ?>" height="50"
                         width="50"/></a></td>
                
                <td><a href="VerifiedOwner.php?declain=<?php echo $data['owner_id']?>"
                       class="action-button">Reject</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
