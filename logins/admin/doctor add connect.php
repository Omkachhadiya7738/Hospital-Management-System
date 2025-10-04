<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "hospital"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$address = $_POST['address'];
$specialization = $_POST['specialization'];
$password = $_POST['password'];

// Hash the password for security
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert data into the 'doctors' table
$sql = "INSERT INTO doctor (name, email, number, address, specialization, password) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters and execute
    $stmt->bind_param("ssssss", $name, $email, $number, $address, $specialization, $password);

    if ($stmt->execute()) {
        echo "New doctor added successfully!";
        header("location:admin doctor.php");
        
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$conn->close();
?>