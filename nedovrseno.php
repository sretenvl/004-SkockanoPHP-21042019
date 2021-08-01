
	define("FILE_SIZE", 2000000);
	$allowedTypes = ['image/jpeg', 'image/png'];
$file = $_FILES['slika'];
		$size = $file['size'];
		$type = $file['type'];
		$tmp = $file['tmp_name'];
		$fileName = $file['name'];
		$fajl = time(). "_" .$fileName;
		$path = "../slike/" .$fajl;
		$putanjaBaza = "slike/" .$fajl;
		$errors = [];
		if(!in_array($type, $allowedTypes)){
			array_push($errors, "Tip fajla nije odgovarajuci.");
		}
		elseif($size > FILE_SIZE){
			array_push($errors, "Velicina fajla nije tacna.");
		}
		elseif(move_uploaded_file($tmp, $path)){
			
		}