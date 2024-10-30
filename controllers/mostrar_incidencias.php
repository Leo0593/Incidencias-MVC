<?php
require 'models/mostrar_incidencias.php';

class mostrar_incidenciasController
{
    
    public function mostrar_incidencias()
    {
        $mostrar_incidencias = new mostrar_incidencias();
        $tablaregistro = $mostrar_incidencias->mostrar_incidencias();
        require 'views/formularios/Mostrar_Incidencias.php';
    }

    public function inicio()
    {
        require 'views/formularios/Mostrar_Incidencias.php';
    }
}