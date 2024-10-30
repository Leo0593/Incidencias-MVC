<?php
require 'models/ingresar_incidencias.php';

class ingresar_incidenciasController
{
    
    public function ingresar_incidencia()
    {
        require 'views/formularios/Ingresar_Incidencias.php';
    }

    public function ingresar()
    {
        $ingresar_incidencia = new ingresar_incidencias();
        if ($ingresar_incidencia->llenar_formulario()) {
            header("Location: /index.php?controller=login&method=bienvenido");
            exit;
        } else {
            header("Location: /index.php?controller=login&method=bienvenido");
            exit;
        }
    }
   
}