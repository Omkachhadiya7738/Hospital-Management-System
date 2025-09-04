<?php
// Database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $mobile = $_POST["number"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $state = $_POST["state"];
    $pin = $_POST["pin"];
    $doctor = $_POST["doctor"];
    $time = $_POST["time"];

    // Use prepared statements to prevent SQL injection
    $ins = "INSERT INTO drappoinment(name, number, email, date, state, pin, drname, time) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $ins);
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssssssss", $name, $mobile, $email, $date, $state, $pin, $doctor, $time);
        
        if(mysqli_stmt_execute($stmt)){
            // Redirect after successful submission
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Error submitting appointment: " . mysqli_error($conn) . "');</script>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Error preparing statement: " . mysqli_error($conn) . "');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="home page.css">
    <title>Book An Appointment</title>
    <style>
        body {
            background-color: #f0f2f5;
        }
        .appointment-form-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .form-head h2 {
            color: #48d1cc;
            font-weight: 600;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-row input, .form-row select {
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .btn-success {
            background-color: #48d1cc;
            border-color: #48d1cc;
            font-weight: bold;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-success:hover {
            background-color: #3aa8a5;
            border-color: #3aa8a5;
        }
        h6 {
            color: #555;
            margin-top: 20px;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .content h1, .content h3 {
            color: #48d1cc;
            font-weight: 600;
        }
        .content h3 {
            font-size: 1.2rem;
            margin-top: 20px;
        }
        .nav-link{
                    transition: 0.5s;
        }
    </style>
</head>
<body>

<?php

include('header.php');

?>

    <div class="appointment-form-container">
        <div class="container">
            <div class="row no-margin align-items-center">
                <div class="col-sm-7">
                    <div class="content">
                        <h1>Book Your Slot Now and Save Your Time</h1>
                        <h3>For Help Call: +91 8128140835</h3>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-data">
                        <div class="form-head">
                            <h2>Book Appointment</h2>
                        </div>
                        <form action="" method="POST">
                            <div class="form-body">
                                <div class="form-row">
                                    <input type="text" name="name" placeholder="Enter Full name" class="form-control" required>
                                </div>
                                <div class="form-row">
                                    <input type="tel" name="number" placeholder="Enter Mobile Number" class="form-control" required pattern="[0-9]{10}" title="Please enter a 10-digit mobile number">
                                </div>
                                <div class="form-row">
                                    <input type="email" name="email" placeholder="Enter Email Address" class="form-control" required>
                                </div>
                                <div class="form-row">
                                    <input id="dat" type="text" name="date" placeholder="Appointment Date" class="form-control" required>
                                </div>
                                <div class="row form-row">
                                    <div class="col-sm-6">
                                        <input type="text" name="state" placeholder="Enter State" class="form-control" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="pin" placeholder="Pin Code" class="form-control" required pattern="[0-9]{6}" title="Please enter a 6-digit pin code">
                                    </div>
                                </div>
                                <h6>Doctor Appointment</h6>
                                <div class="row form-row">
                                    <div class="col-sm-6">
                                        <select name="doctor" id="doctorName" class="form-control" required>
                                        <option value="">--Select Doctor--</option>
                                        <?php
                                        // Fetch doctor names from the 'doctors' table
                                        $query = "SELECT name FROM doctor";
                                        $result = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($result) > 0)
                                        {
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                        ?>
                                        <option value="<?php echo htmlspecialchars($row["name"]); ?>"><?php echo htmlspecialchars($row["name"]); ?></option>
                                        <?php 
                                        }}
                                        ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="time" class="form-control" required>
                                            <option value="">Select Time</option>
                                            <option value="1:30 PM">1:30 PM</option>
                                            <option value="1:45 PM">1:45 PM</option>
                                            <option value="2:00 PM">2:00 PM</option>
                                            <option value="2:15 PM">2:15 PM</option>
                                            <option value="2:30 PM">2:30 PM</option>
                                            <option value="2:45 PM">2:45 PM</option>
                                            <option value="3:00 PM">3:00 PM</option>
                                            <option value="3:15 PM">3:15 PM</option>
                                            <option value="3:30 PM">3:30 PM</option>
                                            <option value="3:45 PM">3:45 PM</option>
                                            <option value="4:00 PM">4:00 PM</option>
                                            <option value="4:15 PM">4:15 PM</option>
                                            <option value="4:30 PM">4:30 PM</option>
                                            <option value="4:45 PM">4:45 PM</option>
                                            <option value="5:00 PM">5:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <button class="btn btn-success" type="submit" name="submit">
                                        Book Appointment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#dat").datepicker({
                format: 'yyyy-mm-dd' // Set the date format
            });
        })
    </script>
</body>
</html>