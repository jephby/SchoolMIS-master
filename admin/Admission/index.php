<?php
	session_start();
	include_once('../../includes/connection.php');
	include_once('../../includes/passgen.php');
  include_once('../../includes/Add.php');
	
	$Admission = new Admission;
	$Admissions = $Admission->fetch_all();

  

	//start session
  //if($_SESSION['logged_in'] != true)
  if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
  //print_r($_POST) ;
  //die();
		//display index
		
		if(isset($_POST['firstname'], $_POST['lastname'])){
			
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];


			if( empty($firstname) or empty($lastname) ){
				$error = 'All fields are required!';


			} else{
      //die("asdfghjk");

				$query = $pdo->prepare('INSERT INTO admissionforms (firstname, lastname) VALUES
				(?, ?) ');
				$query->bindValue(1, $firstname);
        $query->bindValue(2, $lastname);
        $query->execute();

      
        $Admission_idUser = $pdo->lastInsertId();
        
        $usedby = "$firstname$lastname";
        $db = $pdo->prepare('INSERT INTO regpin (pin, usedby, AdmissionForms_idUser) VALUES
        (?, ?, ?) ');
        $db->bindValue(1, $pin = $Admission->random_password());
        $db->bindValue(2, $usedby);
        $db->bindValue(3, $Admission_idUser );
        $db->execute();

				header('Location: index.php');


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

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css"/>  
    <link rel="stylesheet" type="text/css" href="../../fonts/">


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
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          <div class="container-fluid">
            <div class="col-md-5">
              <form class="form-horizontal" action="index.php" method="Post" autocomplete="off">
                <div class="form-group" >
                  
                  
                  <div class="input-group">
                    <div class="input-group-addon">FirstName</div>
                    <input type="integer" name="firstname" class="form-control" placeholder="FirstName">
                  </div><br/>
                  <div class="input-group">
                    <div class="input-group-addon">LastName</div>
                    <input type="integer" name="lastname" class="form-control" placeholder="LastName">
                  </div><br/>

                  <button type="submit" class="btn btn-primary">Create</button>

                </div><br/>
                
              </form><br/>
              </div>
            
            </div>    

            

          <table class="table">
                  <caption>list of students</caption>
                  <thead>
              <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Admission ID</th>
                    

                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                  $Add = new Add;
                  $Adds = $Add->fetch_all();

                  foreach ($Adds as $Add) { ?>
                  
                  <tr>
                    <td><li></li></td>
                    <th scope="row"><?php echo $Add['usedBy'];?></th>
                    <td><?php echo $Add['pin']; ?></td>
                    <td><?php echo $Add['AdmissionForms_idUser']; ?></td>
                    
                  </tr>
                  <?php } ?>
              </tbody>
             </table>


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