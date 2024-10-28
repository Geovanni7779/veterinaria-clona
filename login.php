<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Veterinaria</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8; /* Color de fondo suave */
            margin: 0;
            padding: 0;
        }

        /* Contenedor principal */
        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white; /* Fondo blanco para el formulario */
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        h2 {
            text-align: center;
            color: #007bff; /* Color azul para el encabezado */
            margin-bottom: 20px;
        }

        /* Estilos para el formulario */
        .login-form {
            display: flex;
            flex-direction: column; /* Disposición vertical */
        }

        label {
            margin-bottom: 5px; /* Espaciado entre etiquetas y campos */
            font-weight: bold; /* Negrita para las etiquetas */
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px; /* Espaciado interno */
            border: 1px solid #ddd; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
            margin-bottom: 15px; /* Espacio entre campos */
            font-size: 14px; /* Tamaño de fuente */
        }

        button {
            padding: 10px; /* Espaciado interno del botón */
            background-color: #007bff; /* Color azul */
            color: white; /* Texto blanco */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            font-size: 16px; /* Tamaño de fuente */
            cursor: pointer; /* Cambia el cursor al pasar el ratón */
            transition: background-color 0.3s; /* Transición suave */
        }

        button:hover {
            background-color: #0056b3; /* Color más oscuro al pasar el ratón */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>INICIO DE SESION VETERINARIA</h2>
        <form action="procesar_login.php" method="POST" class="login-form">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
