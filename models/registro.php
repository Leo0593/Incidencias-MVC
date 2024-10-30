<?php

class registro
{

    public function ingresar_datos()
    {
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $confirmación = $_POST['confirmación'];
    
        $mysql = new mysqli("localhost", "root", "", "mvc");
    
        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }
    
        if ($contraseña !== $confirmación) {
            $_SESSION['error'] = "Las contraseñas no coinciden. Por favor, intenta de nuevo.";
            return false;
        }
    
        $result = $mysql->query("SELECT * FROM usuarios WHERE email = '$email'");
        if ($result->num_rows > 0) {
            $_SESSION['error'] = "El correo ya está registrado. Por favor, usa otro correo.";
            return false;
        }
    
        $hash = password_hash($contraseña, PASSWORD_DEFAULT);
    
        if ($mysql->query("INSERT INTO usuarios (nombre, apellido, email, contraseña) VALUES ('$nombre', '$apellido', '$email', '$hash')")) {
            $_SESSION['success'] = "Usuario registrado correctamente";
            return true;
        } else {
            $_SESSION['error'] = "Error al insertar los datos: " . $mysql->error;
            return false;
        }
    }
}