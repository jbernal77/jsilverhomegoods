<?php
// Check if the user is logged in, if not then redirect him to admin login page
if( $_SESSION["adminloggedin"] === FALSE){
    header("location: https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/adminlogin.php");
    exit;
}
?>

<?php
// Include function file with database info
include "adminheader.php";
require_once "config.php";


// Define variables and initialize with empty values
$uname =$username = $password = $confirm_password = $fname = $lname = $telephone = $email = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username for search
    if(empty(trim($_POST["uname"]))){
     $uname_error = "Please enter a username to search.";     
    } else{
       $uname = trim($_POST["uname"]);
       // Prepare a select statement to search username
       $sql = "SELECT userName, firstName, lastName, email, telephone 
               FROM Users WHERE userName = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Join variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_uname);
            // Set parameters
            $param_uname = $uname;
            $_SESSION["uname"] = $uname;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
               // store result
               mysqli_stmt_store_result($stmt);
              //check if there was a result 
              if(mysqli_stmt_num_rows($stmt) == 1){
              	//bind variables
                mysqli_stmt_bind_result($stmt, $username, $fname, $lname, $email, $telephone);
                    if(mysqli_stmt_fetch($stmt)){
                      $_SESSION["adusername"] = $username;
                      $_SESSION["adfname"] = $fname;
                      $_SESSION["adlname"] = $lname;
                      $_SESSION["ademail"] = $email;
                      $_SESSION["adtelephone"] = $telephone;
                      header("location: https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/adminUpdateUser2.php");
                     } else{
                       echo "Username does not exist. Please try again.";
                    }
                } else{
                echo "Oops! Something went wrong with search. Please try again later.";
              } 
            }
          
    // Close connection
    mysqli_close($link);
    }
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <!--Using bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div id ="firstform"  class="wrapper" style="display:block">
        <h2>Enter Username to Update</h2>
        <form name="username"action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="uname" class="form-control <?php echo (!empty($uname_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $uname; ?>">
                <span class="invalid-feedback"><?php echo $uname_error; ?></span>
            </div>          
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>         
        </form>
    </div>   
</body>
</html>