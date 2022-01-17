<?php
	session_start();
include_once('../../includes/connection.php');
include_once('../../includes/article.php');
	$article = new Article;

	if(isset($_SESSION["Roles_idRoles"]) && $_SESSION["Roles_idRoles"] == 1)
  {
		if (isset($_GET['id'])){
			$id = $_GET['id'];

			$query = $pdo->prepare('DELETE FROM contentmaneger WHERE idContentManeger = ?');
			$query->bindValue(1, $id);
			$query->execute();

			header('location: article.php');
		}

		
	  }
    else{
  header('location: ../login.php');
    }
?>