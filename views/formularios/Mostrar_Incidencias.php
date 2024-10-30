<?php
include 'views/layout/header_filtros.php'; 
?>

<div class="container mt-3">
    <h1 class="mb-4">Registro de Incidencias</h1>
    <div class="table-responsive"> <!-- Aquí está la clase que hace la tabla responsiva -->
        <table class="table table-hover table-bordered" id="Tabla_Incidencias">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Fecha de Incidencia</th>
                    <th>Estado</th>
                    <th>Prioridad</th>
                    <th>Foto</th>
                    <th>Fecha de Cierre</th>
                    <th>Usuario Id</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $mysql = new mysqli("localhost", "root", "", "mvc");
                    if ($mysql->connect_error) {
                        die('Problemas con la conexión a la base de datos');
                    }
                    $usuario = $_SESSION['usuario'];
                    $query_usuario = "SELECT id FROM usuarios WHERE nombre = '$usuario'";
                    $result_usuario = $mysql->query($query_usuario);
                    $row_usuario = $result_usuario->fetch_assoc();
                    $id_usuario_sesion = $row_usuario['id'];

                    while ($reg = $tablaregistro->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $reg['id'] . "</td>";
                        echo "<td>" . $reg['usuario'] . "</td>";
                        echo "<td>" . $reg['categoria'] . "</td>";
                        echo "<td>" . $reg['descripcion'] . "</td>";
                        echo "<td>" . $reg['fecha_incidencia'] . "</td>";
                        echo "<td>" . $reg['estado'] . "</td>";
                        echo "<td>" . $reg['prioridad'] . "</td>";
                        echo "<td><img src='" . $reg['foto'] . "' width='100' height='100' class='img-thumbnail'></td>";
                        echo "<td>" . $reg['fecha_cierre'] . "</td>";
                        echo "<td>" . $reg['usuario_id'] . "</td>";

                        if ($reg['usuario_id'] == $id_usuario_sesion) {
                            echo '<td><button class="btn btn-primary btn-sm actualizar-incidencia" data-id="' . $reg['id'] . '">Actualizar</button></td>';
                            echo '<td><a href="index.php?controller=eliminar_incidencia&method=eliminar_incidencia&codigo=' . $reg['id'] . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        } else {
                            echo "<td></td>";
                            echo "<td></td>";
                        }

                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

