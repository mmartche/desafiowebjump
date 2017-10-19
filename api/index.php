<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "desafio-web";
$db_conect = new PDO('mysql:host='.$servername.';dbname='.$dbname, $username, $password);
$db_conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db_conect->query("SET NAMES 'utf8'");

switch ($_SERVER['REQUEST_METHOD']) {
 	case 'POST':
 		$name = $_POST['name'];
 		$sqlInsert = "insert into names (`name`) values ('".$_POST['name']."')";
	    $db_conect->query($sqlInsert);
 		print_r('Adicionado');
 		break;

 	case 'GET':
	 	$sqlQuery = "select name from names where name like ('%".$_GET['name']."%') order by name asc";
	    $resultQuery = $db_conect->query($sqlQuery)->fetchAll(PDO::FETCH_ASSOC);
 		var_dump($resultQuery);
 		break;
 	
 	case 'DELETE':
 		print_r("excluir não implementado");
 		break;

 	default:
 		# code...
 		break;

}
