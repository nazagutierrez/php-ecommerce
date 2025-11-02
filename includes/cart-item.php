<?php
require_once '../includes/header.php';
require_once '../db_conexion.php';

// Verificar si el carrito existe y no está vacío
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
  echo "<p class='text-center mt-8 text-gray-600'>Tu carrito está vacío 🛒</p>";
  exit;
}

// Convertir los IDs del carrito a una cadena separada por comas
$ids = implode(',', array_map('intval', $_SESSION['carrito']));

// Consulta solo los productos que estén en el carrito
$stmt = $pdo->query("SELECT * FROM productos WHERE id IN ($ids)");
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="w-full max-w-5xl mx-auto">
  <h2 class="text-2xl font-bold mb-6 text-center">🛒 Tu carrito</h2>

  <?php foreach ($cartItems as $cartItem): ?>
    <div class="flex w-full items-center justify-between border-b last:border-0 py-3">
      <div class="flex w-[150px] items-center space-x-3">
        <img src="<?= "/public" . htmlspecialchars($cartItem['imagen']) ?>" 
             alt="<?= htmlspecialchars($cartItem['nombre']) ?>" 
             class="w-16 h-16 rounded object-cover">
        <div>
          <h3 class="font-semibold"><?= htmlspecialchars($cartItem['nombre']) ?></h3>
          <p class="text-gray-600 text-sm">$<?= htmlspecialchars($cartItem['precio']) ?></p>
        </div>
      </div>

      <div class="flex items-center space-x-3">
        <p class="font-bold underline underline-offset-4 decoration-blue-600">$<?= htmlspecialchars($cartItem['precio']) ?></p>
      </div>

      <div>
        <button 
          onclick="eliminarDelCarrito(<?= $cartItem['id'] ?>)" 
          class="w-16 h-16 bg-red-300 text-black py-2 rounded hover:bg-red-700 transition">
          X
        </button>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<script>
  function eliminarDelCarrito(id) {
    fetch('../store/cart_actions.php', {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(res => res.text())
    .then(data => {
      console.log(data);
      location.reload(); // ✅ Refresca la página para mostrar los cambios
    });
  }
</script>
