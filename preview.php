<?php 

include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;


if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $article->fetch_data($id);
	$articles = $article->fetch_all();


	?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEWS AND EVENTS</title>

    <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/style.css"/>  

        <!-- Custom styles for this template -->
    <link href="assets/css/justified-nav.css" rel="stylesheet">

        <!-- jQuery library -->
        <script src="assets/js/jquery.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"> </span>
                </button>
                <a class="navbar-brand" href="#">HCA MAITAMA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="login.php">User Login</a>
                    </li>
                    <li>
                        <a href="Admission/login.php">2017 Admision</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $data['article_title']; ?>
                    <small>posted <?php echo date('l jS F Y', $data['article_timestamp']); ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

			<!-- Project One -->
        <div class="row">
        	
			<div class="row">
            <div class="col-md-12">
            
            	<a href="#">
                    <img class="img-responsive" src="admin/images/<?php echo $data['image'];?>" height="300" width="700" alt="">
                </a>
            </div>
            <div class="col-md-12">
                <h2><?php echo $data['article_title']; ?> </h2>
			- <small>
				posted <?php echo date('l jS F Y', $data['article_timestamp']); ?>
			</small>  
			<h3>
				<p><?php echo $data['article_content']; ?></p>
			</h3>
			<a href="News.php">&larr; Back</a> 
			
            </div> 
             </div
             ><hr>
        

        </div>
       
        
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
}
    else{
  header('location: News.php');
    }
?>