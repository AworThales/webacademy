<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php"); 
 
if (isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
  

$topics = selectAll('topics');
$posts = selectAll('posts', ['published' => 1]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title><?php echo $post['title']; ?> | WebDesk</title>
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
    
    <!--PAGE WRAPPER-->
    <div class="page-wrapper">

        <!--content-->
        <div class="content clearfix">
            <!--main content-->
            <div class="main-content single">
                <h1 class="post-title"><?php echo $post['title']; ?></h1>
                <div class="post-content">
                   <?php echo html_entity_decode($post['body']); ?>
                </div>    
            </div>
           <!--//main content --> 
                <!--SIDEBAR --> 
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular Posts</h2>
                    <?php foreach ($posts as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . "/assets/images/" . $p['image']; ?>" alt="">
                            <h4><a href="single.php?id=<?php echo $p['id']; ?>"><?php echo $p['title']; ?></a></h4>

                        </div>

                       
                    <?php endforeach; ?>                  
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $topic): ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name'];  ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--//content -->

    </div>
<!--// page wrapper-->


    <!--footer-->
    <?php include (ROOT_PATH . "/app/includes/footer.php"); ?>
    
        <!--// footer-->
   
<!--JQUERY-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--slick carousel-->
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--CUSTOM SCRIPT-->
<script src="assets/js/scripts.js"></script>
</body>
</html>  