<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start(); // Debe estar al principio del archivo

$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Tu usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
$dbname = "veterinaria"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'] ?? ''; // Usar un valor por defecto si no se recibe
$contrasena = $_POST['contrasena'] ?? '';

// Consulta para verificar el usuario
$sql = "SELECT id_usuario, nombre, perfil FROM Usuarios WHERE email = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $contrasena);
$stmt->execute();
$stmt->store_result();

// Verificar si se encontró un usuario
if ($stmt->num_rows > 0) {
    // Guardar datos en la sesión
    $stmt->bind_result($id_usuario, $nombre, $perfil);
    $stmt->fetch();
    
    // Elimina espacios en blanco
    $perfil = trim($perfil);

    // Mostrar el perfil para depuración
    echo "Perfil encontrado: " . $perfil . "<br>";

    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['perfil'] = $perfil;
    
    // Redirigir según el perfil
    switch ($perfil) {
        case 'Auxiliar Veterinario':
            header("Location: auxiliar.php");
            exit();
        case 'Recepcionista':
            header("Location: recepcionista.php");
            exit();
        case 'Peluquero Canino':
            header("Location: peluquero.php");
            exit();
        case 'Webmaster':
            header("Location: webmaster.php");
            exit();
        default:
            echo "Perfil no reconocido.";
            exit();
    }
} else {
    echo "Email o contraseña incorrectos.";
}

$stmt->close();
$conn->close();
?>

