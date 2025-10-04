<html>
<head>
    <title>Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

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


<div class="form">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Contact</h2> <br>
                    <form class="row" action="contectinsert.php" method="POST" name="forms" onsubmit="return om()">
                        <div class="col-lg-11 col-sm-12">
                            Enter Name<br> 
                            <input type="text" name="name" placeholder="Please enter your name..." id="o1" class="form-control" style="background-color:aliceblue;"/>
                            <p id="message" style="color:red;margin-top: -1px;font-size: 12px;"></p>
                        </div>
                        <div class="col-lg-11 col-sm-12">
                            Enter Address<br> 
                            <input type="text" name="address" placeholder="Please enter your address..." id="o3" class="form-control" style="background-color:aliceblue;"/>
                            <p id="om" style="color:red;margin-top: -1px;font-size: 12px;"></p>
                        </div>
                        <div class="col-lg-11 col-sm-12">
                            Enter Mobile Number<br>
                            <input type="text" name="number" placeholder="+91" id="o2" class="form-control" style="background-color:aliceblue;">
                            <p id="viraj" style="margin-right: 68px;color:red;margin-top: -1px;font-size: 12px;"></p>
                        </div>
                        <div class="col-lg-11 col-sm-12">
                            Enter Message<br>
                            <textarea name="message" class="form-control" id="o4" style="height:100px;background-color:aliceblue;"></textarea>
                        </div>
                        <div class="col-lg-11 col-sm-12">   
                            <input type="submit" value="Send" class="btn btn-primary" style="margin-top:20px;"/>
                            <input type="reset" value="Reset" class="btn btn-primary" onclick="clearMessages()" style="margin-top:20px;"/>
                        </div>
                    </form>
                </div>

    <!-- MAP SECTION START -->
                <div class="col">
                    <div class="col-lg-12 mb-5">
                        <h2>Map</h2> <br><br>  
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3100.064911245374!2d70.7649838243773!3d22.30675419266327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c983ae49a5d9%3A0x6ec42199c0552471!2sSterling%20Hospitals%20-%20Rajkot!5e1!3m2!1sen!2sin!4v1754652334982!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MAP SECTION END -->

<!-- FORM SECTION END -->
</body>
</html>