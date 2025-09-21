<html>
<body>
<?php
// connecting to localhost database
$database = "customer_database";
$server = "localhost";
$user_name = "root";
$password = "";
$connection = mysqli_connect($server, $user_name, $password);
	if($connection )   echo'Connect successfully <br> ';
	else	echo 'Could not connect: ' .mysqli_error();
	
//creating the database
$sql = 'CREATE database customer_database';
$retval = mysqli_query($connection,$sql);
if($retval)
	echo "Database Customer created successfully!<br>";
else echo('Could not create a customer database: <br>'.mysqli_error());

//confirming the existance of the database
$db_found  =  mysqli_select_db($connection, $database);
print "Connection to the Server opened...<br>";
if($db_found) print "Databse for customers found!<br>";
else print "No database found.<br>";

//creating a test table
$createtable = "CREATE TABLE test_table
(
id int(10) NOT NULL AUTO_INCREMENT primary key,
firstname varchar(20) not null,
lastname varchar(20) not null,
phone_number int(10) not null,
email varchar(20))";
mysqli_query($connection, $createtable);

//creating a customer info table
$createtablecustomer = "CREATE TABLE customer_info_data
(
customerid int(10) NOT NULL AUTO_INCREMENT primary key,
firstname varchar(20) not null,
lastname varchar(20) not null,
phone_number int(10) not null,
email varchar(20)
)";
mysqli_query($connection, $createtablecustomer);

//creating a booking info
$createtablebooking = "CREATE TABLE booking_data
(
bookingid int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
customerid int,
trip enum('return', 'one way'),
class enum('economy', 'business'),
departure_airport varchar(255),
departing_date date,
arrival_airport varchar(255),
returning_date date,
passengers int,
promotional_offer varchar(255),
FOREIGN KEY (customerid) REFERENCES customer_info_data(customerid)
)";
mysqli_query($connection, $createtablebooking);

//creating a cargo table info
$createtablecargo = "CREATE TABLE cargo_data (
    cargo_id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    phonenumber VARCHAR(10),
    email VARCHAR(255),
    cargo_type ENUM('fragile', 'mail', 'general'),
    cargo_weight decimal(10,2),
    shipping_address VARCHAR(255)
)";
mysqli_query($connection, $createtablecargo);

mysqli_close($connection);
?>
</body>
</html>
