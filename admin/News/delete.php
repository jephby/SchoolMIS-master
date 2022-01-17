<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article;

	if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
		if (isset($_GET['id'])){
			$id = $_GET['id'];

			$query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
			$query->bindValue(1, $id);
			$query->execute();
		}
			$articles = $article->fetch_all();
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>CMS Project</title>
			    <!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../assets/style.css"/>  

				<!-- jQuery library -->
				<script src="../assets/js/jquery.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="../assets/js/bootstrap.min.js"></script>
		</head>
		<body>
			<div class="navbar navbar-inverse">
				<a class="navbar-brand" href="#"s>BOBBY_Cheng</a>
			</div>

			<div class="container-fluid " >
				<div class="row">
					<div class="col-xs-4 col-md-3">
						<div class="list-group">
							  <a href="index.php" class="list-group-item active">
							    Home
							  </a>
							  <a href="add.php" class="list-group-item">Add Article</a>
							  <a href="#" class="list-group-item">Edit Article</a>
							  <a href="delete.php" class="list-group-item">Delete Article</a>
							  <a href="logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
					
					<div class="col-xs-12 col-md-8">
									<a href="#" id="logo"></a>
									<form action="delete.php" method="GET">
										<select onchange="this.form.submit();" name="id">
											<?php foreach ($articles as $article) {?>
											<option value="<?php echo $article['article_id']; ?>">
											<?php echo $article['article_title'];?>
											</option>
											<?php } ?>
										</select>
									</form>
		        	</div>
				</div>
			</div>

			</div>
			
		</body>
		</html>

		<?php
	  }
    else{
  header('location: ../login.php');
    }
?>