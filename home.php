<?php
//on homepage it will show the first 4 products in alphabetical order
$stmt = $pdo->prepare('SELECT * FROM ProductsNew ORDER BY productTitle DESC LIMIT 4');
$stmt->execute();
//array contains the query results
$alphabetically_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Home')?>
<?=template_navbar('Home')?>

<div class="featured">
    <h2>JSilver HomeGoods</h2>
    <p>Essential homegoods for everyday use</p>
</div>
<div class="bestselling content-wrapper">
    <h2>Best Selling Products</h2>
    <div class="products">
        <?php foreach ($alphabetically_added_products as $product): ?>
        <a href="index.php?page=product&productID=<?=$product['productID']?>" class="product">
            <img src="/images/<?=$product['productIMG']?>" width="200" height="200" alt="<?=$product['productName']?>">
            <span class="name"><?=$product['productShortDesc']?></span>
            <span class="price">
                &dollar;<?=$product['productPrice']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>