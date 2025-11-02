<?php
require_once '../includes/header.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    
    // Inicializar el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Agregar el producto al carrito
    if (in_array($id, $_SESSION['carrito'])) {
        echo "Producto $id ya existe en el carrito";
        exit;
    }

    $_SESSION['carrito'][] = $id;

    echo "Producto $id agregado al carrito";
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // PHP no soporta automáticamente $_POST con DELETE
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = $_DELETE['id'] ?? null;

    if (!$id) {
        echo "ID no recibido";
        exit;
    }

    // Verificar si existe
    if (!isset($_SESSION['carrito']) || !in_array($id, $_SESSION['carrito'])) {
        echo "Producto $id no existe en el carrito";
        exit;
    }

    // Buscar y eliminar por valor
    $_SESSION['carrito'] = array_filter($_SESSION['carrito'], fn($item) => $item != $id);

    echo "Producto $id eliminado del carrito";
}
?>