<html>
<head>
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="home page.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">


        <script>
                function send(){
                    alert("Data insert Successfuly");
                }
        </script>
   <style>
               .sticky { 
                        position: fixed; 
                        bottom : 10px;
                        right : 10px;
                } 
                .card1{
                transition: 0.5s;
                border-radius: 10px;
               }    
               .card1:hover{
                        transform: scale(0.9);
               }
    </style>
     
    </head>
    <body>

    <?php

        include('header.php');

    ?>

<!-- GALLERY SECTION START -->

<div class="container">
        <div class="row">
            <h2 class="text-center mb-5 mt-5">Our Gallery</h2>
                <?php
                        include("conn.php");
                                
                        $sql = "SELECT img_source FROM image";
                        $result = mysqli_query($conn,$sql) or die("Query Error");
                                
                        if(mysqli_num_rows($result) > 0)
                        {
                                while($row = mysqli_fetch_assoc($result))
                                { 
                                        echo " <div class='col-12 col-lg-4 col-md-5 mx-auto d-block mb-5' style=''>
                                        <img src='logins/admin/".$row['img_source']."' width='370px' height='368px' class='card1'>
                                        </div>";
                                }
                        }
                ?>
        </div>
</div>

<?php

include('footer.php');

?>

</body>
</html>