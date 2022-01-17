<?php

	/**
	* 
	*/
	class Add {

		

 		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM regpin");
			$query->execute();

			return $query->fetchAll();
		}


 }
	
	?>