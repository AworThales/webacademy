<?php include("../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 

adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Dashboard</title>
    
    <!--custome css-->
    <link rel="stylesheet" href="../assets/css/style.css">

     <!--admin css-->
    <link rel="stylesheet" href="../assets/css/admin.css">
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
                  

                  <div class="content">
                      <h2 class="page-title">Dashboard</h2>

                      <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                  
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
<script src="../assets/js/scripts.js"></script>
</body>
</html>