<?php include("path.php"); ?>

<?php include(ROOT_PATH . "/app/controllers/users.php"); 

guestsOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!--custome css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesone-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!--Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal|Lora">
</head>
<body>
    <!--navigation bar-->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
       <!--//navigation bar-->

 
    <!--PAGE WRAPPER-->
    <div class="page-wrapper">

        <div class="auth-content">

            <form action="register.php" method="post">
                <h2 class="form-title">Register</h2>
           
                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                   
                <div>
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
                </div>

                <div>
                    <label>Password Confirm</label>
                    <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
                </div>
                
                <div>
                    <button type="submit" name="register-btn" class="btn btn-big">Register</button>
                </div>
                <p>Or &nbsp; <a href = "<?php echo BASE_URL . '/login.php' ?>">Sign In</a></p>
            </form>
        </div>

    </div>
<!--// page wrapper-->


    <!--footer-->
    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    
        <!--// footer-->
   
<!--JQUERY-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--slick carousel-->
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--CUSTOM SCRIPT-->
<script src="assets/js/scripts.js"></script>
</body>
</html>