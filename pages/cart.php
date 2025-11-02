<?php 
require_once '../includes/header.php'; 
require_once '../db_conexion.php';

$cartItems = []; // Inicializamos para que el HTML pueda usarlo

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $ids = implode(',', array_map('intval', $_SESSION['carrito']));
    $stmt = $pdo->query("SELECT * FROM productos WHERE id IN ($ids)");
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ahora $cartItems estará vacío si no hay productos, 
// pero el HTML de abajo igual se renderiza

function getTotalPrice($cartItems) {
    $total = 0;
    foreach ($cartItems as $cartItem) {
        $total += $cartItem['precio'];
    }
    return $total;
}

?>

<main class="min-h-screen bg-neutral-50 py-8 md:py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Added breadcrumb navigation -->
    <div class="mb-6">
      <a href="/" class="text-sm text-neutral-600 hover:text-neutral-900 transition">
        Inicio
      </a>
      <span class="text-neutral-400 mx-2">/</span>
      <span class="text-sm text-neutral-900 font-medium">Carrito de compras</span>
    </div>

    <!-- Updated heading with better typography -->
    <h1 class="text-3xl md:text-4xl font-bold text-neutral-900 mb-8 text-balance">
      Tu carrito
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Cart items section with improved layout -->
      <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl border border-neutral-200 overflow-hidden">
          <?php require_once '../includes/cart-item.php'; ?>
        </div>

        <!-- Added continue shopping link -->
        <a href="/pages/products.php" 
           class="inline-flex items-center gap-2 mt-6 text-neutral-700 hover:text-neutral-900 transition group">
          <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
          Continuar comprando
        </a>
      </div>

      <!-- Order summary sidebar with detailed breakdown -->
      <div class="lg:col-span-1 h-[800px]">
        <div class="bg-white rounded-2xl border border-neutral-200 p-6 sticky top-20">
          <h2 class="text-xl font-bold text-neutral-900 mb-6">Resumen del pedido</h2>
          
          <div class="space-y-4 mb-6">
            <div class="flex justify-between text-neutral-700">
              <span>Subtotal</span>
              <span class="font-medium"><?= number_format(getTotalPrice($cartItems), 2) ?></span>
            </div>
            
            <div class="flex justify-between text-neutral-700">
              <span>Envío</span>
              <span class="font-medium text-emerald-600">Gratis</span>
            </div>
          </div>

          <div class="border-t border-neutral-200 pt-4 mb-6">
            <div class="flex justify-between items-baseline">
              <span class="text-lg font-semibold text-neutral-900">Total</span>
              <span class="text-3xl font-bold text-neutral-900"><?= number_format(getTotalPrice($cartItems), 2) ?></span>
            </div>
          </div>

          <a href="/pages/checkout.php"
             class="block w-full bg-neutral-900 text-white text-center py-4 rounded-xl font-semibold hover:bg-neutral-800 transition shadow-sm">
            Finalizar compra
          </a>

          <!-- Added trust badges -->
          <div class="mt-6 pt-6 border-t border-neutral-200">
            <div class="flex items-center gap-3 text-sm text-neutral-600">
              <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
              </svg>
              <span>Compra 100% segura</span>
            </div>
            
            <div class="flex items-center gap-3 text-sm text-neutral-600 mt-3">
              <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
              </svg>
              <span>Devoluciones en 30 días</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require_once '../includes/footer.php'; ?>