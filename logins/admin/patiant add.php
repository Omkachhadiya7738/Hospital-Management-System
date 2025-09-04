<html>
<head>
<link rel="stylesheet" type="text/css" href="home page.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
                body{
                    background-color:#ebfaf9;
                }
        </style>
</head>
<body>

<!-- FORM SECTION START -->                 
<script type="text/javascript">
        function om() {
            var isValid = true;

            // Helper function to display error messages
            function displayError(elementId, message) {
                document.getElementById(elementId).innerHTML = message;
                isValid = false;
            }

            // Reset error messages
            var errorElements = ["message","om","viraj"];
            errorElements.forEach(function(id) {
                document.getElementById(id).innerHTML = "";
            });
            
            var x = document.getElementById("o1").value;
            var y = document.getElementById("o3").value;
            var z = document.getElementById("o2").value;
            
            if (x == "") {
                displayError("message", "* Please fill in the username");
            }
            if (x.length > 30) {
                displayError("message", "* Username must be less than 30 characters");
            }
            if (y == "") {
                displayError("om", "* Please fill in the address");
            }
            if (z == "") {
                displayError("viraj", "* Please fill in the number");
            }
            if (z.length > 10) {
                displayError("viraj", "* Only 10 digits are allowed");
            }
    
            return isValid; // If all validations pass, allow form submission
        }

        function clearMessages() {
            var errorElements = ["message", "om", "viraj", "dhyey"];
            errorElements.forEach(function(id) {
                document.getElementById(id).innerHTML = "";
            });
        }
    </script>


<div class="form ">
        <div class="container" style="margin-top:07%;margin-left:230px;">
            <div class="row justify-content-lg-center">
                <div class="col-6">
                    <h2>Patiant Details</h2> <br>
                    <form class="row" action="patiant add connect.php" method="POST" name="forms" onsubmit="return om()">
                        <div class="col-lg-8 col-sm-12">
                            Enter Name<br> 
                            <input type="text" name="name" placeholder="Please enter your name..." id="o1" class="form-control" style="background-color:aliceblue;"/>
                            <p id="message" style="color:red;margin-top: -1px;font-size: 12px;"></p>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            Enter Address<br> 
                            <input type="text" name="address" placeholder="Please enter your address..." id="o3" class="form-control" style="background-color:aliceblue;"/>
                            <p id="om" style="color:red;margin-top: -1px;font-size: 12px;"></p>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            Enter Mobile Number<br>
                            <input type="text" name="number" placeholder="+91" id="o2" class="form-control" style="background-color:aliceblue;">
                            <p id="viraj" style="margin-right: 68px;color:red;margin-top: -1px;font-size: 12px;"></p>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            Enter Message<br>
                            <textarea name="comment" class="form-control" id="o4" style="height:100px;background-color:aliceblue;"></textarea>
                        </div>
                        <div class="col-lg-8 col-sm-12">   
                            <a href="patient.php"><input type="submit" value="Send" class="btn btn-primary" style="margin-top:20px;"/></a>
                            <input type="reset" value="Reset" class="btn btn-primary" onclick="clearMessages()" style="margin-top:20px;"/>
                        </div>
                    </form>
                </div>
</body>
</html>
        