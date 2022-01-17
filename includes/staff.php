<?php
	$idUser = $_SESSION['idUser'];
	$stmt = $pdo->prepare("SELECT * FROM user WHERE iduser=:idUser");
	$stmt->execute(array(":idUser"=>$idUser));
	$Row=$stmt->fetch(PDO::FETCH_ASSOC);




	if(isset($_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['lga'], $_POST['nationality'], $_POST['phoneNum'], $_POST['class'], $_POST['SO_Origin'], $_POST['Date_Of_Birth'], $_POST['email'], $_POST['Fathers_Name'], $_POST['Mothers_Name'])){

		

			$update = $pdo->prepare("UPDATE user SET firstname = :firstname, lastname=:lastname, address = :address, phoneNum = :phoneNum, email = :email, Fathers_Name = :Fathers_Name, Mothers_Name = :Mothers_Name, Date_Of_Birth = :Date_Of_Birth, SO_Origin= :SO_Origin, class=:class, nationality=:nationality, lga=:lga WHERE idUser=:idUser");

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
			$update->bindParam(':idUser', $idUser);
			
			if($update->execute()){


			header('location: index.php?id='. $idUser);
			}else {
				header('location: profileupdate.php?id='. $idUser);
			}
		
			
		
			
}

if(isset($_POST['btn-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="UPDATE user SET file_up = :file WHERE idUser = $idUser";
		$querry = $pdo->prepare($sql);
		$querry->bindParam(':file', $final_file);
		$update->bindParam(':idUser', $idUser);

		$update->execute();
		header('location: index.php?id='. $idUser);
	}
	else
	{
		
        header('location: index.php?fail');
	}
}
	?>