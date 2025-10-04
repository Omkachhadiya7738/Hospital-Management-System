<?php
session_start();

include("../conn.php");

// Check if the user is logged in and the email is set in the session.
// If not, redirect them to the login page for security.
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["email"];

// 1. Get the logged-in doctor's name from the 'doctor' table using their email.
$doctorQuery = "SELECT name FROM doctor WHERE email = '{$email}'";
$doctorResult = mysqli_query($conn, $doctorQuery);

$doctorName = '';
if (mysqli_num_rows($doctorResult) > 0) {
    $doctorRow = mysqli_fetch_assoc($doctorResult);
    $doctorName = $doctorRow['name'];
}

// 2. Use the retrieved doctor's name to fetch their appointments from the 'drappoinment' table.
$appointmentQuery = "SELECT name, number, date, time, email FROM drappoinment WHERE drname = '{$doctorName}'";
$appointmentResult = mysqli_query($conn, $appointmentQuery);

$appointmentCount = mysqli_num_rows($appointmentResult);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.m/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #ebfaf9;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
            text-decoration: underline;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            font-size: 36px;
            margin-left: 90px;
        }

        #main {
            height: 60px;
            transition: margin-left .5s;
            padding: 8px;
            background-color: #f8f9fa;
        }

        #main a {
            text-decoration: none;
        }

        #main a:hover {
            text-decoration: underline;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

        .flip-card {
            background-color: transparent;
            width: 200px;
            height: 200px;
            perspective: 1000px;
            margin-top: 40px;
            margin-left: 40px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .flip-card-front {
            background-color: #bbb;
            color: black;
        }

        .flip-card-back {
            background-color: #2980b9;
            color: white;
            transform: rotateY(180deg);
        }

        .main-footer {
            height: 50px;
            transition: margin-left .5s;
            padding: 16px;
            background-color: #f8f9fa;
        }
        table{
            width:90%;
            margin: 4% auto;
            text-align:center;
            border-collapse: collapse;
        }
        th, td {
            border: 3px solid gray;
            padding: 10px;
        }
        th{
            background-color: black;
            color:white;
        }
        #add{
            text-decoration: none;
            transition: 0.5s;
        }
        #add:hover{
            color:white;
        }
        .btn{
            transition: 0.5s;
            color:white;
        }
        #marq{
            width:1212px;
            margin-top:-45px;
            margin-left:25px;
            font-size:30px;
            color:blue;
        }
    </style>
</head>
<body>

<div id="mySidenav" class="sidenav">
    <img src="../../images/image.png" width="70px" height="70px" class="brand-image img-circle elevation-3" style="margin-top:-40px;margin-left:20px;">
    <p style="font-size:25px;margin-top:-70px;margin-left:120px;">Patel Hospital</p>
    <br>
    <span><a href="doctor.php">Home</a></span>
</div>

<div id="main">
    <div>
        <span style="font-size:30px;cursor:pointer;" onclick="toggleNav()">&#9776;</span>
    </div>

    <div>
        <span style="font-size:28px;color:black;display: flex;justify-content: flex-end;margin-top:-45px;margin-right:10px;">
            <a href="logout.php" style="color:black">Logout</a>
        </span>
    </div>
</div>
<div class="container" style="margin-left:240px;">
    <div class="row">
        <div class="lg-6">
            <?php if (!empty($doctorName)): ?>
                <h2 style="text-align:center; margin-top:20px;">Appointments for <?php echo htmlspecialchars($doctorName); ?></h2>
            <?php endif; ?>

            <?php if (mysqli_num_rows($appointmentResult) > 0): ?>
                <table cellpadding="7px">
                    <tr>
                        <th>Patient Name</th>
                        <th>Phone Number</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Patient Email</th>
                        <th>Action</th>
                    </tr>
                    <?php while($row = mysqli_fetch_assoc($appointmentResult)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['number']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['time']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td>
                                <form action="cancel_appointment.php" method="POST">
                                    <input type="hidden" name="patient_email" value="<?php echo htmlspecialchars($row['email']); ?>">
                                    <input type="hidden" name="doctor_name" value="<?php echo htmlspecialchars($doctorName); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cencel Appointment">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p style="text-align: center; margin-top: 50px;">No appointments found for you.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<footer class="main-footer" style="bottom:0;width:100%;position:fixed;">
    <strong>Copyright &copy; 2024-2025 <a href="/Hospital Website/">Patel Hospital</a>.</strong>
    All rights reserved.
</footer>

<script>
    let isNavOpen = localStorage.getItem('isNavOpen') === 'true';

    function toggleNav() {
        if (isNavOpen) {
            closeNav();
        } else {
            openNav();
        }
        isNavOpen = !isNavOpen;
        localStorage.setItem('isNavOpen', isNavOpen);
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.querySelector('.main-footer').style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.querySelector('.main-footer').style.marginLeft = "0";
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        if (isNavOpen) {
            openNav();
        }
    });
</script>
</body>
</html>