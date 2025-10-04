<?php

    $stu_id = $_GET['id'];

    include("conn.php");

    $sql = "DELETE FROM image WHERE id = {$stu_id}";
    $result = mysqli_query($conn,$sql) or die("Query Error");

    header("location: http://localhost/Hospital Website/logins/admin/admin gallery.php");
       
    $conn -> close();
?>