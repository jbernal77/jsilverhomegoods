<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Sun Jul 24 2022
*  File : productTemplate.html
******************************************* -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan">
    <meta name="description" content="">
    <!--TODO: Fill me in-->
    <meta name="keywords" content=""> <!-- TODO: Fill me in-->

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="/style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="jsProduct.js"></script>

    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous">
    </script>


    <title>ProductTemplate</title>
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
  
  <?php

        $servername = "localhost";
        $username = "bernal_finalProjectDatabase";
        $password = "jsilverhomegoods";
        $dbname = "bernal_finalProjectDatabase";

        $header = $_GET['product'];
        $headerUpper = strtoupper($header);

        $conn = new mysqli($servername,$username,$password,$dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `ProductsNew` WHERE productName = '$header'";
        $result = $conn->query($sql);

        ?>

    
    <div class="row">
        <div class="col-7">
                <!--This is a temp container for product picture-->
              	<?php 
              		while($row = $result->fetch_assoc()){
              			echo "<img src='img\\".$row['productCategory'] . "\\".$row['productIMG']."' class='productPics'>
                        </div><div class='col-4 p-5'><div class='productInfo'>";
                      	echo "<h2 class='text-center'>".$row['productTitle']."</h2>";
                      	echo "<p>" . $row['productLongDesc'] . "</p>";
                    }
             
         
              	?>

                <button class="addCart btn btn-primary m-1">Add to Cart</button>

            </div>
        </div>
    </div>
</body>

</html>