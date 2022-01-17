<?php
	/**
	* 
	*/
	class Admission {

		/**
		* $password = random_password(8);
		*
		*/
		public function random_password( $length = 8 ) {
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		    $randstring = '';
	    	for ($i = 0; $i < $length; $i++) {
	        	$randstring .= $chars[rand(0, strlen($chars))];
	    	}
	    	return $randstring;
		}

		
		

		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM admissionforms");
			$query->execute();

			return $query->fetchAll();
		}

		public function fetch_data($idUser){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM admissionforms WHERE idUser = ?");
			$query->bindValue(1, $idUser);
			$query->execute();

			return $query->fetch();
		}

	

	}	
?>
