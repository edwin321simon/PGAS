<?php
include("sessionvalidation.php");
include("../Assets/Connection/Connection.php");
ob_start();
include('head.php');
$roomid = $_GET['rid'];

if (isset($_POST["btn_request"])) {
    $insQry = "insert into tbl_booking(user_id,room_id,booking_date,booking_fromdate,booking_todate,booking_guest)values('" . $_SESSION["uid"] . "','" . $roomid . "',curdate(),'" . $_POST["txt_fromdate"] . "','" . $_POST["txt_todate"] . "','" . $_POST["txt_guest"] . "')";
    $connection->query($insQry);
    header("location:Homepage.php");
}
$selQry = "select * from tbl_room r inner join tbl_owner o on r.owner_id=o.owner_id inner join tbl_place p on o.place_id=p.place_id inner join tbl_category c on r.category_id=c.category_id where room_id='" . $roomid . "'";
$res = $connection->query($selQry);
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Room Details</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles for specific elements */

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
        }

        .property-info {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .property-info p {
            margin: 10px 0;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="date"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-custom {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #ff4f3a;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header text-center">
            Room Details
        </div>
        <div class="property-info">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>OWNER:</label>
                       &nbsp; &nbsp;
                       <?php echo $row['owner_name'] ?>
                        <p><label>PLACE:</label>
                        &nbsp; &nbsp;
                        <?php echo $row['place_name']?></p>
                        <p><label>PHONE:</label>
                        &nbsp; &nbsp;
                        <?php echo $row['owner_number'] ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>CATEGORY:</label>
                       &nbsp; &nbsp;
                       <?php echo $row['category_name'] ?>
                        <p><label>SECURITY:</label>
                        &nbsp; &nbsp;
                        <?php echo $row['room_security'] ?></p>
                        <p><label>RENT/mon:</label>
                        &nbsp; &nbsp;
                        <?php echo $row['room_rent'] ?></p>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="property-info">
        <div class="col-md-6">
        <div class="form-group">
            <label>DESCRIPTION:</label>
            <p><?php echo $row['room_discription'] ?></p>
        </div>
        </div>
        </div>
        <div class="property-info">
            <form method="post">
                <div class="form-group">
                    <label for="txt_fromdate">FROM DATE:</label>
                    <input type="date" name="txt_fromdate" id="txt_fromdate" onchange="getChange(this.value)" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="txt_todate">TO DATE:</label>
                    <input type="date" name="txt_todate" id="txt_todate" disabled="true" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label for="txt_guest">NUMBER OF GUEST:</label>
                    <input type="number" name="txt_guest" id="txt_guest" min="1" max="<?php echo $row['room_guest'] ?>"
                        class="form-control" required/>
                </div>
                <div class="text-center">
                    <button type="submit" name="btn_request" id="btn_request" class="btn btn-custom">REQUEST</button>
                    <button type="reset" name="btn_cancel" id="btn_cancel" class="btn btn-secondary">CANCEL</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery (for Bootstrap JavaScript components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function getChange(val) {
            var todate = document.getElementById('txt_todate');
            todate.disabled = '';
            const inputDate = new Date(val);
            const newDate = new Date(inputDate);
            newDate.setDate(newDate.getDate() + 15);
            const formattedDate = newDate.toISOString().split('T')[0];
            todate.min = formattedDate;
        }

        // Get a reference to the input element
        const fromDateInput = document.getElementById("txt_fromdate");

        // Get the current date in the format "YYYY-MM-DD"
        const currentDate = new Date().toISOString().split('T')[0];

        // Set the min attribute to the current date
        fromDateInput.min = currentDate;
    </script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
