<!DOCTYPE html>
<html>
<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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

body {
  font-family: Arial, Helvetica, sans-serif;
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
  height: 60px;
  transition: margin-left .5s;
  padding: 16px;
  background-color: #f8f9fa;
  margin-bottom:20px;
}

table{
    width:900px;
    margin-left:8%;
    margin-top:4%;
    text-align:center;
}

th{
  border: 3px solid gray;
  background-color: black;
  color:white;
}

td{
  border: 3px solid gray;
}

.pagination {
  display: inline-block;
  margin-top: 50px;
  margin-left: 450px;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a:hover:not(.active) {
          background-color: #ebfaf9;
}

</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <img src="../../images/image.png" width="70px" height="70px" class="brand-image img-circle elevation-3" style="margin-top:-40px;margin-left:20px;">
  <p style="font-size:25px;margin-top:-70px;margin-left:120px;">Patel Hospital</p>
  <br>
  <a href="admin patient.php">Patiant</a>
  <a href="admin doctor.php">Doctor</a>
  <a href="admin gallery.php">Gallery</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer;" onclick="toggleNav()">&#9776;</span>
  <a href="admin inde.php" style="margin-left:30px;margin-top:px;font-size:30px;color:black;">Home</a>
  <span style="font-size:28px;color:black;display: flex;justify-content: flex-end;margin-top:-45px;">
    <a href="admin logout.php" style="color:black;margin-right:50px;">Logout</a>
  </span>
  <br><br>
  <h1 style="margin-left: 50px;">Appointment Details</h1>
  <?php
      include("conn.php");

      $sql = "SELECT * FROM drappoinment";
      $result = mysqli_query($conn,$sql) or die("Query Error");

      if(mysqli_num_rows($result) > 0)
      {
       
?>
  <table cellpadding="7px">
        <tr> 
            <th>ID</th>
            <th>Name</th>
            <th>Number</th>
            <th>Date</th>
            <th>State</th>
            <th>Pin</th>
            <th>Dr.Name</th>
            <th>Time</th>
            <th>Emali</th>
            <th>Action</th>
        </tr>
        <?php
              while($row = mysqli_fetch_assoc($result))
              {
          ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['number'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['state'] ?></td>
            <td><?php echo $row['pin'] ?></td>
            <td><?php echo $row['drname'] ?></td>
            <td><?php echo $row['time'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td>
          <a href="admin doctor delete.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php
      }
    }
?>
</table>
<footer class="main-footer" style="bottom:0;width:1300px;">
    <strong>Copyright &copy; 2024-2025 <a href="/Hospital Website/">Patel Hospital</a>.</strong>
    All rights reserved.
  </footer>
</div>

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
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

document.addEventListener('DOMContentLoaded', (event) => {
  if (isNavOpen) {
    openNav();
  }
});
</script>

</body>
</html>