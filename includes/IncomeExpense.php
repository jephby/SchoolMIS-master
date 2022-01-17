<?php
	class Transaction {

		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM transaction");
			$query->execute();

			return $query->fetchAll();
		}

		public function fetch_data($idUser){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM transaction WHERE idTransaction = ?");
			$query->bindValue(1, $idTransaction);
			$query->execute();

			return $query->fetch();
		}
	}

?>