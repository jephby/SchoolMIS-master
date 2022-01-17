<?php
	class User {

		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM user");
			$query->execute();

			return $query->fetchAll();
		}

		public function fetch_data($idUser){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM user WHERE idUser = ?");
			$query->bindValue(1, $idUser);
			$query->execute();

			return $query->fetch();
		}

	}

?>