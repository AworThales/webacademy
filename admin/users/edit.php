<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php"); 

adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Edit User</title>
    
    <!--custome css-->
    <link rel="stylesheet" href="../../assets/css/style.css">

     <!--admin css-->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <!-- Font Awesone-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!--Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Candal|Lora">
</head>
<body>
    <!--navigation bar-->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
   
    <!-- admin PAGE WRAPPER-->
    <div class="admin-wrapper">

          <!-- left-side bar-->
     <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>  



           <!-- //left-side bar-->

              <!-- admin content-->
              <div class="admin-content">
                  <div class="button-group">
                      <a href="create.php" class="btn btn-big">Add User</a>
                      <a href="index.php" class="btn btn-big">Manage Users</a>
                  </div>

                  <div class="content">
                      <h2 class="page-title">Edit Users</h2>

                      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
                      
                    <form action="edit.php" method="post">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        
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

                            <?php if (isset($admin) && $admin == 1): ?>
                                <label>
                                    <input type="checkbox" name="admin" checked>
                                    Admin
                                </label>
                            <?php else: ?>
                                <label>
                                    <input type="checkbox" name="admin">
                                    Admin
                                </label>
                            <?php endif; ?>

                        </div>
                
                        <div>
                            <button type="submit" name="update-user" class="btn btn-big">Update User</button>
                        </div>
                    </form>
                
                  </div>

              </div>

              <!-- //admin content-->
              


        

    </div>
<!--// admin page wrapper-->


    
<!--JQUERY-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--slick carousel-->
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--CUSTOM SCRIPT-->
<script src="../../assets/js/scripts.js"></script>
</body>
</html>