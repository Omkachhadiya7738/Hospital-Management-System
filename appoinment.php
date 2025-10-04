<?php
// Include PHPMailer files at the top
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ensure these paths are correct relative to where this file is run
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

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

// Define the SMTP credentials. Replace with your actual credentials.
// For security, you should store these in a separate, non-public file.
$smtp_email = 'omrajkachhadiya@gmail.com'; 
$smtp_password = 'fmfuoqevjgaevoqb'; 

if (isset($_POST["submit"])) {
    // Collect and sanitize user input
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $mobile = mysqli_real_escape_string($conn, $_POST["number"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $state = mysqli_real_escape_string($conn, $_POST["City"]);
    $pin = mysqli_real_escape_string($conn, $_POST["pin"]);
    $doctor = mysqli_real_escape_string($conn, $_POST["doctor"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);

    // Use a prepared statement to prevent SQL injection
    $ins = "INSERT INTO drappoinment(name, number, email, date, state, pin, drname, time) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $ins);
    
    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssssssss", $name, $mobile, $email, $date, $state, $pin, $doctor, $time);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Appointment successfully saved to the database. Now, send the email.
            $mail = new PHPMailer(true);

            try {
                // Server settings for PHPMailer
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = $smtp_email;
                $mail->Password   = $smtp_password;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                // Recipients
                $mail->setFrom($smtp_email, 'Patel Hospital');
                $mail->addAddress($email, $name); // Add recipient (the patient)

                // Content of the email
                $mail->isHTML(true);
                $mail->Subject = 'Your Appointment with Patel Hospital is Confirmed!';
                $mail->Body    = "
                    <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ccc; border-radius: 8px; max-width: 600px; margin: auto;'>
                        <h2 style='color: #48d1cc;'>Dear $name,</h2>
                        <p>Your appointment has been successfully booked with <strong>Patel Hospital</strong>. We look forward to seeing you!</p>
                        <hr style='border: 0; border-top: 1px solid #eee; margin: 20px 0;'>
                        <h3 style='color: #48d1cc; font-size: 1.1em;'>Appointment Details:</h3>
                        <ul style='list-style-type: none; padding: 0;'>
                            <li style='margin-bottom: 8px;'><strong>Doctor:</strong> $doctor</li>
                            <li style='margin-bottom: 8px;'><strong>Date:</strong> $date</li>
                            <li style='margin-bottom: 8px;'><strong>Time:</strong> $time</li>
                            <li style='margin-bottom: 8px;'><strong>Location:</strong> $state (Pin: $pin)</li>
                        </ul>
                        <p>Please arrive 15 minutes prior to your scheduled time. If you need to reschedule, please contact us at +91 8128140835.</p>
                        <p style='text-align: center; margin-top: 30px; font-size: 0.9em; color: #888;'>Thank you for choosing Patel Hospital.</p>
                    </div>
                ";
                $mail->AltBody = "Your appointment has been successfully booked with Dr. $doctor on $date at $time. Thank you for choosing Patel Hospital.";

                $mail->send();
                // Redirect on success
                header("Location: index.php?status=success");
                exit();

            } catch (Exception $e) {
                // Log the error for debugging purposes but show the user a partial success message
                error_log("Mailer Error: {$mail->ErrorInfo}");
                header("Location: index.php?status=success_no_email");
                exit();
            }

        } else {
            // Error inserting into the database
            echo "<script>alert('Error submitting appointment: " . mysqli_error($conn) . "');</script>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
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
        .alert-custom {
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?php
// Display status message if redirected from a successful booking attempt
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'success') {
        echo '<div class="container mt-3">
            <div class="alert alert-success alert-custom" role="alert">
                <strong>Success!</strong> Your appointment has been successfully booked. A confirmation email has been sent.
            </div>
        </div>';
    } elseif ($status == 'success_no_email') {
        echo '<div class="container mt-3">
            <div class="alert alert-warning alert-custom" role="alert">
                <strong>Warning!</strong> Your appointment was booked successfully, but we could not send the confirmation email. Please check your details.
            </div>
        </div>';
    }
}
?>

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
                                    <input id="dat" type="date" name="date" placeholder="Appointment Date" class="form-control" required>
                                </div>
                                <div class="row form-row">
                                    <div class="col-sm-6">
                                           <select name="City" class="form-control" required>
                                                <option value="">Select a City</option>
                                                <option value="Ahmedabad">Ahmedabad</option>
                                                <option value="Surat">Surat</option>
                                                <option value="Vadodara">Vadodara</option>
                                                <option value="Rajkot">Rajkot</option>
                                                <option value="Bhavnagar">Bhavnagar</option>
                                                <option value="Jamnagar">Jamnagar</option>
                                                <option value="Gandhinagar">Gandhinagar</option>
                                                <option value="Junagadh">Junagadh</option>
                                                <option value="Anand">Anand</option>
                                                <option value="Navsari">Navsari</option>
                                                <option value="Morbi">Morbi</option>
                                                <option value="Bharuch">Bharuch</option>
                                                <option value="Surendranagar">Surendranagar</option>
                                                <option value="Gandhidham">Gandhidham</option>
                                                <option value="Porbandar">Porbandar</option>
                                                <option value="Amreli">Amreli</option>
                                                <option value="Bhuj">Bhuj</option>
                                                <option value="Vapi">Vapi</option>
                                                <option value="Godhra">Godhra</option>
                                                <option value="Patan">Patan</option>
                                                <option value="Mehsana">Mehsana</option>
                                                <option value="Palitana">Palitana</option>
                                                <option value="Veraval">Veraval</option>
                                                <option value="Wankaner">Wankaner</option>
                                            </select>
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