<?Php

if($_FILES[‘photo’][‘size’] < 500000) // Check if file size is more then 5 mb

{

	//This is the directory where images will be saved

	$target = “../upload”; // Location of directory where we gonna upload

	$target = $target . basename( $_FILES[‘photo’][‘name’]);

	$filename=$_FILES[‘photo’][‘name’];

	$filetype=$_FILES[‘photo’][‘type’];

	$filename = strtolower($filename);

	$filetype = strtolower($filetype);

	$file_ext = strrchr($filename, ‘.’);


	 // Checking for extensions

	$whitelist = array(“.jpg”,”.jpeg”,”.gif”,”.png”);

	if (!(in_array($file_ext, $whitelist))) {

		die(‘not allowed extension,please upload images only’);

	}

	//checking for upload type

	$checkpos = strpos($filetype,’image’);

	if($checkpos === false) {

		die(‘error 1′);

	}

	$imageinfo = getimagesize($_FILES[‘photo’][‘tmp_name’]);

	if($imageinfo[‘mime’] != ‘image/gif’ && $imageinfo[‘mime’] != ‘image/jpeg’&& $imageinfo[‘mime’] != ‘image/jpg’&& 
		$imageinfo[‘mime’] != ‘image/png’) {

											die(‘error 2′);

											}

	if(substr_count($filetype, ‘/’) > 1)
	{
		die(‘error 3′);

	}

	//check if contain php file and kill it

	$pos = strpos($filename,’php’);

	if(!($pos === false)) {

		die(‘error’);

	}

	//This gets all the other information from the form

	$pic=($_FILES[‘photo’][‘name’]);

	//Writes the photo to the server

	if(move_uploaded_file($_FILES[‘photo’][‘tmp_name’], $target))

	{

		//Tells you if its all ok

		echo “The file “. basename( $_FILES[‘photo’][‘name’]). ” has been uploaded, and your information has been added to the directory”;

	}

	else

	{

		//Gives and error if its not

		echo “Sorry, there was a problem uploading your file.”;

	}

	}

	else

	{

		echo “File size error! Your file is too big to upload!”;

	}
?>