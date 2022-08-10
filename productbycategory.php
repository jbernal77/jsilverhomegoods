<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Mon Aug 08 2022
*  File : productbycategory.php
******************************************* -->

<?php
// The amounts of products to show on each page
$num_products_on_each_page = 12;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered Product Price
$stmt = $pdo->prepare('SELECT * FROM ProductsNew WHERE productCategory=? ORDER BY productPrice DESC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$stmt->bindValue(1, $_GET['category']);
$stmt->bindValue(2, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(3, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM ProductsNew')->rowCount();
?>

<?= template_header('ProductByCategory') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="description" content="JSilverHomegoods Product By Categories Page">
<meta name="keywords" content="JSilverHomegoods Crafts Categories Products Sorted">
<?= template_navbar('ProductByCategory') ?>


<div class="products content-wrapper">
    <h1> <?= strtoupper($_GET['category'])?></h1>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
            <a href="index.php?page=product&productID=<?= $product['productID'] ?>" class="product">
                <img src="/images/<?= $product['productIMG'] ?>" width="200" height="200" alt="<?= $product['productName'] ?>">
                <span class="name"><?= $product['productShortDesc'] ?></span>
                <span class="price">
                    &dollar;<?= $product['productPrice'] ?>
                </span>
            </a>
        <?php endforeach;?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1) : ?>
            <a href="index.php?page=products&p=<?= $current_page - 1 ?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)) : ?>
            <a href="index.php?page=products&p=<?= $current_page + 1 ?>">Next</a>
        <?php endif; ?>
    </div>


</div>

<?=template_footer('ProductByCategory')?>