<?php

    $stu_id = $_GET['id'];

    include("conn.php");

    $sql = "DELETE FROM drappoinment WHERE id = {$stu_id}";
    $result = mysqli_query($conn,$sql) or die("Query Error");

    header("location: http://localhost/my website/admin doctor.php");
       
    $conn -> close();
?>