<?php 
	session_start();
	include_once('includes/connection.php');

		//display login
		//vallidation
		if (isset($_POST['username'], $_POST['password'])){

			$username = $_POST['username'];
			$password = md5($_POST['password']);

			if(empty($username) or empty('$password')){

				$error = 'All fields are required';

			} else {
				
					$query = $pdo->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
				$query->execute(array($username, $password));
				$num = $query->fetch(PDO::FETCH_ASSOC);

				if ($num){
					session_start();
					$Roles_idRoles = $num['Roles_idRoles'];
					$idUser = $num['idUser'];
					
					$_SESSION['idUser'] = $idUser;
					$_SESSION['Roles_idRoles'] = $Roles_idRoles;
					if($Roles_idRoles==1) {
						header('location:admin/home.php');
					} 
					else if($Roles_idRoles==2) {
						header('location:staff/index.php?id='. $idUser);
					} 
					else if ($Roles_idRoles == 3){
						header('location:Student/index.php?id='. $idUser);
					} else {
						header("location: login.php");
					}	
				} else {
					//user entered wronge details
					$error = 'you entered the wrong username or password';
				}
			}
		}
		?>
<!DOCTYPE html>
		<html>
		<head>
			<title>CMS Project</title>
			 <!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../assets/style.css"/>  

				<!-- Custom styles for this template -->
    			<link href="assets/css/justified-nav.css" rel="stylesheet">

				<!-- jQuery library -->
				<script src="assets/js/jquery.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="assets/js/bootstrap.min.js"></script>
			
		</head>
		<body >
					

				<div class="container">
					<!-- The justified navigation menu is meant for single line per list item.
           			Multiple lines will require custom code not provided by Bootstrap. -->
				      <div class="masthead">
				        <h2 class="text-muted"><img src="uploads/hill/logo.jpg" alt="" height="60" width="60"> HCA, Maitama</h2>
				        <nav>
				          <ul class="nav nav-justified">
				            <li><a href="index.php">Home</a></li>
				            <li class="active"><a href="login.php">User Login</a></li>
				            <li><a href="News.php">News and events</a></li>
				            <li><a href="Admission/login.php">2017 Admision</a></li>
				            <li><a href="About.php">About</a></li>
				            <li><a href="contactform/contact-form.html">Contact</a></li>
				          </ul>
				        </nav>
				      </div>
					<div class="container-fluid" Style="background-color:#fff;">
					<div class="col-md-6 col-md-offset-3">

		      		<form role="form" action="#" method="Post" autocomplete="off">
						<div class="form-group">
							<div>
			        		<h2 class="form-signin-heading"> Sign in.</h2>
			        		<div>
				        		<label>User-Name</label>
				        		<input type="text"  class="form-control" name="username" Placeholder="username">
			        		</div class="form-group"><br/>
			        		<div>
				        		<label>Password</label>
				        		<input type="password" class="form-control" name="password" Placeholder="Password">
			        		</div>
			        		<div class="checkbox">
				        		<label> <input type="checkbox"> Remember me</label>
				        	</div>
			        			<button class="btn btn-large btn-primary" type="submit">Sign in</button>
			        		
			        		<?php if (isset($error)) { ?>
								<small style='color:#aa0000',><?php echo $error; ?></small>
							<?php } ?>
							<hr/>
							</div>
						</div>
					</form>
					</div>
					</div>
				</div>
					


				    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
								
		</body>
		</html>