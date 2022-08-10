<!-- ******************************************
*  Author : Payton McCormick, Jonathan Bernal, Adam Mazur, Sajen Vasuthevan
*  Created On : Fri Jul 08 2022
*  File : categories.php
******************************************* -->

<?=template_header('Categories')?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="description" content="JSilverHomegoods Categories Page">   
    <meta name="keywords" content="JSilverHomegoods Crafts Categories Products">
	<?=template_navbar('Categories')?>

    
    <div id = "containerRows" class = "container">
      <h1 class="text-center">Categories</h1>
        <!--Row 1-->
        <div class = "row justify-content-between">   
                <!-- Bead Art-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center">Bead Art</h5>
                        <p class="card-text">Pixel Art created with beads!</p>
                        <a href="categoryPage.php?category=beadArt" class="btn btn-primary">Bead Art</a>
                    </div>
                </div>
                
                <!--Cards-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Cards</h5>
                        <p class="card-text">Custom made cards</p>
                        <a href="categoryPage.php?category=cards" class="btn btn-primary">Cards</a>
                    </div>
                </div>
                
                <!--Coozies-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Beer Coozies</h5>
                        <p class="card-text">Keep your beers cool and in style with these coozies!</p>
                        <a href="categoryPage.php?category=coozies" class="btn btn-primary">Beer Coozies</a>
                    </div>
                </div>
          </div>
        <!--End of Row 1-->
      
      	<!--Row 2-->
        <div class = "row justify-content-between">
               	
                <!--Cups-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Cups</h5>
                        <p class="card-text">Personalized cups for any drink!</p>
                        <a href="categoryPage.php?category=cups" class="btn btn-primary">Cups</a>
                    </div>
                </div>
          
            <!--Decorations-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card-title">Decorations</h5>
                    <p class="card-text">Looking for something to add to your house decor? Look here!</p>
                    <a href="categoryPage.php?category=decorations" class="btn btn-primary">Decorations</a>
                    </div>
                </div>
            
            <!--Resin-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Resin</h5>
                        <p class="card-text">Coasters, Dog Tags, and more! Stickers included.</p>
                        <a href="categoryPage.php?category=resin" class="btn btn-primary">Resin</a>
                    </div>
                </div>    
          
          </div>
        <!--End of Row 2-->
      
      	<!--Row 3-->
        <div class = "row justify-content-between">
        
            <!--Shirts-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title">Shirts</h4>
                        <p class="card-text">Get your custom T-Shirt made here!</p>
                        <a href="categoryPage.php?category=shirts" class="btn btn-primary">Shirts</a>
                    </div>
                </div>
            
            <!--Signs-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title">Signs</h5>
                        <p class="card-text">Perfect for indoors or outdoors!</p>
                        <a href="categoryPage.php?category=signs" class="btn btn-primary">Signs</a>
                    </div>
                </div>
        
            <!--Stickers-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card-title">Stickers</h5>
                    <p class="card-text">These permanent vinyl stickers are easy to apply!</p>
                    <a href="categoryPage.php?category=stickers" class="btn btn-primary">Stickers</a>
                    </div>
                </div>
          
          </div>
        <!--End of Row 3-->
      
      	<div class="row mb-2 justify-content-center">
                
            <!--Towels-->
                <div class="card m-1" style="width: 20rem;">
                    <div class="card-body">
                    <h5 class="card-title">Towels</h5>
                    <p class="card-text">Get your custom bath or kitchen towel made!</p>
                    <a href="categoryPage.php?category=towels" class="btn btn-primary">Towels</a>
                    </div>
                </div>   
      </div>
        
    </div>

    <?=template_footer()?>

</body>
</html>