<?php
$host="localhost";$user="root";$password="";$dbname="test";
$conn=mysqli_connect($host,$user,$password,$dbname);
if(!$conn)die("could not connect".mysqli_connect_error());
$table="details";
$query="CREATE TABLE details(firstname text unique,PSWD varchar(20),confirmPSWD varchar(20),gender varchar(20),mobile_number int(10))";
if(mysqli_query($conn,$query))
echo "connected";
else
echo mysqli_error($conn);
mysqli_close($conn);
?>