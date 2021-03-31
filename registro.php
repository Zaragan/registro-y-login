<?php

include('assets/php/funciones.php');
$reg_error = "";
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='en_uso')){$reg_error = "El correo proporcionado ya esta en uso";}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/reset.css">
	<link rel="stylesheet" href="assets/main.css">
    <title>Registro</title>
</head>
<body>
    <div id="menu" class="wrapper"><?php menu(); ?></div>
    <div id="registro">
		<span class="title">Registro</span>
		<form action="assets/php/registrar.php" method="POST">
			<label for="remail">Usuario</label><br>
			<input type="text" name="r_username" id="r_username" required><br>
			<label for="rpass">Contraseña</label><br>
			<input type="password" name="r_password" id="r_password" required><br><br>
			<input type="submit" value="Entrar" class="usuario reg" style="width: auto">
			<p><?php echo $reg_error ?></p>
		</form>
	</div>
</body>
</html>