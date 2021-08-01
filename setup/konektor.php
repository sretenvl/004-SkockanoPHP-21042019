<?php
try{
	$konektor = new PDO('mysql: host=127.0.0.1; dbname=baza; charset = utf8', 'root', '');
	$konektor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$konektor->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} 
catch (PDOException $e){
	echo $e->getMessage();
}
?>