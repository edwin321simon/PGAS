<?php
include("../Assets/Connection/connection.php");
ob_flush();
include('Head.php');

if(isset($_POST['btn_post'])) {
    $title = $_POST['txt_title'];
    $content = $_POST['txt_content'];
    $insQry="insert into tbl_complaint(complaint_title,complaint_content,complaint_date,user_id,room_id)values('".$title."','".$content."',curdate(),'".$_SESSION["uid"]."','".$_GET["rid"]."')";
    $connection->query($insQry);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Complaints</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        #txt_title {
            width: 100%;
            padding: 5px;
        }

        #txt_content {
            width: 100%;
            height: 100px;
            padding: 5px;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-cancel {
            background-color: #ff0000;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        a {
            color: #ff0000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>
                    <label for="txt_title">Complaint Title</label>
                </td>
                <td>
                    <input type="text" name="txt_title" id="txt_title" required placeholder="Enter a descriptive title for your complaint" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txt_content">Complaint Content</label>
                </td>
                <td>
                    <textarea name="txt_content" id="txt_content" required placeholder="Provide detailed information about your complaint"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="btn-container">
                    <button type="submit" name="btn_post" class="btn">POST</button>
                    <button type="reset" name="btn_cancel" class="btn btn-cancel">CANCEL</button>
                </td>
            </tr>
        </table>
    </form>

</body>

<?php
include('Foot.php');
ob_flush();
?>
</html>
