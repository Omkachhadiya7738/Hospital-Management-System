<html>
<head>
    <title>Header</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .nav-link{
            transition: 0.5s;
        }
        .nav-link:hover{
	        background-color: #4567ed;
	        border-radius: 10px;
        }
        .nav-link{
	        border-radius: 10px;
        }
    </style>

</head>
<body>
<!-- NAVBAR SECTION START -->
     
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ebfaf9;">
        <div class="container-fluid">

                <a href="/Hospital Website/">
                <span><img src="images/logo3.jpg" width="90px" height="90px"></span>
                </a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" style="margin-left: 490px;">
                <span class="navbar-toggler-icon"></span>
                </button>   
        
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link" href="/Hospital Website/" style="margin-left:20px;color:black;font-size:18px;" onmouseover="this.style.color='white'" onmouseout="this.style.color='black'">Home</a>
                <a class="nav-link" href="<?php 
                                            $current_page = basename($_SERVER['PHP_SELF']);
                                            switch ($current_page) {
                                                case "cardiology.php":
                                                    echo "cardiologygallery.php";
                                                    break;
                                                case "orthopaedic.php":
                                                    echo "orthopaedicgallery.php";
                                                    break;
                                                case "neurologist.php":
                                                    echo "neurologistgallery.php";
                                                    break;
                                                case "pharma pipeline.php":
                                                    echo "pharma pipelinegallery.php";
                                                    break;
                                                case "Pharma Team.php":
                                                    echo "Pharma Teamgallery.php";
                                                    break;
                                                case "High Quality Treatment.php":
                                                    echo "High Quality Treatmentgallery.php";
                                                    break;
                                                default:
                                                    echo "../gallery.php";
                                            }  ?>" style="margin-left:20px;color:black;font-size:18px;" onmouseover="this.style.color='white'" onmouseout="this.style.color='black'">Gallery</a>
                <a class="nav-link" href="../appoinment.php" style="margin-left:20px;color:black;font-size:18px;" onmouseover="this.style.color='white'" onmouseout="this.style.color='black'">Book an Appointment</a>
                </div>
                </div>
                <a href="../logins/logins.php" class="btn btn-primary" style="width:170px;font-size:30px;text-align:center;">Login</a>
        </div>
        </nav>
<!-- NAVBAR SECTION END -->
</body>
</html>