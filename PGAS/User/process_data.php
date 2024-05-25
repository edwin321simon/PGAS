<?php
  include("sessionvalidation.php");

 include("../Assets/Connection/Connection.php");
  ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guest_name']) && isset($_POST['guest_address']) && isset($_POST['guest_gender']) && isset($_POST['guest_number']) ){
    $name = $_POST['guest_name'];
    $address = $_POST['guest_address'];
	$gender = $_POST['guest_gender'];
	$number = $_POST['guest_nnumber'];



    // Assuming you have a database connection
   

    // Loop through the data and insert into the database
    for ($i = 0; $i < count($name); $i++) {
        $name = $connection->real_escape_string($name[$i]);
        $address = $connection->real_escape_string($address[$i]);
		$gender = $connection->real_escape_string($gender[$i]);
		$number = $connection->real_escape_string($number[$i]);
        // Insert data into the database
        $query = "INSERT INTO tbl_guest (guest_name,guest_address,guest_gender,guest_number) VALUES ('$name','$address','$gender','$number',".$_SESSION["uid"]."')";
        $connection->query($query);
    }


    header("location:Homepage.php");
} else {
    echo "Form data not properly submitted.";
}
?>
