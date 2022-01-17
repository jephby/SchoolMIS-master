<?php
session_start();

include_once('../includes/connection.php');
include_once('../includes/Admission.php');

$Admission = new Admission;
$Admissions = $Admission;
	

if(isset($_SESSION['logged_in'])){


	if (isset($_GET['id'])){
		$id = $_GET['id'];
			$usedby = $Admission->fetch_usedby($id);
			$data = $Admission->fetch_data($id);
			if($data['idUser'] != $_SESSION['AdmissionForms_idUser']){
				die();
			}
		if(isset($_POST['btnsave'])){


      $imgFile = $_FILES['user_image']['name'];
      $tmp_dir = $_FILES['user_image']['tmp_name'];
      $imgSize = $_FILES['user_image']['size'];

	 if(empty($imgFile)){
	 	//226756  202489
	 	$userpic = $data['image'];
      $errMSG = "Please Select Image File.";
    }
    else{
      $upload_dir = '../uploads/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
        	unlink($upload_dir.$data['image']);
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else{
          $errMSG = "Sorry, your file is too large.";
        }
      }
      else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      }
    }



      if(!isset($errMSG))
        {
        	
	        	$query = $pdo->prepare('UPDATE admissionforms SET image=:image WHERE idUser=:idUser');
					$query->bindParam(':image',$userpic);
					$query->bindParam(':idUser',$id);
					$query->execute();	
        	

        if($query->execute())
          {
            $successMSG = "new record succesfully inserted ...";
            header('location: index.php?id='. $id); // redirects image view page after 5 seconds.
          }
          else
          {
            $errMSG = "error while inserting....";
          }

			}
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
			            <li role="presentation" class="active"><a href="#">Home</a></li>
			            <li role="presentation"><a href="form.php?id=<?php print $data['idUser']; ?>">About</a></li>
			            <li role="presentation"><a href="#">Contact</a></li>
			            <li class="active"><a href="logout.php">
            			<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
			          </ul>
			        </nav>
			        <h2 class="text-muted">Admission 2017</h2>

			      </div>

			      <div class="Container-fluid">
			      		<h2 class="text-muted">welcome <?php print $usedby["usedBy"]; ?> </h2> <hr>
			     	<!-- row  -->
			     	<div class="row">
			     			<!-- image col -->
				            <div class="col-md-4">
				            	<p><img src="../uploads/<?php echo $data["image"]; ?>" height="150" width="150" /></p>
									<form enctype="multipart/form-data" action="index.php?id=<?php echo $data['idUser']; ?>" method="POST" >
									<fieldset class="form-group">
									<label for="">Upload File</label>
				        			<input class="input-group" type="file" name="user_image" accept="image/*" />
									</fieldset>
									<button type="submit" class="btn btn-info" name="btnsave">upload Image</button>
									</form>

									<small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
				            </div>

				            <!-- Profile col-->
				            <div class="col-md-7">
				            		<!-- Well -->
				                <div class="well">

				                	<table class="table table-bordered">
									  <tbody>
									  	<tr>
									      <td><label for="">First Name</label></td> 
									      <td><?php print $data["firstname"]; ?> </td>
									      <td><label for="">Last Name</label>: </td> 
									      <td> <?php print $data["lastname"]; ?></td>
									    </tr>
									    <tr>
									      <td><label for="">Address</label>: </td> 
									      <td> <?php print $data["address"]; ?></td>
									      <td><label for="">Phone Number</label>: </td> 
									      <td> <?php print $data["phoneNum"]; ?></td>
									    </tr>
									    <tr>
									      <td><label for="">Email</label>: </td> 
									      <td> <?php print $data["email"]; ?></td>
									      <td><label for="">Date of Birth</label>: </td> 
									      <td> <?php print $data["Date_Of_Birth"]; ?></td>
									    </tr>
									    <tr>
									      <td><label for="">Fathers Name</label>: </td> 
									      <td> <?php print $data["Fathers_Name"]; ?></td>
									      <td><label for="">Mothers Name</label>: </td> 
									      <td> <?php print $data["Mothers_Name"]; ?></td>
									    </tr>
									    <tr>
									      <td><label for="">State </label>: </td> 
									      <td> <?php print $data["SO_Origin"]; ?></td>
									      <td><label for="">Class</label>: </td> 
									      <td> <?php print $data["class"]; ?></td>
									    </tr>
									    <tr>
									      <td><label for="">LGA </label>: </td> 
									      <td> <?php print $data["lga"]; ?></td>
									      <td><label for="">Nationality</label>: </td> 
									      <td> <?php print $data["nationality"]; ?></td>
									    </tr>
									  </tbody>
									</table>


									
									<!-- well closed -->
									<div >
										<button type="submit" class="btn btn-info"><a href="form.php?id=<?php echo $data['idUser'];?>">Update Profile</a></button>
									<!---profile closed -->
				                </div>
				                <!---row closed -->
				            </div>
				            <!---container closed -->
            </div>
            <!---contener closed -->
</div>
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