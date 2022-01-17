<?php 

session_start();
	include_once('../includes/connection.php');

		//display login
		//vallidation
		if (isset($_POST['username'], $_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			if(empty($username) or empty('$password')){
				$error = 'All fields are required';
			} else {
				$query = $pdo->prepare("SELECT * FROM regpin WHERE usedBY = ? AND pin = ?");
				//query binding and execution
				$query->bindValue(1, $username); 
				$query->bindValue(2, $password);

				$query->execute();
				$num = $query->rowCount();
				$add = $query->fetch(PDO::FETCH_ASSOC);
				//print_r($num);
				//die();
				if($add){
					session_start();
						$id = $add['AdmissionForms_idUser'];
					 $_SESSION['AdmissionForms_idUser'] = $id;

				}
					if ($num==1){
					// user entered correct details
					$_SESSION['logged_in'] = true;
				
					header('location: index.php?id='. $id);
					exit();
				} else {
					//user entered wronge details
					$error = 'you entered the wrong username or password';
					}

				
			}
		}

		?>
<!DOCTYPE html>
		<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HILLS CHRISTIAN ACCADEMY</title>

   <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css"/>  

        <!-- Custom styles for this template -->
    <link href="../assets/css/justified-nav.css" rel="stylesheet">

        <!-- jQuery library -->
        <script src="../assets/js/jquery.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="../assets/js/bootstrap.min.js"></script>
  </head>
  <body >
    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted"><img src="../uploads/hill/logo.jpg" alt="" height="60" width="60"> HCA, Maitama</h3>
        <nav>
          <ul class="nav nav-justified">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../login.php">User Login</a></li>
            <li><a href="../News.php">News and events</a></li>
            <li class="active"><a href="../Admission_process.php">2017 Admision</a></li>
            <li><a href="../About.php">About</a></li>
            <li><a href="../contactform/contact-form.html">Contact</a></li>
          </ul>
        </nav>
      </div>
					

				<div class="container">
					<div class="container-fluid" Style="background-color:#fff;">
					<div class="col-md-6 col-md-offset-3">
					
					</div>
					<div class="col-md-6 col-md-offset-3">

		      		<form role="form" action="login.php" method="Post" autocomplete="off">
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