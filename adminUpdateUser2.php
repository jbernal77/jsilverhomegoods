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
$fname = $_SESSION["adfname"]; 
$lname = $_SESSION["adlname"]; 
$email = $_SESSION["ademail"]; 
$telephone = $_SESSION["adtelephone"]; 
$uname = $_SESSION["uname"];
$fname_error = $telephone_error = $email_error = $lname_error = $username_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // Validate first name
       if(empty(trim($_POST["fname"]))){
         $fname_error = "Please enter a first name.";     
     } else{
         $fname = trim($_POST["fname"]);
     }
    // Validate last name
       if(empty(trim($_POST["lname"]))){
         $lname_error = "Please enter a last name.";     
     } else{
         $lname = trim($_POST["lname"]);
     }
   // Validate email
       if(empty(trim($_POST["email"]))){
         $email_error = "Please enter an e-mail.";     
     } else{
         $email = trim($_POST["email"]);
     }     
   // Validate telephone
       if(empty(trim($_POST["telephone"]))){
         $telephone_error = "Please enter a first name.";     
     } else{
         $telephone = trim($_POST["telephone"]);
     }     
    // Check input errors before updating database
    if(empty($fname_error)&& empty($lname_error)&& empty($telephone_error)&& empty($email_error)){
        // Prepare an update statement
        $sql = "UPDATE Users 
                SET firstName='$fname', lastName='$lname', email='$email', telephone='$telephone' 
                WHERE userName = '$uname'";
         
        if(mysqli_query($link, $sql)){
          echo "SUCCESS: Details Updated!";
            // Attempt to execute the prepared statement
         } else{
             echo "Oops! Something went wrong with post. Please try again later.";
          }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JSilver Homegoods Sign Up</title>
    <!--Using bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div id ="secondform" class="wrapper" style="display:block">
        <h2>Confirm Details to Update</h2>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control <?php echo (!empty($fname_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                <span class="invalid-feedback"><?php echo $fname_error; ?></span>
            </div>          
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control <?php echo (!empty($lname_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
                <span class="invalid-feedback"><?php echo $lname_error; ?></span>
            </div>
            <div class="form-group">
                <label>E-Mail</label>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_error; ?></span>
            </div>            
            <div class="form-group">
                <label>Telephone</label>
                <input type="tel" name="telephone" class="form-control <?php echo (!empty($telephone_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $telephone; ?>">
                <span class="invalid-feedback"><?php echo $telephone_error; ?></span>
            </div>                           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>         
        </form>
    </div>  
</body>
</html>