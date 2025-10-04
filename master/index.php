<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Heartbeat Monitor Animation Example</title>
    <meta name="author" content="Codeconvey" />
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom Script for Redirection and Reload -->
    <script>
        $(document).ready(function(){
            // Wait for 3 seconds
            setTimeout(function(){
                // Redirect to homepage
                window.location.href = "http://localhost/Hospital%20Website/"; // Replace with your homepage URL
            }, 2000);
        });
    </script>
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="heart-rate">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="73px" viewBox="0 0 150 73" enable-background="new 0 0 150 73" xml:space="preserve">
            <polyline fill="none" stroke="#009B9E" stroke-width="3" stroke-miterlimit="10" points="0,45.486 38.514,45.486 44.595,33.324 50.676,45.486 57.771,45.486 62.838,55.622 71.959,9 80.067,63.729 84.122,45.486 97.297,45.486 103.379,40.419 110.473,45.486 150,45.486"/>
        </svg>
        <div class="fade-in"></div>
        <div class="fade-out"></div>
    </div>
    <!-- partial -->
</body>
</html>
