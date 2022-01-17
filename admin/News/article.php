<?php 
 session_start();
 
include_once('../../includes/connection.php');
include_once('../../includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
  if(isset($_GET['delete_id']))
  {
    // select image from db to delete
    $stmt_select = $pdo->prepare('SELECT image FROM contentmaneger WHERE idContentManeger =:uid');
    $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
    $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
    unlink("../images/".$imgRow['image']);
    
    // it will delete an actual record from db
    $stmt_delete = $pdo->prepare('DELETE FROM contentmaneger WHERE idContentManeger =:uid');
    $stmt_delete->bindParam(':uid',$_GET['delete_id']);
    $stmt_delete->execute();
    
    header("Location: article.php");
  }

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
            <li><a href="edit.php">Add Article</a></li>
            <li><a href="article.php">priview Articles</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="">Income/Expense Manager <span class="sr-only">(current)</span></a></li>
            <li><a href="../income-expense/IEmanager.php">Update Record</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="">Students <span class="sr-only">(current)</span></a></li>
            <li><a href="student/viewallstudents.php">View all Students</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="">Staff <span class="sr-only">(current)</span></a></li>
            <li><a href="">View all staff</a></li>
          </ul>
        </div>

        <!-- main dashboard -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Articles Here</h2>
          <div class="container-fluid">
						
			<!-- Project One -->
        <div class="row">
        	<?php foreach ($articles as $article) { ?>
			<div class="row">
            <div class="col-md-7">
            
            	<a href="#">
                    <img src="../images/<?php echo $article['image']; ?>" class="img-rounded" width="500px" height="250px" />
                </a>
            </div>
            <div class="col-md-5">
                <h3><a href="preview.php?id=<?php echo $article['idContentManeger'];?>">
					<?php echo $article['article_title'];?>
				</a></h3>
                -<small>
					Posted<?php echo date('l jS F Y', $article['article_timestamp']);?>
				</small>
				<br>
        <span>
        <a class="btn btn-info" href="#?edit_id=<?php echo $article['idContentManeger']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
        <a class="btn btn-danger" href="?delete_id=<?php echo $article['idContentManeger'];?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
        </span>
            </div> 
             </div
             ><hr>
        <?php } ?> 

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
    else{
  header('location: ../login.php');
    }
?>