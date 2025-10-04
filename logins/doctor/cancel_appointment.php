<?php
session_start();
include("../conn.php");

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// NOTE: Please ensure these paths are correct for your project structure
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';


// Redirect if the user is not a logged-in doctor
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

// SMTP credentials
// Use variables to avoid hardcoding credentials multiple times
$smtp_email = 'omrajkachhadiya@gmail.com'; 
$smtp_password = 'fmfuoqevjgaevoqb'; // Your app password

// Function to send an email notification using PHPMailer
function sendCancellationEmail($patientEmail, $doctorName, $conn) {
    global $smtp_email, $smtp_password;

    // Fetch patient's name for a personalized email
    $patientQuery = "SELECT name FROM drappoinment WHERE email = '{$patientEmail}' AND drname = '{$doctorName}'";
    $patientResult = mysqli_query($conn, $patientQuery);
    $patientName = '';
    if (mysqli_num_rows($patientResult) > 0) {
        $patientRow = mysqli_fetch_assoc($patientResult);
        $patientName = $patientRow['name'];
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings for GMAIL SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Correct host for Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_email;      // Your Gmail address
        $mail->Password   = $smtp_password;   // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;              // Correct port for STARTTLS

        //Recipients
        $mail->setFrom($smtp_email, 'Patel Hospital'); // Must use your own email here
        $mail->addAddress($patientEmail, $patientName);

        //Content
        $mail->isHTML(false);
        $mail->Subject = "Appointment Cancellation Notification";
        $mail->Body    = "Dear {$patientName},\n\n";
        $mail->Body   .= "Your appointment with Dr. {$doctorName} has been canceled.\n";
        $mail->Body   .= "If you wish to reschedule, please visit our website again.\n\n";
        $mail->Body   .= "Thank you,\n";
        $mail->Body   .= "Patel Hospital";

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log the error for debugging
        error_log("Email sending failed for {$patientEmail}. Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required data is present
    if (isset($_POST["patient_email"]) && isset($_POST["doctor_name"])) {
        // Sanitize inputs to prevent SQL injection
        $patientEmail = mysqli_real_escape_string($conn, $_POST["patient_email"]);
        $doctorName = mysqli_real_escape_string($conn, $_POST["doctor_name"]);

        // First, fetch the patient's data before deleting the record
        $appointmentQuery = "SELECT name, email FROM drappoinment WHERE email = '{$patientEmail}' AND drname = '{$doctorName}'";
        $appointmentResult = mysqli_query($conn, $appointmentQuery);
        $appointmentData = mysqli_fetch_assoc($appointmentResult);

        // Check if the appointment exists before attempting to delete and send email
        if ($appointmentData) {
            // SQL query to delete the specific appointment
            $deleteQuery = "DELETE FROM drappoinment WHERE email = '{$patientEmail}' AND drname = '{$doctorName}'";

            if (mysqli_query($conn, $deleteQuery)) {
                // Success: Appointment canceled from the database
                $_SESSION['message'] = "Appointment for {$patientEmail} has been successfully canceled.";

                // Send cancellation email to the patient
                if (sendCancellationEmail($patientEmail, $doctorName, $conn)) {
                    // Email sent successfully
                } else {
                    // You can check the web server's error log for details on the email failure
                    error_log("Failed to send cancellation email to: " . $patientEmail);
                }

                header("Location: appoinmentshow.php");
                exit();
            } else {
                // Error: Failed to cancel appointment
                $_SESSION['error'] = "Error canceling appointment: " . mysqli_error($conn);
                header("Location: appoinmentshow.php");
                exit();
            }
        } else {
            // Error: Appointment not found
            $_SESSION['error'] = "Appointment not found or already canceled.";
            header("Location: appoinmentshow.php");
            exit();
        }

    } else {
        // Error: Missing data in the form submission
        $_SESSION['error'] = "Invalid request. Missing data.";
        header("Location: appoinmentshow.php");
        exit();
    }
} else {
    // Error: Not a POST request
    header("Location: appoinmentshow.php");
    exit();
}
?>