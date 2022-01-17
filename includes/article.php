<?php
	class Article {

		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM contentmaneger");
			$query->execute();

			return $query->fetchAll();
		}

		public function fetch_data($idContentManeger){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM contentmaneger WHERE idContentManeger = ?");
			$query->bindValue(1, $idContentManeger);
			$query->execute();

			return $query->fetch();
		}
	}

?>