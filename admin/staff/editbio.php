<?php

if (! isset($_GET['id'])){
	header("location: newuser.php");
}
  session_start();
  	include_once('../../includes/connection.php');
	include_once('../../includes/user.php');

	$user = new User;


	//start session
	  if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {

		//get userid
		
		if (isset($_GET['id'])){
			$id = $_GET['id'];
				$data = $user->fetch_data($id);
			//}
		
		//update DB
		
		if(isset($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['id'] )){
			$id = $_POST['id'];
			$username = $_POST['username'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];



			if(empty($username) or empty($firstname) or empty($lastname) or empty($id)){
			$error = 'All fields are required!';

			} else
			{

				$sql = "UPDATE user SET username = :username, password = :password, firstname = :firstname, lastname = :lastname WHERE userid = :id";

				try{
					$query = $pdo->prepare($sql);
				$query->bindValue(":username", $username);
				$query->bindValue("password", md5('12345'));
				$query->bindValue("firstname", $firstname);
				$query->bindValue("lastname", $lastname);
				$query->bindValue(":id", $id);
				$res = $query->execute(); 

				var_dump($res);
				die();

				} catch(PDOException $e) {
          			echo $e->getCode() . " - " . $e->getMessage();
        }


				
				header('Location: newuser.php');
//if($_SESSION['logged_in'] != true)
  //{
    //header('location: ../../login.php');
  //}

			}

		}
		
	}		
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css"/>  
    <link rel="stylesheet" type="text" href="../../fonts/"></link>


    <!-- Custom styles for this template -->
    <link href="../../assets/css/dashboard.css" rel="stylesheet">

  </head>

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
			          <a class="navbar-brand" href="#">Student </a>
			        </div>
			        <div id="navbar" class="navbar-collapse collapse">
			          <ul class="nav navbar-nav navbar-right">
			            <li><a href="#">Dashboard</a></li>
			            <li><a href="#">Settings</a></li>
			            <li><a href="#">Profile</a></li>
			            <li class="active"><a href="logout.php">
			            <span class="glyphicon glyphicon-logout" aria-hidden="true"></span>logout</a></li>
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

			          <div>
						<!-- Site footer -->
					<footer class="footer">
				        <p>&copy; 2015 Company, Inc.</p>
				      </footer><!-- /container -->
					</div>
			        </div>
			        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			          <h1 class="page-header">Dashboard</h1>

			         <div class="container-fluid">
					

					<form class="col-md-10" action="editbio.php?id=<?php echo $_GET["id"]; ?>" method="Post" autocomplete="off">
						<fieldset>			        		
						    <legend><h2 class="form-heading"> EDIT INFORMATION</h2></legend>

						     

						    <div>
							    <div class="form-group">
					        		<label> Username</label>
					        		<input type="text"  class="form-control" name="username" value = "<?php echo $data['username']; ?>" >
					        	</div>

							    <div class="form-group">
					        		<label> First name</label>
					        		<input type="text"  class="form-control" name="firstname" value = "<?php echo $data['firstname']; ?>" >
					        	</div>

					        	<div class="form-group">
					        		<label> Last name</label>
					        		<input type="text"  class="form-control" name="lastname" value="<?php echo $data['lastname']; ?>">
					        	</div>
					        	<input type="hidden" value="<?php echo $id; ?>" name="id">

					        	<button type="submit" class="btn btn-primary">Submit</button>
				        	</div> 
						    
				        	
						  </fieldset>
						
					</form>	
					</div>
					<br/> <br/>
					

					</div>
					
					</div>

			        </div>
			      </div>
				      
				    </div> 				  


				    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		</body>
		</html>

		<?php
  } 
  else{
  header('location: ../login.php');
    }
?>