<?php
	session_start();
	include_once('../../includes/connection.php');
	include_once('../../includes/article.php');
	
	$article = new Article;
	$articles = $article->fetch_all();
	//start session
	if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
		//display index
		
		if(isset($_POST['title'], $_POST['content'])){
			$title = $_POST['title'];
			$content = $_POST['content'];

			if(empty($title) or empty($content)){
				$error = 'All fields are required!';
			} else{
				$query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES
				(?, ?, ?) ');
				$query->bindValue(1, $title);
				$query->bindValue(2, $content);
				$query->bindValue(3, time());

				$query->execute();

				header('Location: add.php');


			}
		}
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>CMS Project</title>
			    <!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../../assets/css/style.css"/>  

				<!-- jQuery library -->
				<script src="../../assets/js/jquery.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="../../assets/js/bootstrap.min.js"></script>
		</head>
		<body>
			<div class="navbar navbar-default ">
				<a class="navbar-brand" href="#"s>BOBBY_Cheng</a>
			</div><hl/>

			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4 col-md-3">
						<div class="list-group">
							  <a href="index.php" class="list-group-item active">
							    Home
							  </a>
							  <a href="add.php" class="list-group-item">Add Article</a>
							  <a href="#" class="list-group-item">Edit Article</a>
							  <a href="delete.php" class="list-group-item">Delete Article</a>
							  <a href="../logout.php" class="list-group-item">Logout</a>
						</div>
					</div>
				
					<div class="col-xs-12 col-md-8">
						
								<a href="index.php" id="logo"></a>
								<br /><br />
								<h4>Articles Here</h4>
								<br /> 
								<form action="add.php" method="POST" autocomplete="off">
								<?php if (isset($error)) { ?>
								<small style='color:#aa0000',><?php echo $error; ?></small>
								<?php } ?>
								<input type="text" class="form-control" name="title" placeholder="Text input"><br/>
								<textarea class="form-control" rows="5" placeholder="Content Here!" name="content"></textarea><br/>
								
								<input type="submit" value="submit"/>
								
								</form>	
								<hr/>			

								<div>
								<a href="#">Article Preview!!!</a>	
									
											<?php foreach ($articles as $article) { ?>
											<h4><?php echo $article['article_title']; ?> 
											- <small>
												posted <?php echo date('l jS F Y', $article['article_timestamp']); ?>
											</small>  
												<p><?php echo $article['article_content']; ?></p>
											</h4>
											<a href="#"> Delete</a> <a href="#"> Edit</a> 

									
									<?php } ?>
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