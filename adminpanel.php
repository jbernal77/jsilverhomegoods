<?php
// Check if the user is logged in, if not then redirect him to admin login page
if( $_SESSION["adminloggedin"] === FALSE){
    header("location: https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/adminlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body >
    
 <?php
    
    include "adminheader.php";
    require_once "config.php";
 ?>
 
 <div >
   <button type="button"class="btn btn-primary" onClick="location.href='./adminAllCustomers.php'">View All Users</button>
   <button type="button"class="btn btn-primary" onClick="location.href='./adminAddCustomers.php'">Add Users</button>
   <button type="button"class="btn btn-primary" onClick="location.href='./emaillist.php'">Generate Email List</button>
   <button type="button"class="btn btn-primary" onClick="location.href='./adminUpdateUser.php'">Update User</button>
 </div>      
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
 
</html>