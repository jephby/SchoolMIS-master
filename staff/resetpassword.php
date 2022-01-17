<?php
	  session_start();

	include_once('../includes/connection.php');
	include_once('../includes/user.php');

	$user = new User;
	$users = $user->fetch_all();
  //if($_SESSION['logged_in'] != true)
  if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 2)
  {


  	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$Row = $user->fetch_data($id);
 
  		if($id != $_SESSION['idUser']){
				header('location: index.php?id='. $_SESSION['idUser']);
			}

			if(isset($_POST['btnsave'])){
				$oldpassword = $_POST['oldpassword'];
				$newpassword = $_POST['newpassword'];

				$pass = md5($oldpassword);
				$newpass =  md5($newpassword);

				if( $pass == $Row['password']){
					
					$query = $pdo->prepare('UPDATE user SET password=:newpassword WHERE idUser=:idUser');
					$query->bindParam(':newpassword', $newpass);
					$query->bindParam(':idUser', $id);

					$query->execute();
					if($query->execute())
			          {
			            $successMSG = "new record succesfully inserted ...";
			            header('refresh:3; index.php?id='. $id); // redirects image view page after 5 seconds.
			          }
			          else
			          {
			            $errMSG = "error while inserting....";
			          }

				} else {
					$errMSG = "check the old password you entered.";
					header('refresh:2;');
				}
		
  		}
  	
}


?>

<!DOCTYPE html>
		<html>
		<head>
			<title>CMS Project </title>
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
		<body>

			<div class="container">
				<!-- nav bar -->
				<div class="header clearfix">
			        <nav>
			          <ul class="nav nav-pills pull-right">
			            <li role="presentation" class="active"><a href="index.php?id=<?php print $Row["idUser"]; ?>">Home</a></li>
			            <li role="presentation"><a href="#">About</a></li>
			            <li role="presentation"><a href="#">Contact</a></li>
			            <li class="active"><a href="../logout.php">
            			<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
			          </ul>
			        </nav>
			        <h2 class="text-muted">welcome </h2> <hr></hr>
			      </div>

			      <!-- container body -->

			     <div class="Container">

			     	<!-- row  -->
			     	<div class="row">

				            <!-- Profile col-->
				            <div class="col-md-7 col-md-offset-3 ">
				            		<!-- Well -->
				                <div class="well">
				                	<div class="row-fluid">
				                	<?php
						                  if(isset($errMSG)){
						                      ?>
						                            <div class="alert alert-danger">
						                              <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
						                            </div>

						                            <?php
						                        }
						                  		else if(isset($successMSG)){
						                    ?>
						                        <div class="alert alert-success">
						                              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
						                        </div>
						                     <?php
						                  }
						                  ?> 
				                	   
				                	<form method="post" enctype="multipart/form-data" class="form-horizontal">
                      
					                  <table class="table table-bordered table-responsive">
					                  
					                    <tr>
					                      <td><label class="control-label">User Name.</label></td>
					                        <td><input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $Row['username']; ?>" disabled/></td>
					                    </tr>
					                    
					                    <tr>
					                      <td><label class="control-label">Old Password.</label></td>
					                        <td><input class="form-control" type="text" name="oldpassword" placeholder="Enter Old password" /></td>
					                    </tr>
					                    
					                    <tr>
					                      <td><label class="control-label">New Password.</label></td>
					                        <td><input class="form-control" type="text" name="newpassword" placeholder="Enter New Password" /></td>
					                    </tr>
					                    
					                    <tr>
					                        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
					                        <span class="glyphicon glyphicon-save"></span> &nbsp; save
					                        </button>
					                        </td>
					                    </tr>
					                    
					                    </table>
					                    
					                </form>
									</div>
									
		
				                <!---row closed -->
				            </div>
				            <!---container closed -->
            </div>
            <!---contener closed -->
</div>

            
        
			     
			     
							

				<!-- Site footer -->
				      <footer class="footer">
				        <p>&copy; 2015 Company, Inc.</p>
				      </footer>

				    </div> <!-- /container -->


				    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
				    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
		</body>
		</html>

	<?php

	}
		else {
			header('location:../login.php');
	}
	?>