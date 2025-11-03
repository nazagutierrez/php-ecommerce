<?php
require_once '../includes/header.php';
require_once '../db_conexion.php';

if (!isset($_GET['id'])) {
  echo "<p>Producto no encontrado.</p>";
  exit;
}

$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
  echo "<p>Producto no encontrado.</p>";
  exit;
}
?>

<main class="bg-neutral-50 min-h-screen">
  <!-- Breadcrumb -->
  <div class="bg-white border-b border-neutral-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
      <nav class="flex items-center space-x-2 text-sm text-neutral-600">
        <a href="/pages/home.php" class="hover:text-emerald-600 transition-colors">Inicio</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <a href="/pages/home.php" class="hover:text-emerald-600 transition-colors">Productos</a>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-neutral-900 font-medium"><?= htmlspecialchars($producto['nombre']) ?></span>
      </nav>
    </div>
  </div>

  <!-- Product Detail -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Image Gallery -->
      <div class="space-y-4">
        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-neutral-200 aspect-square">
          <img 
            id="mainImage"
            src="<?= "/public" . htmlspecialchars($producto['imagen']) ?>" 
            alt="<?= htmlspecialchars($producto['nombre']) ?>" 
            class="w-full h-full object-cover hover:scale-105 transition-transform duration-500 cursor-zoom-in"
          >
        </div>
        
        <!-- Thumbnail Gallery -->
        <div class="grid grid-cols-4 gap-3">
          <button class="bg-white rounded-lg overflow-hidden border-2 border-emerald-600 shadow-sm aspect-square">
            <img 
              src="<?= "/public" . htmlspecialchars($producto['imagen']) ?>" 
              alt="Vista 1" 
              class="w-full h-full object-cover"
            >
          </button>
          <button class="bg-white rounded-lg overflow-hidden border-2 border-neutral-200 hover:border-emerald-600 transition-colors shadow-sm aspect-square">
            <img 
              src="<?= "/public" . htmlspecialchars($producto['imagen']) ?>" 
              alt="Vista 2" 
              class="w-full h-full object-cover"
            >
          </button>
          <button class="bg-white rounded-lg overflow-hidden border-2 border-neutral-200 hover:border-emerald-600 transition-colors shadow-sm aspect-square">
            <img 
              src="<?= "/public" . htmlspecialchars($producto['imagen']) ?>" 
              alt="Vista 3" 
              class="w-full h-full object-cover"
            >
          </button>
          <button class="bg-white rounded-lg overflow-hidden border-2 border-neutral-200 hover:border-emerald-600 transition-colors shadow-sm aspect-square">
            <img 
              src="<?= "/public" . htmlspecialchars($producto['imagen']) ?>" 
              alt="Vista 4" 
              class="w-full h-full object-cover"
            >
          </button>
        </div>
      </div>

      <!-- Product Info -->
      <div class="space-y-6">
        <!-- Stock Badge -->
        <div class="flex items-center gap-2">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 text-sm font-medium rounded-full">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            En stock
          </span>
        </div>

        <div>
          <h1 class="text-4xl font-bold text-neutral-900 mb-3 leading-tight"><?= htmlspecialchars($producto['nombre']) ?></h1>
          
          <!-- Rating -->
          <div class="flex items-center gap-3 mb-4">
            <div class="flex items-center gap-1">
              <?php for($i = 0; $i < 5; $i++): ?>
                <svg class="w-5 h-5 <?= $i < 4 ? 'text-amber-400' : 'text-neutral-300' ?>" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
              <?php endfor; ?>
            </div>
            <span class="text-sm text-neutral-600">(4.0) 128 reseñas</span>
          </div>
        </div>

        <p class="text-lg text-neutral-600 leading-relaxed"><?= htmlspecialchars($producto['descripcion']) ?></p>

        <!-- Price -->
        <div class="border-t border-neutral-300 py-6">
          <div class="flex items-baseline gap-3">
            <span class="text-4xl font-bold text-neutral-900">$<?= htmlspecialchars($producto['precio']) ?></span>
            <span class="text-lg text-neutral-500 line-through">$<?= number_format($producto['precio'] * 1.2, 2) ?></span>
            <span class="px-2.5 py-1 bg-red-100 text-red-700 text-sm font-semibold rounded-md">-20%</span>
          </div>
          <p class="text-sm text-neutral-600 mt-2">IVA incluido. Envío calculado al finalizar la compra.</p>
        </div>

        <!-- Quantity & Add to Cart -->
		<form id="addToCart">
  		  <input type="hidden" name="id" value="<?= $producto['id'] ?>">

          <div class="flex gap-3">
            <button 
              type="submit"
              class="flex-1 bg-emerald-600 cursor-pointer text-white px-8 py-4 rounded-xl font-semibold hover:bg-emerald-700 transition-colors shadow-lg shadow-emerald-600/30 flex items-center justify-center gap-2"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
              Agregar al carrito
            </button>
            <button 
              type="button"
              class="w-14 h-14 cursor-pointer flex items-center justify-center border-2 border-neutral-300 rounded-xl hover:border-emerald-600 hover:text-emerald-600 transition-colors"
            >
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
              </svg>
            </button>
          </div>
        </form>

        <!-- Features -->
        <div class="grid grid-cols-2 gap-4 pt-6">
          <div class="flex items-start gap-3 p-4 bg-neutral-50 rounded-lg">
            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
            </svg>
            <div>
              <p class="font-semibold text-neutral-900 text-sm">Envío gratis</p>
              <p class="text-xs text-neutral-600">En pedidos +$50</p>
            </div>
          </div>
          <div class="flex items-start gap-3 p-4 bg-neutral-50 rounded-lg">
            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <div>
              <p class="font-semibold text-neutral-900 text-sm">Garantía 2 años</p>
              <p class="text-xs text-neutral-600">Protección total</p>
            </div>
          </div>
          <div class="flex items-start gap-3 p-4 bg-neutral-50 rounded-lg">
            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            <div>
              <p class="font-semibold text-neutral-900 text-sm">Devoluciones</p>
              <p class="text-xs text-neutral-600">30 días gratis</p>
            </div>
          </div>
          <div class="flex items-start gap-3 p-4 bg-neutral-50 rounded-lg">
            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
            </svg>
            <div>
              <p class="font-semibold text-neutral-900 text-sm">Pago seguro</p>
              <p class="text-xs text-neutral-600">SSL encriptado</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Product Details Tabs -->
    <div class="mt-16">
      <div class="border-b border-neutral-200">
        <nav class="flex gap-8">
          <button 
            onclick="showTab('description')"
            id="tab-description"
            class="tab-button cursor-pointer py-4 px-2 border-b-2 border-emerald-600 text-emerald-600 font-semibold"
          >
            Descripción
          </button>
          <button 
            onclick="showTab('specifications')"
            id="tab-specifications"
            class="tab-button cursor-pointer py-4 px-2 border-b-2 border-transparent text-neutral-600 hover:text-neutral-900 font-semibold"
          >
            Especificaciones
          </button>
          <button 
            onclick="showTab('reviews')"
            id="tab-reviews"
            class="tab-button cursor-pointer py-4 px-2 border-b-2 border-transparent text-neutral-600 hover:text-neutral-900 font-semibold"
          >
            Reseñas (128)
          </button>
        </nav>
      </div>

      <div class="py-8">
        <!-- Description Tab -->
        <div id="content-description" class="tab-content">
          <div class="max-w-3xl">
            <h3 class="text-2xl font-bold text-neutral-900 mb-4">Acerca de este producto</h3>
            <p class="text-neutral-600 leading-relaxed mb-6">
              <?= htmlspecialchars($producto['descripcion']) ?>
            </p>
            <ul class="space-y-3">
              <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-neutral-700">Materiales de alta calidad y durabilidad garantizada</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-neutral-700">Diseño moderno y funcional para uso diario</span>
              </li>
              <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-neutral-700">Fácil mantenimiento y limpieza</span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Specifications Tab -->
        <div id="content-specifications" class="tab-content hidden">
          <div class="max-w-3xl">
            <h3 class="text-2xl font-bold text-neutral-900 mb-6">Especificaciones técnicas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="p-4 bg-neutral-50 rounded-lg">
                <p class="text-sm text-neutral-600 mb-1">SKU</p>
                <p class="font-semibold text-neutral-900">PROD-<?= str_pad($producto['id'], 6, '0', STR_PAD_LEFT) ?></p>
              </div>
              <div class="p-4 bg-neutral-50 rounded-lg">
                <p class="text-sm text-neutral-600 mb-1">Categoría</p>
                <p class="font-semibold text-neutral-900">Electrónica</p>
              </div>
              <div class="p-4 bg-neutral-50 rounded-lg">
                <p class="text-sm text-neutral-600 mb-1">Peso</p>
                <p class="font-semibold text-neutral-900">1.2 kg</p>
              </div>
              <div class="p-4 bg-neutral-50 rounded-lg">
                <p class="text-sm text-neutral-600 mb-1">Dimensiones</p>
                <p class="font-semibold text-neutral-900">25 x 15 x 10 cm</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Reviews Tab -->
        <div id="content-reviews" class="tab-content hidden">
          <div class="max-w-3xl">
            <h3 class="text-2xl font-bold text-neutral-900 mb-6">Reseñas de clientes</h3>
            
            <!-- Review Summary -->
            <div class="bg-neutral-50 rounded-xl p-6 mb-8">
              <div class="flex items-center gap-6">
                <div class="text-center">
                  <p class="text-5xl font-bold text-neutral-900">4.0</p>
                  <div class="flex items-center gap-1 mt-2">
                    <?php for($i = 0; $i < 5; $i++): ?>
                      <svg class="w-5 h-5 <?= $i < 4 ? 'text-amber-400' : 'text-neutral-300' ?>" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                      </svg>
                    <?php endfor; ?>
                  </div>
                  <p class="text-sm text-neutral-600 mt-1">128 reseñas</p>
                </div>
                <div class="flex-1 space-y-2">
                  <?php 
                  $ratings = [
                    5 => 75,
                    4 => 15,
                    3 => 5,
                    2 => 3,
                    1 => 2
                  ];
                  foreach($ratings as $star => $percent): 
                  ?>
                    <div class="flex items-center gap-3">
                      <span class="text-sm text-neutral-600 w-12"><?= $star ?> estrellas</span>
                      <div class="flex-1 h-2 bg-neutral-200 rounded-full overflow-hidden">
                        <div class="h-full bg-amber-400 rounded-full" style="width: <?= $percent ?>%"></div>
                      </div>
                      <span class="text-sm text-neutral-600 w-12 text-right"><?= $percent ?>%</span>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Individual Reviews -->
            <div class="space-y-6">
              <?php for($i = 0; $i < 3; $i++): ?>
                <div class="border-b border-neutral-200 pb-6">
                  <div class="flex items-start justify-between mb-3">
                    <div>
                      <div class="flex items-center gap-2 mb-1">
                        <p class="font-semibold text-neutral-900">Cliente Verificado</p>
                        <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-medium rounded">Verificado</span>
                      </div>
                      <div class="flex items-center gap-1">
                        <?php for($j = 0; $j < 5; $j++): ?>
                          <svg class="w-4 h-4 <?= $j < 4 ? 'text-amber-400' : 'text-neutral-300' ?>" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                          </svg>
                        <?php endfor; ?>
                      </div>
                    </div>
                    <span class="text-sm text-neutral-500">Hace 2 días</span>
                  </div>
                  <p class="text-neutral-700 leading-relaxed">
                    Excelente producto, superó mis expectativas. La calidad es notable y el envío fue muy rápido. Totalmente recomendado.
                  </p>
                </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script>
    
