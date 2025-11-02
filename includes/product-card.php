
<?php
require_once '../db_conexion.php';

$query = $pdo->query("SELECT * FROM productos");
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="grid w-full grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php foreach ($productos as $producto) : ?>
    <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
      <img src="<?= "/public" . $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" class="w-full h-60 object-cover">
      <div class="p-4">
        <h3 class="text-lg font-semibold"><?= $producto['nombre'] ?></h3>
        <p class="text-gray-600 text-sm mb-2"><?= $producto['descripcion'] ?></p>
        <p class="font-bold text-blue-600 mb-3">$<?= $producto['precio'] ?></p>
        <button onclick="agregarAlCarrito(<?= $producto['id'] ?>)" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
          Agregar al carrito
        </button>
    </div>
    </div>
  <?php endforeach; ?>
</div>


<script>
  function agregarAlCarrito(id) {
    fetch('../store/cart_actions.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(res => res.text())
    .then(data => console.log(data));
  }
</script>