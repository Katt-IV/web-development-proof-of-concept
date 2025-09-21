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

//customer info data insertion
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['mobile-no'];
//$email = $_POST['email'];

$sql = "INSERT INTO customer_info_data (firstname, lastname, phone_number) VALUES ('$firstname', '$lastname', '$phone')";

$db_data_sent = mysqli_query($connection, $sql);

if($db_data_sent) print "Customer info data sent to database!<br>";
else print "Failed to send customer info data.<br>";
//booking data insertion
$trip = $_POST['flight'];
$class = $_POST['seating'];
$departure_airport = $_POST['location'];
$departing_date = $_POST['departingdate'];
$arrival_airport = $_POST['destination'];
$returning_date = $_POST['returningdate'];
$passengers = $_POST['passengers'];
$promotional_offer = $_POST['promo'];

$sqlone = "INSERT INTO booking_data (trip, class, departure_airport, departing_date, arrival_airport, returning_date, passengers, promotional_offer) VALUES ('$trip', '$class', '$departure_airport', '$departing_date', '$arrival_airport', '$returning_date', '$passengers', '$promotional_offer')"; 
$db_data_booking_sent = mysqli_query($connection, $sqlone);

if($db_data_booking_sent) print "Booking info data sent to database!<br>";
else print "Failed to send booking info data.<br>";


mysqli_close($connection);


?>
