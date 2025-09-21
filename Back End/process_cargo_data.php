<?php
// connecting to localhost database
$database = "customer_database";
$server = "localhost";
$user_name = "root";
$password = "";
$connection = mysqli_connect($server, $user_name, $password);
if($connection )   echo'Connect successfully <br> ';
else	echo 'Could not connect: ' .mysqli_error();

$db_found  =  mysqli_select_db($connection, $database);
print "Connection to the Server opened...<br>";
if($db_found) print "Databse for customers found!<br>";
else print "No database found.<br>";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phonenumber = $_POST['mobile-no'];
$email = $_POST['email'];
$cargo_type = $_POST['cargo'];
$cargo_weight = $_POST['weight'];
$shipping_address = $_POST['address'];

$sql = "INSERT INTO cargo_data (firstname, lastname, phonenumber, email, cargo_type, cargo_weight, shipping_address) VALUES ('$firstname', '$lastname', '$phonenumber', '$email','$cargo_type', '$cargo_weight', '$shipping_address')";

mysqli_query($connection, $sql);
mysqli_close($connection);
?>
