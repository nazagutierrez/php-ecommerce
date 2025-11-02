<?php
require_once '../db_conexion.php';

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
  echo "<p class='text-center h-32 grid place-content-center text-gray-500 text-lg'>Tu carrito está vacío 🛒</p>";
  return;
}

$ids = implode(',', array_map('intval', $_SESSION['carrito']));
$stmt = $pdo->query("SELECT * FROM productos WHERE id IN ($ids)");
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="divide-y divide-neutral-200">
  <?php foreach ($cartItems as $cartItem): ?>
    <div class="p-6">
      <div class="flex flex-col sm:flex-row gap-6">
        <!-- Product image -->
        <div class="flex-shrink-0">
          <img src="<?= "/public" . htmlspecialchars($cartItem['imagen']) ?>" 
               alt="<?= htmlspecialchars($cartItem['nombre']) ?>" 
               class="w-full sm:w-32 h-32 rounded-xl object-cover border border-neutral-200">
        </div>

        <!-- Product details -->
        <div class="flex-1 min-w-0">
          <div class="flex justify-between items-start gap-4">
            <div class="flex-1">
              <h3 class="text-lg font-semibold text-neutral-900 mb-1">
                <?= htmlspecialchars($cartItem['nombre']) ?>
              </h3>
              <p class="text-sm text-neutral-600">
                <span class="font-medium text-neutral-900"><?= htmlspecialchars($cartItem['descripcion']) ?></span>
              </p>
            </div>

            <!-- Remove button -->
            <button 
              onclick="eliminarDelCarrito(<?= $cartItem['id'] ?>)" 
              class="flex-shrink-0 cursor-pointer p-2 text-neutral-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
              title="Eliminar del carrito"
              aria-label="Eliminar producto">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
              </svg>
            </button>
          </div>

          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-4 mt-4">
            <!-- Item subtotal -->
            <div class="text-right">
              <p class="text-sm text-neutral-600 mb-1">Subtotal</p>
              <p class="text-2xl font-bold text-neutral-900">
                $<?= htmlspecialchars($cartItem['precio']) ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Added JavaScript for quantity controls -->
<script>
  
  function eliminarDelCarrito(id) {
    fetch('../store/cart_actions.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'action=delete&id=' + encodeURIComponent(id)
    })
    .then(res => res.text())
    .then(data => {
      console.log(data);
      location.reload();
    });
  }
</script>

