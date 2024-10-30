<?php
include 'views/layout/header_inicio_sesion.php'; 
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="max-width: 400px; width: 100%; background-color: #fff;">
            <h1 class="text-center mb-4">Registrar</h1>
            <form action="index.php/?controller=registro&method=ingresar" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="confirmación" class="form-label">Confirmar Contraseña:</label>
                    <input type="password" name="confirmación" id="confirmación" class="form-control" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?controller=login&method=login'">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
