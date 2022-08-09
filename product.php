<?php
//for private and public function
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $cartdisplay = 'display:block';
}else{
  $cartdisplay = 'display:none';
}
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['productID'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM ProductsNew WHERE productID = ?');
    $stmt->execute([$_GET['productID']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<?=template_header('Product')?>
<?=template_navbar('Product')?>
<div class="product content-wrapper">
    <img src="/images/<?=$product['productIMG']?>" width="500" height="500" alt="<?=$product['productName']?>">
    <div>
        <h1 class="name"><?=$product['productShortDesc']?></h1>
        <span class="price">
            &dollar;<?=$product['productPrice']?>
        </span>
        <form style = <?=$cartdisplay?> action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['productStock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['productID']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['productLongDesc']?>
        </div>
    </div>
</div>

<?=template_footer()?>