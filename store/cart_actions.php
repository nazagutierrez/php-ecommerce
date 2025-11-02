<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  $id = intval($_POST['id'] ?? 0);

  if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
  }

  if ($action === 'add') {
    if (!in_array($id, $_SESSION['carrito'])) {
      $_SESSION['carrito'][] = $id;
      echo "Producto $id agregado";
    } else {
      echo "Ya estaba en el carrito";
    }
  } elseif ($action === 'delete') {
    $_SESSION['carrito'] = array_filter($_SESSION['carrito'], fn($item) => $item != $id);
    echo "Producto $id eliminado";
  } else {
    echo "Acción no válida";
  }
}
?>