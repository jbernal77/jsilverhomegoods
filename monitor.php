<?=template_header('Monitor')?>
<div class="products content-wrapper">
<h1> JSilver Homegoods Monitor Page </h1>
<h2> SQL Database Monitor</h2>
<?php
    // Prepare statement and execute, prevents SQL injection
    $monitor = $pdo->prepare("SELECT * FROM ProductsNew WHERE productID = '1'");
    $monitor->execute();
    // Fetch the product from the database and return the result as an Array
    $test = $monitor->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$test) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        echo "The Product Database is not Working"."<br>";
    }else{
      echo "The Product Database is Working"."<br>";
    }

    // Prepare statement and execute, prevents SQL injection
    $monitor = $pdo->prepare("SELECT * FROM Users WHERE userID = '1'");
    $monitor->execute();
    // Fetch the product from the database and return the result as an Array
    $test = $monitor->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$test) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        echo "The User Database is not Working"."<br>";
    }else{
      echo "The User Database is Working"."<br>";
    }
?>
<h2> Website Status Monitor</h2>
<?php
$host = 'bernal.myweb.cs.uwindsor.ca';
if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
echo '<p> Site is online! </p>';
fclose($socket);
} else {
echo '<p> Site is offline! </p>';
}
  
  
?>
</div>




<?=template_footer()?>