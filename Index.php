<?php
include('assets/php/funciones.php');
$log_error = "";
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='mensaje_error')){$log_error = "Su usuario o contraseña son incorrectos";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='gracias')){$log_error = "Gracias por utilizar nuestra web";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='sin_permiso')){$log_error = "No tienes permiso para acceder a esta URL";}
if(isset($_GET['mensaje'])&&($_GET['mensaje']=='inicia')){$log_error = "Registrado. Identificate ahora.";}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/reset.css">
	<link rel="stylesheet" href="assets/main.css">
    <title>Bienvenido</title>
</head>
<body>
    <div id="menu" class="wrapper"><?php menu(); ?></div>
    <p><?php echo $log_error ?></p>
    <div class="tabla"><table><tr><th>usuarios</th><th>password</th></tr><?php displaydb() ?></table></div>
</body>
</html>