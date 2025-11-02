<?php require_once '../includes/header.php'; 

session_start();

?>

<main class="max-w-4xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Tu carrito</h1>
  <div class="bg-white p-6 rounded-lg shadow">
    <?php require_once '../includes/cart-item.php'; ?>

    <div class="flex justify-between items-center mt-6 border-t pt-4">
      <p class="text-lg font-semibold">Total:</p>
      <p class="text-2xl font-bold text-blue-600">$59.98</p>
    </div>
    <a href="/pages/checkout.php" class="block mt-6 bg-blue-600 text-white text-center py-3 rounded hover:bg-blue-700 transition">Finalizar compra</a>
  </div>
</main>

<?php require_once '../includes/footer.php'; ?>
