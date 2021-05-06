<?php
session_start();
include('assets/php/db.php');

function displaydb(){
    $dbCall = new Database();
    $users = $dbCall->setQuery("SELECT email,password FROM registroylogin");
    if ($users->num_rows > 0) {
        while ($fila = $users->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $fila['email'] . '</td>';
            echo '<td>' . $fila['password'] . '</td>';
            echo '</tr>';
        }
    }
}
function menu(){
    if (!isset($_SESSION['level'])) {
        $menu = '<ul>
            <li><a href="index.php">Inicio</a></li>
            </ul>
            <form action="assets/php/identificar.php" method="POST" class="usuario">
                <label for="usuario">Usuario</label>
                <input type="text" name="p_username" id="p_username" required>
                <label for="password">Contraseña</label>
                <input type="password" name="p_password" id="p_password" required>
                <input type="submit" value="Identificarse" class="reg">
                </form>
                <a href="registro.php" class="usuario" style="width: auto"><button class="reg">Registro</button></a>';
    } else if ($_SESSION['level'] == 1) {
        // ZONA ADMIN
        $menu = '<ul>
            <li><a href="#">Inicio</a></li>
            <li class="ultimo"><a href="assets/php/desconectar.php">Desconectar</a></li>
            </ul>
            <p class=usuario>Bienvenido: '.$_SESSION['email'].'!</p>';
    } else if ($_SESSION['level'] == 2) {
        // ZONA USUARIO
        $menu = '<ul>
            <li><a href="#">Inicio</a></li>
            <li class="ultimo"><a href="assets/php/desconectar.php">Desconectar</a></li>
            </ul>
            <p class=usuario>Bienvenido: '.$_SESSION['email'].'!</p>';
    }
	echo $menu;
}

?>