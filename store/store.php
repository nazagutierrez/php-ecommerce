<?php
session_start(); // Siempre al inicio del script

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar producto al carrito (ejemplo)
if (isset($_POST['producto_id'])) {
    $id = $_POST['producto_id'];
    $_SESSION['carrito'][] = $id;
}

// Mostrar carrito
echo "<pre>";
print_r($_SESSION['carrito']);
echo "</pre>";
?>