<?php

$servername="localhost";
$username="root";
$password="";
$database="hospital";
$table="patiant_conntact";

$conn = new mysqli($servername,$username,$password,$database);

if($conn-> connect_error)
{
    die("Creating Error : " . $conn->connect_error);
}

$name = $_POST['name'];
$address = $_POST['address'];
$number = $_POST['number'];
$comment = $_POST['comment'];

$sql = "INSERT INTO patiant_contact(name,address,number,comment) VALUE('$name','$address','$number','$comment')";
if($conn -> query($sql) === TRUE)
{
   
}
else{
    echo"Error: ". $conn->error; 
}

header("location:Hospital Website/logins/patient/patient.php");

$conn -> close();
?>