<?php
session_start();

include_once('../includes/connection.php');
include_once('../includes/Admission.php');

$Admission = new Admission;
$Admissions = $Admission;
	

if(isset($_SESSION['logged_in'])){


	if (isset($_GET['id'])){
		$id = $_GET['id'];

			$data = $Admission->fetch_data($id);
			if($data['idUser'] != $_SESSION['AdmissionForms_idUser']){
				
			}
				
				if(isset($_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['lga'], $_POST['nationality'], $_POST['phoneNum'], $_POST['class'], $_POST['SO_Origin'], $_POST['Date_Of_Birth'], $_POST['email'], $_POST['Fathers_Name'], $_POST['Mothers_Name'])){


	$update = $pdo->prepare("UPDATE admissionforms SET firstname = :firstname, lastname=:lastname, address = :address, phoneNum = :phoneNum, email = :email, Fathers_Name = :Fathers_Name, Mothers_Name = :Mothers_Name, Date_Of_Birth = :Date_Of_Birth, SO_Origin= :SO_Origin, class=:class, nationality=:nationality, lga=:lga WHERE idUser=:idUser");
	$update->bindParam(':firstname', $_POST['firstname']);
	$update->bindParam(':lastname', $_POST['lastname']);
	$update->bindParam(':address', $_POST['address']);
	$update->bindParam(':phoneNum', $_POST['phoneNum']);
	$update->bindParam(':email', $_POST['email']);
	$update->bindParam(':Fathers_Name', $_POST['Fathers_Name']);
	$update->bindParam(':Mothers_Name', $_POST['Mothers_Name']);
	$update->bindParam(':Date_Of_Birth', $_POST['Date_Of_Birth']);
	$update->bindParam(':SO_Origin', $_POST['SO_Origin']);
	$update->bindParam(':class', $_POST['class']);
	$update->bindParam(':nationality', $_POST['nationality']);
	$update->bindParam(':lga', $_POST['lga']);
	$update->bindParam(':idUser', $id);
	$update->execute();

	header('location: index.php?id='. $id);
	
}		
		
		

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
				<script src="./assets/js/jquery.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="./assets/js/bootstrap.min.js"></script>
				
		</head>
		<body>

			<div class="container">
				<div class="header clearfix">
			        <nav>
			          <ul class="nav nav-pills pull-right">
			            <li role="presentation" class="active"><a href="index.php?id=<?php echo $data["idUser"];?>">Home</a></li>
			            <li role="presentation"><a href="#">About</a></li>
			            <li role="presentation"><a href="#">Contact</a></li>
			            <li class="active"><a href="../logout.php">
            			<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
			          </ul>
			        </nav>
			        <legend><h2 class="text-muted">Admission 2017</h2></legend>
			      </div>

				<div class="container-fluid">
					

					<form action="form.php?id=<?php echo $data["idUser"];?>" method="POST" autocomplete="off" >
						<div class="col-md-12">
						<div class="col-md-6">
						  <fieldset class="form-group">
						    <label for="">First Name</label>
						    <input type="text" class="form-control" name="firstname" value="<?php print $data["firstname"]; ?>">
						    <small class="text-muted">We'll never share your email with anyone else.</small>
						  </fieldset>
						</div>
						  <div class="col-md-6">
						  	<fieldset class="form-group">
						    <label for="">Last Name</label>
						    <input type="text" class="form-control" name="lastname" value="<?php print $data["lastname"]; ?>">
						  	</fieldset>
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="col-md-12">
							<fieldset class="form-group">
						    <label for="">Address</label>
						    <textarea class="form-control" name="address" rows="3"><?php print $data["address"]; ?></textarea>
						  	</fieldset>
						  </div>
						</div>
						<div class="col-md-12">
						  <div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">Email</label>
						  	<input type="email" name="email" class="form-control" value="<?php print $data["email"]; ?>">
						  	</fieldset>
						  </div>
						  <div class="col-md-6">
						  	<fieldset class="form-group">
						  	<label for="">Phone Number</label>
						  	<input type="text" name="phoneNum" class="form-control" value="<?php print $data["phoneNum"]; ?>">
						  	</fieldset>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">Date of Birth</label>
						  	<input type="Date" name="Date_Of_Birth" class="form-control" value="<?php print $data["Date_Of_Birth"]; ?>" >
						  </fieldset>
						  </div>
						  <div class="col-md-6">
						  <fieldset class="form-group">
						  	<label for="">Class</label>
						  	<input type="text" name="class" class="form-control" value="<?php print $data["class"]; ?>">
						  </fieldset>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">Fathers Name</label>
						  	<input type="text" name="Fathers_Name" class="form-control" value="<?php print $data["Fathers_Name"]; ?>">
						  </fieldset>
						  </div>
						  <div class="col-md-6">
						  <fieldset class="form-group">
						  	<label for="">Mothers Name</label>
						  	<input type="text" name="Mothers_Name" class="form-control" value="<?php print $data["Mothers_Name"]; ?>">
						  </fieldset>
						  </div>
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							<fieldset class="form-group">
						  	<label for="">State of Origin</label>
						  	<input type="text" name="SO_Origin" class="form-control" value="<?php print $data["SO_Origin"]; ?>">
						  </fieldset>
						  </div>
						  <div class="col-md-6">
						  <fieldset class="form-group">
						  	<label for="">Local Gov. Area</label>
						  	<input type="text" name="lga" class="form-control" value="<?php print $data["lga"]; ?> ">
						  </fieldset>
						  </div>
						  
						</div>
						<div class="col-md-12">
							<div class="col-md-6">
							  <fieldset class="form-group">
							  	<label for="">Nationality</label>
							  	<input type="text" name="nationality" class="form-control" value="<?php print $data["nationality"]; ?> ">
							  </fieldset>
							  </div>
							<div class="col-md-6">
								<fieldset class="form-group">
							    <label for="exampleInputFile">Upload File</label>
							    <input type="file" class="form-control-file" name="name">
							    <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
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
	}
	else {
		# code...
		header('location: login.php');
	}