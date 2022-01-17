<?php
	class Admission {

		public function fetch_all() {
			global $pdo;

			$query = $pdo->prepare("SELECT a. * , r. * FROM admissionforms a, regpin r WHERE a.idUser = r.AdmissionForms_idUser");
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

		public function fetch_usedby($id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM regpin WHERE AdmissionForms_idUser = ?");
			$query->bindValue(1, $id);
			$query->execute();

			return $query->fetch();
		}

	}

?>