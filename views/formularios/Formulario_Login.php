<?php
include 'views/layout/header_inicio_sesion.php'; 
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="max-width: 400px; width: 100%;">
            <h1 class="text-center mb-4">Iniciar Sesión</h1>
            <form action="index.php/?controller=login&method=verificar_login" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="contraseña" class="form-label">Contraseña</label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Iniciar Sesión</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php?controller=registro&method=registro'">Registrarse</button>
                </div>
            </form>
        </div>
    </div>