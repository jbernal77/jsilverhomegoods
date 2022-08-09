<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 
   <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $user =Hi ($_SESSION['username']);  
  echo $user;
}else{
  echo "not logged in";
}
   ?>
 </body>
</html>