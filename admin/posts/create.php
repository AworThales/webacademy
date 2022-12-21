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
    <title>Admin Section - Add Post</title>
    
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
                      <a href="create.php" class="btn btn-big">Add Posts</a>
                      <a href="index.php" class="btn btn-big">Manage Posts</a>
                  </div>

                  <div class="content">
                      <h2 class="page-title">Add Posts</h2>

                      <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                  <form action="create.php" method="post" enctype = "multipart/form-data">
                      <div>
                          <label>Title</label>
                          <input type="text" name="title" value="<?php echo $title; ?>" class="text-input">
                      </div>

                    <div>
                        <label>Body</label> <br>
                       <textarea name="body" id="body"  class="text-input" ><?php echo $body; ?></textarea>
                    </div>
                    
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>

                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="input-role">
                            <option value=""></option>

                            <?php foreach ($topics as $key => $topic): ?>

                                <?php if (!empty($topic_id) && $topic_id == $topic["id"]): ?>
                                    <option selected value="<?php echo $topic["id"] ?>"><?php echo $topic["name"] ?></option>
                                <?php else:?>
                                    <option value="<?php echo $topic['id'] ?>"><?php echo $topic["name"] ?></option>
                                <?php endif; ?>

                                
                            <?php endforeach; ?>
                           
                        </select>
                    </div>

                    <div>
                        
                    <?php if (empty($published)): ?>
                        <label>
                            <input type="checkbox" name="published">
                            Publish
                        </label>

                    <?php else: ?>
                        <label>
                            <input type="checkbox" name="published" checked>
                            Publish
                        </label>

                    <?php endif; ?>

                        
                    </div>
                    
                    <div>
                        <button type="submit" name="add-post" class="btn btn-big">Add Post</button>
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
<!--Ckeditor-->

<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>



<!--CUSTOM SCRIPT-->
<script src="../../assets/js/scripts.js"></script>
</body>
</html>