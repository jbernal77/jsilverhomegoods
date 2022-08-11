<?php
   session_start();
   require_once "config.php";
?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
    
    <a class="navbar-brand ml-5" href="./adminpanel.php">
        <img src="/images/house-icon.jpg" width="80" height="80" alt="House Logo">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <a href="./adminsignout.php" style="text-decoration:none;">
           <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
        </a>
    </div>  
</nav>
