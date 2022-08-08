<?php
// Include function file with database info
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $fname = $lname = $telephone = $email = "";
$fname_error = $telephone_error = $email_error = $lname_error = $username_error = $password_error = $confirm_password_error = "";
 
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
    // Validate username to make sure it only contains valid characters
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_error = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userID FROM Users WHERE userName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Join variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_error = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong with username. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password.  Must have at least 8 characters
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_error = "Password must have at least 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_error = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_error) && empty($password_error) && empty($confirm_password_error)&& empty($fname_error)&& empty($lname_error)&& empty($telephone_error)&& empty($email_error)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO Users (userName, password, firstName, lastName, email, telephone) 
                VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            // Join variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_fname, $param_lname, $param_email, $param_telephone);
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_telephone = $telephone;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location:https://bernal.myweb.cs.uwindsor.ca/jsilverhomegoods/index.php");
            } else{
                echo "Oops! Something went wrong with post. Please try again later.";
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
    <title>JSilver Homegoods Sign Up</title>
    <!--Using bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
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
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_error; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>         
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>