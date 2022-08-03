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
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>JSilver Shopping Cart</title>
		<link href="cart.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>COMP 3340 Final Project</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
                <div class="link-icons">
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
                <p>&copy; $year, Team 20 - Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan</p>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>

