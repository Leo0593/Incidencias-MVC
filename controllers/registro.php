<?php
require_once 'models/registro.php';

class registrocontroller
{

    public function registro()
    {
        require 'views/formularios/Formulario_Registro.php'; 
    }

    public function ingresar()
    {
        $registro = new registro();
        if ($registro->ingresar_datos()) {
            header("Location: /index.php?controller=login&method=login");
            exit;
        } else {
            header("Location: /index.php?controller=registro&method=registro");
            exit;
        }
    }

    
   
}