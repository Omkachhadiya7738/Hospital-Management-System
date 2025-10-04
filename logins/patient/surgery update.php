<?php
include("conn.php");

if(isset($_POST['submit'])){
    $id = $_POST["ID"];  
    $surgery = $_POST["surgery"];
    $date = $_POST["date"];
    $price = $_POST["price"];

    $sql = "UPDATE surgery SET surgery = '{$surgery}', date = '{$date}', price = '{$price}' WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: http://localhost/Hospital Website/logins/patient/patiant surgery.php");
        exit();  
    } else {
        echo "Query Error: " . mysqli_error($conn);
    }

    $conn->close();
}
?>
