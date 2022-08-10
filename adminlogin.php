<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to admin panel page
if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] === true){
    header("location: https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/admin.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$adminusername = $adminpassword = "";
$adminusername_error = $adminpassword_error = $adminlogin_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["adminusername"]))){
        $adminusername_error = "Please enter username.";
    } else{
        $adminusername = trim($_POST["adminusername"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["adminpassword"]))){
        $adminpassword_error = "Please enter your password.";
    } else{
        $adminpassword = trim($_POST["adminpassword"]);
    }
    
    // Validate credentials
    if(empty($adminusername_error) && empty($adminpassword_error)){
        // Prepare a select statement
        $sql = "SELECT adminID, adminName, adminPassword FROM Admin WHERE adminName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_adminusername);
            
            // Set parameters
            $param_adminusername = $adminusername;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $adminid, $adminusername, $checkadminpassword);
                    if(mysqli_stmt_fetch($stmt)){
                        if($adminpassword === $checkadminpassword){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["adminloggedin"] = true;
                            $_SESSION["adminid"] = $adminid;
                            $_SESSION["adminusername"] = $adminusername;                            
                            
                            // Redirect user to admin panel page
                            header("location:https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/admin.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $adminlogin_error = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $adminlogin_error = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($adminlogin_error)){
            echo '<div class="alert alert-danger">' . $adminlogin_error . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="adminusername" class="form-control <?php echo (!empty($adminusername_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $adminusername; ?>">
                <span class="invalid-feedback"><?php echo $adminusername_error; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="adminpassword" class="form-control <?php echo (!empty($adminpassword_error)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $adminpassword_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>
</html>