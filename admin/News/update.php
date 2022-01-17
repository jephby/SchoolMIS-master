<?php 
session_start();

include_once('../../includes/connection.php');
include_once('../../includes/article.php');

$article = new Article;

if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {


if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $article->fetch_data($id);

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

				$query = $pdo->prepare('UPDATE contentmaneger SET article_title =:article_title, article_content =:article_content, article_timestamp=:article_timestamp, image=:image  WHERE idContentManeger = :idContentManeger');
					$query->bindParam(':article_title', $title);
					$query->bindParam(':article_content', $content);
					$query->bindParam(':article_timestamp', time());
					$query->bindParam(':image',$userpic);
					$query->bindParam(':idContentManeger', $id);
					$query->execute();

					if($query->execute())
			          {
			            $successMSG = "new record succesfully inserted ...";
			            header('location: preview.php?id=' . $id);
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
	<div class="container">
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
                        <td><input class="form-control" type="text" name="title" value= "<?php print $data['article_title'];?>" /></td>
                    </tr>
                    
                    <tr>
                      <td><label class="control-label">Article Body.</label></td>
                        <td><textarea class="form-control" rows = "8" type="text" name="content" /><?php print $data['article_content'];?></textarea></td>
                    </tr>
                    
                    <tr>
                      <td><label class="control-label">Image.</label></td>

                        <td><img src="../images/<?php echo $data["image"]; ?>" height="150" width="150" /><br/><p>
                        <input class="input-group" type="file" name="image" accept="image/*" /></p></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> &nbsp; save
                        </button>
                        </td>
                    </tr>
                    <a href="preview.php?id=<?php print $data['idContentManeger'];?>">&larr; Back</a>
                    </table>
                    
                </form>



                <div class="alert alert-info">
                    <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!
                </div>

                </div>
		</div>
	</div>

</body>
</html>

<?php
}
}
    else{
  header('location: ../login.php');
    }
?>