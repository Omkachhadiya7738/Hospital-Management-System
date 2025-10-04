<?php
include("conn.php");

if(isset($_POST['submit'])){
    $id = $_POST["ID"];  
    $treatment = $_POST["treatment"];
    $date = $_POST["date"];
    $price = $_POST["price"];

    $sql = "UPDATE patiant SET treatment = '{$treatment}', date = '{$date}', price = '{$price}' WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: http://localhost/Hospital Website/logins/patient/patient.php");
        exit();  
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }

    $conn->close();
}
?>
