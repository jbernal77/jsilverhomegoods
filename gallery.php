<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Wed Aug 10 2022
*  File : extralinks.php
******************************************* -->

<?= template_header('Gallery') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta name="description" content="JSilverHomegoods Gallery">
<meta name="keywords" content="JSilverHomegoods Gallery Pictures">
<?= template_navbar('Gallery') ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-4">
            <img src="images/marioLuigi.jpg" height="200" width="200">
        </div>

        <div class="col-4">
            <img src="images/walterPayton.jpg" height="200" width="200">
        </div>

        <div class="col-4">
            <img src="images/appa.jpg" height="200" width="200">
        </div>

    </div>

    <br>

    <div class="row">
        <div class="col-4">
            <img src="images/southpark.jpg" height="200" width="200">
        </div>

        <div class="col-4">
            <img src="images/grogu.jpg" height="200" width="200">
        </div>

        <div class="col-4">
            <img src="images/bears.jpg" height="200" width="200">
        </div>

    </div>
</div>

<?= template_footer('Gallery') ?>