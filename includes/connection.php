<?php
 
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=finalproject', 'root', '');
	} catch (PDOException $e){
		exit('Database error.');
	}

 ?>