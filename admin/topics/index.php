<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/topics.php");  

adminOnly();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Topics</title>
    
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
                      <a href="create.php" class="btn btn-big">Add Topic</a>
                      <a href="index.php" class="btn btn-big">Manage Topics</a>
                  </div>

                  <div class="content">
                      <h2 class="page-title">Manage Topics</h2>

                      <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

                      <table>

                          <thead>
                              <th>SN</th>
                              <th>Name</th>
                              <th colspan="2">Action</th>
                          </thead>

                          <tbody>
                              <?php foreach ($topics as $key => $topic):  ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $topic['name']; ?></td>
                                        <td><a href="edit.php?id=<?php echo $topic['id']; ?>" class="edit">edit</a></td>
                                        <td><a href="index.php?del_id=<?php echo $topic['id'];?>" class="delete">delete</a></td>
                                    </tr>

                              <?php endforeach; ?>
                             
                              

                          </tbody>

                      </table>
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