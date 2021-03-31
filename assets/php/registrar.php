<?php
include('db.php');
$usuario = strip_tags(addslashes($_POST['r_username']));
$password = strip_tags(addslashes($_POST['r_password']));

$hashpass = password_hash($password, PASSWORD_ARGON2ID); 
$dbCall = new Database();
$users = $dbCall->setQuery("SELECT * FROM subastausers");

if ($fila = mysqli_fetch_array($users)) {
    if ($fila['email']==$usuario) {
	    header('Location: ../../registro.php?mensaje=en_uso');
    }else {
        $dbCall->setQuery("INSERT INTO `subastausers`(email, password) VALUES ('$usuario','$hashpass')");
        header('Location: ../../index.php?mensaje=inicia');
    }
}
?>