<?php

function pdo_connect_mysql() {
    // added MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'bernal_finalProjectDatabase';
    $DATABASE_PASS = 'jsilverhomegoods';
    $DATABASE_NAME = 'bernal_finalProjectDatabase';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header
function template_header($title) {
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $user = 'Hi '.($_SESSION['username']);  
  $display = 'visibility:visible';
}else{
  $user = "";
  $display = 'visibility:hidden';
}
  
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="author" content="Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan">
		<title>JSilver Homegoods</title>
		<link href="cart.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <!--Following 7 tags are from Favicon for the tab icons-->
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
		<link rel="manifest" href="site.webmanifest">
		<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
EOT;
}


function template_navbar($title) {    

echo <<<EOT
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>COMP 3340 Final Project</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                    <a href="https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/login.php">Account</a>
                    <a href="index.php?page=logout">Sign Out</a>
                    <a href="">$user</a>
                  
                </nav>
                <div style = $display class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
					</a>
                </div>
            </div>
            
        </header>
        <main>
EOT;
}

// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Team 20 - Jonathan Bernal, Adam Mazur, Payton McCormick, Sajen Vasuthevan</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>