document.getElementById('addToCart').addEventListener('submit', e => {
  e.preventDefault();
  const id = e.target.querySelector('[name="id"]').value;
    
    fetch('../store/cart_actions.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'action=add&id=' + encodeURIComponent(id),
    })
    .then(res => res.text())
    .then(data => {
      updateCartBadge();
      console.log(data);
      // Show success notification
      const notification = document.createElement('div');
      notification.className = 'fixed top-4 right-4 bg-emerald-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-in';
      notification.innerHTML = `
        <div class="flex items-center gap-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          <span class="font-medium">Producto agregado al carrito</span>
        </div>
      `;
      document.body.appendChild(notification);
      
      setTimeout(() => {
        notification.remove();
      }, 3000);
    })
    .catch(error => console.error('Error:', error));
  }
);

function showTab(tabName) {
  // Hide all tab contents
  document.querySelectorAll('.tab-content').forEach(content => {
    content.classList.add('hidden');
  });
  
  // Remove active state from all tabs
  document.querySelectorAll('.tab-button').forEach(button => {
    button.classList.remove('border-emerald-600', 'text-emerald-600');
    button.classList.add('border-transparent', 'text-neutral-600');
  });
  
  // Show selected tab content
  document.getElementById('content-' + tabName).classList.remove('hidden');
  
  // Add active state to selected tab
  const activeTab = document.getElementById('tab-' + tabName);
  activeTab.classList.remove('border-transparent', 'text-neutral-600');
  activeTab.classList.add('border-emerald-600', 'text-emerald-600');
}
</script>

<?php require_once '../includes/footer.php'; ?>
