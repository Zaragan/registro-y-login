<?php
include('db.php');
$usuario = strip_tags(addslashes($_POST['p_username']));
$password = strip_tags(addslashes($_POST['p_password']));

$dbCall = new Database();
$userlist = $dbCall->setQuery("SELECT * FROM registroylogin WHERE email=$usuario");

$fila = mysqli_fetch_array($userlist);
$passok = password_verify($password, $fila['password']);

if($fila['email']==$usuario && $passok==true) {
	
	session_start();
	$_SESSION['email']=$fila['email'];
	$_SESSION['level']=$fila['level'];

	header('Location: ../../index.php');

}else{
	header('Location: ../../index.php?mensaje=mensaje_error');
}
?>