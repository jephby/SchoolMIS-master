<?php

error_reporting( ~E_NOTICE ); 
	session_start();
	include_once('../../includes/connection.php');

	
	//start session
	if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {		//display index
		
		if(isset($_POST['btnsave'])){
			$title = $_POST['title'];
			$content = $_POST['content'];

      $imgFile = $_FILES['image']['name'];
      $tmp_dir = $_FILES['image']['tmp_name'];
      $imgSize = $_FILES['image']['size'];

			if(empty($title)){
      $errMSG = "Please Enter Title.";
    }
    else if(empty($content)){
      $errMSG = "Please Enter Article title.";
    }
    else if(empty($imgFile)){
      $errMSG = "Please Select Image File.";
    }
    else{
      $upload_dir = '../images/'; // upload directory
  
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    
      // valid image extensions
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
    
      // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;
        
      // allow valid image file formats
      if(in_array($imgExt, $valid_extensions)){     
        // Check file size '5MB'
        if($imgSize < 5000000)        {
          
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

				$query = $pdo->prepare('INSERT INTO contentmaneger (article_title, article_content, article_timestamp, image) VALUES
				(?, ?, ?,?) ');
				$query->bindValue(1, $title);
				$query->bindValue(2, $content);
				$query->bindValue(3, time());
        $query->bindValue(4,$userpic);
				$query->execute();

        if($query->execute())
          {
            $successMSG = "new record succesfully inserted ...";
            header("location:article.php"); // redirects image view page after 5 seconds.
          }
          else
          {
            $errMSG = "error while inserting....";
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
							
                <div class="page-header">
                      <h1 class="h2">add new Articles. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
                    </div>
                    

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
                      <td><label class="control-label">Title.</label></td>
                        <td><input class="form-control" type="text" name="title" placeholder="Enter Article Title" /></td>
                    </tr>
                    
                    <tr>
                      <td><label class="control-label">Article Body.</label></td>
                        <td><textarea class="form-control" rows = "5" type="text" name="content" placeholder="Content Here" /></textarea></td>
                    </tr>
                    
                    <tr>
                      <td><label class="control-label">Image.</label></td>
                        <td><input class="input-group" type="file" name="image" accept="image/*" /></td>
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