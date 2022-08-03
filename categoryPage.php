<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Thu Jul 28 2022
*  File : categoryPage.html
******************************************* -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Payton McCormick">
    <meta name="description" content="">
    <!--TODO: Fill me in-->
    <meta name="keywords" content=""> <!-- TODO: Fill me in-->

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--JS-->
    <script src=""></script>
  
  <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous">
    </script>


    <title>Category Page</title>
    <!--TODO Change based on category -->
</head>

<body class="container-fluid">

    <!--NavBar-->
    <nav class = "navbar navbar-expand-lg bg-dark navbar-dark">
        <div class = "container">
            <a href = "index.html" class = "navbar-brand" id = "headingPage">JSilver Home Goods</a>
            
            <button 
            class = "navbar-toggler"
            type = "button" 
            data-bs-toggle = "collapse" 
            data-bs-target = "#rightMenu">
            <span class = "navbar-toggler-icon"></span>
            </button>            
        
            <div class = "collapse navbar-collapse" id = "rightMenu">
                <ul class="nav navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shopping Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="h1 text-center m-3">
        <?php

        $servername = "localhost";
        $username = "bernal_finalProjectDatabase";
        $password = "jsilverhomegoods";
        $dbname = "bernal_finalProjectDatabase";

        $header = $_GET['category'];
        $headerUpper = strtoupper($header);
        echo $headerUpper;

        $conn = new mysqli($servername,$username,$password,$dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `ProductsNew` WHERE productCategory = '$header'";
        $result = $conn->query($sql);

        ?>
    </div>
    <br>

    <!--PRODUCTS-->
  <div id="containerRows" class="container">
    <div class="row">
      
      		<?php
      
      			 while($row = $result->fetch_assoc()){
            		echo '<div class="card m-1" style="width: 20rem;">
                    		<div class="card-body">
                    	  	<h5 class="card-title">' .$row["productTitle"] .'</h5>
                            <a href="productTemplate.php?product=' .$row["productName"].'" 
                            class="btn btn-primary">' .$row["productTitle"].' </a>
                            </div></div>';

                    
       			 }
      		?>
      			
        
    </div>
  </div>
    <!-- END OF PRODUCTS-->
    



</body>

</html>