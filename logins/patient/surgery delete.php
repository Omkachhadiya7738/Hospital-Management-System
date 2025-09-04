<?php

    $stu_id = $_GET['id'];

    include("conn.php");

    $sql = "DELETE FROM surgery WHERE ID = {$stu_id}";
    $result = mysqli_query($conn,$sql) or die("Query Error");

    header("location: http://localhost/Hospital Website/logins/patient/patiant surgery.php");
        
    $conn -> close();
?>