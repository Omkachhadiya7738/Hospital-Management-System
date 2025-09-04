<?php
include("conn.php");

if(isset($_POST['submit'])){
    $id = $_POST["ID"];  
    $medicine = $_POST["medicine"];
    $date = $_POST["date"];
    $item = $_POST["item"];
    $price = $_POST["price"];

    $sql = "UPDATE medicine SET medicine = '{$medicine}', date = '{$date}',item = '{$item}', price = '{$price}' WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: http://localhost/Hospital Website/logins/patient/patiant medicine.php");
        exit();  
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }

    $conn->close();
}
?>
