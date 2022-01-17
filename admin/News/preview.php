<?php 
session_start();

include_once('../../includes/connection.php');
include_once('../../includes/article.php');

$article = new Article;

if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {


if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $article->fetch_data($id);
	$articles = $article->fetch_all();


	?> 
<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css"/>  
    <link rel="stylesheet" type="text/css" href="../../fonts/">


    <!-- Custom styles for this template -->
    <link href="../../assets/css/dashboard.css" rel="stylesheet">
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">HCAM ADMIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li class="active"><a href="../logout.php">
            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
                  <li class="active"><a href="#">Content Manager <span class="sr-only">(current)</span></a></li>
                  <li><a href="../News/edit.php">Add Article</a></li>
                  <li><a href="../News/article.php">priview Articles</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="">Income/Expense Manager <span class="sr-only">(current)</span></a></li>
                  <li><a href="../income-expense/IEmanager.php">Update Record</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="">Students <span class="sr-only">(current)</span></a></li>
                  <li><a href="../student/newuser.php">View all Students</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                  <li class="active"><a href="">Staff <span class="sr-only">(current)</span></a></li>
                  <li><a href="../staff/newuser.php">View all staff</a></li>
                </ul>

                
            <!-- Site footer -->
          <footer class="footer">
                <p>&copy; 2015 Company, Inc.</p>
              </footer><!-- /container -->

            </div>

        <!-- main dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Articles Here</h2>
          <div class="container-fluid">
						
			<!-- Project One -->
        <div class="row">
        	
			<div class="row">
            <div class="col-md-12">
            
            	<a href="#">
                    <img src="../images/<?php echo $data['image']; ?>" class="img-rounded" width="700px" height="300px" />
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
			<a href="article.php">&larr; Back</a> 
			<a href="article.php?id=<?php echo $data['idContentManeger'];?>"> Delete</a> 
			<a href="update.php?id=<?php echo $data['idContentManeger'];?>"> Edit</a> 
            </div> 
             </div
             ><hr>
        

        </div>
       
        
        <!-- /.row -->
      </div>
    </div>
    </div>
    </div>
	
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
</body>
</html>

<?php
} 
}
    else{
  header('location: ../login.php');
    }
?>