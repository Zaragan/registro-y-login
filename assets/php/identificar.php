<?php
include('db.php');
$usuario = strip_tags(addslashes($_POST['p_username']));
$password = strip_tags(addslashes($_POST['p_password']));

$dbCall = new Database();
$userlist = $dbCall->setQuery("SELECT * FROM `registroylogin` WHERE `email`='$usuario'");

foreach($userlist as $row) {
	if($row['email'] == $usuario && password_verify($password, $row['password']) == true) {
		session_start();
		$_SESSION['email']=$row['email'];
		$_SESSION['level']=$row['level'];
		
		header('Location: ../../index.php');
	} else {
		header('Location: ../../index.php?mensaje=mensaje_error');
	}
}
?>