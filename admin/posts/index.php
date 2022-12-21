<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 

adminOnly();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Section - Manage Posts</title>
    
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
                      <a href="create.php" class="btn btn-big">Add Post</a>
                      <a href="index.php" class="btn btn-big">Manage Posts</a>
                  </div>

                  <div class="content">
                      <h2 class="page-title">Manage Posts</h2>
                      <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
                      <table>
                          <thead>
                              <th>SN</th>
                              <th>Title</th>
                              <th>Author</th>
                              <th colspan="3">Action</th>
                          </thead>
                          <tbody>

                            <?php foreach ($posts as $key => $post): ?>
                                <tr>
                                  <td><?php echo $key + 1; ?></td>
                                  <td><?php echo $post['title']; ?> </td>
                                  <td>Thales</td>
                                  <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                                  <td><a href="edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                                <?php if ($post['published']): ?>
                                    <td><a href="edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">unpublish</a></td>
                                <?php else: ?>
                                <td><a href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">publish</a></td>
                                <?php endif; ?>
    
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