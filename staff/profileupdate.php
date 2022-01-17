<?php
	include_once('../includes/connection.php');
	include_once('../includes/user.php');

  session_start();
  //if($_SESSION['logged_in'] != true)
  if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 2)
  {
  	//include_once('../includes/fileupload.php');
    include_once('../includes/staff.php');
  
?>
<!DOCTYPE html>
		<html>
		<head>
			<title>CMS Project</title>
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
			        <h2 class="text-muted">welcome <?php print $Row["username"]; ?></h2> <hr></hr>

			      </div >
				
				<div class="container-fluid">
					<form action="profileupdate.php" method="POST" autocomplete="off" >
						<div class="col-md-12">
						<div class="col-md-6">
						  <fieldset class="form-group">
						    <label for="">First Name</label>
						    <input type="text" class="form-control" name="firstname" value="<?php print $Row["firstname"]; ?>">
						    <small class="text-muted">We'll never share your email with anyone else.</small>
						  </fieldset>
						</div>
						  <div class="col-md-6">
						  	<fieldset class="form-group">
						    <label for="">Last Name</label>
						    <input type="text" class="form-control" name="lastname" value="<?php print $Row["lastname"]; ?>">
						  	</fieldset>
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="col-md-12">
							<fieldset class="form-group">
						    <label for="">Address</label>
						    <textarea class="form-control" name="address" rows="3"><?php print $Row["address"]; ?></textarea>
						  	</fieldset>
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">Email</label>
						  	<input type="email" name="email" class="form-control" value="<?php print $Row["email"]; ?>">
						  	</fieldset>
						  </div>
						  <div class="col-md-6">
						  	<fieldset class="form-group">
						  	<label for="">Phone Number</label>
						  	<input type="text" name="phoneNum" class="form-control" value="<?php print $Row["phoneNum"]; ?>">
						  	</fieldset>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">Date of Birth</label>
						  	<input type="Date" name="Date_Of_Birth" class="form-control" value="<?php print $Row["Date_Of_Birth"]; ?>" >
						  </fieldset>
						  </div>
						  <div class="col-md-6">
						  <fieldset class="form-group">
						  	<label for="">Class</label>
						  	<input type="text" name="class" class="form-control" value="<?php print $Row["class"]; ?>" disabled>
						  </fieldset>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">Fathers Name</label>
						  	<input type="text" name="Fathers_Name" class="form-control" value="<?php print $Row["Fathers_Name"]; ?>" >
						  </fieldset>
						  </div>
						  <div class="col-md-6">
						  <fieldset class="form-group">
						  	<label for="">Mothers Name</label>
						  	<input type="text" name="Mothers_Name" class="form-control" value="<?php print $Row["Mothers_Name"]; ?>">
						  </fieldset>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">State of Origin</label>
						  	<input type="text" name="SO_Origin" class="form-control" value="<?php print $Row["SO_Origin"]; ?>">
						  </fieldset>
						  </div>
						  <div class="col-md-6">
						  <fieldset class="form-group">
						  	<label for="">Local Gov. Area</label>
						  	<input type="text" name="lga" class="form-control" value="<?php print $Row["lga"]; ?> ">
						  </fieldset>
						  </div>
						  
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							  <fieldset class="form-group">
							  	<label for="">Nationality</label>
							  	<input type="text" name="nationality" class="form-control" value="<?php print $Row["nationality"]; ?> ">
							  </fieldset>
							  </div>
							
						</div>
						  <button type="submit" class="btn btn-primary">Submit</button>
						
						</form>

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
   		 else{
  		header('location: ../login.php');
   		 }
	?>