<?php
require_once '../db_conexion.php';

$query = $pdo->query("SELECT * FROM productos");
$productos = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
  <?php foreach ($productos as $producto) : ?>
    <div class="group bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-xl hover:border-slate-300 transition-all duration-300">
      <!-- Product Image -->
      <div class="relative aspect-square overflow-hidden bg-slate-100">
        <img 
          src="<?= "/public" . $producto['imagen'] ?>" 
          alt="<?= htmlspecialchars($producto['nombre']) ?>" 
          class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
        >
        
        <!-- Quick View Badge -->
        <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          <a href="/pages/product.php?id=<?= $producto['id'] ?>"  class="flex p-2 bg-white rounded-lg shadow-lg hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </a>
        </div>
      </div>

      <!-- Product Info -->
      <div class="p-5">
        <div class="mb-3">
          <h3 class="text-lg font-semibold text-slate-900 mb-1.5 line-clamp-1 group-hover:text-emerald-600 transition-colors">
            <?= htmlspecialchars($producto['nombre']) ?>
          </h3>
          <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
            <?= htmlspecialchars($producto['descripcion']) ?>
          </p>
        </div>

        <!-- Rating (placeholder) -->
        <div class="flex items-center gap-1 mb-4">
          <div class="flex text-amber-400">
            <?php for ($i = 0; $i < 5; $i++) : ?>
              <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
              </svg>
            <?php endfor; ?>
          </div>
          <span class="text-xs text-slate-500 ml-1">(4.8)</span>
        </div>

        <!-- Price and Action -->
        <div class="flex items-center justify-between gap-3">
          <div>
            <p class="text-2xl font-bold text-slate-900">
              $<?= number_format($producto['precio'], 2) ?>
            </p>
          </div>
          
          <button 
            onclick="agregarAlCarrito(<?= $producto['id'] ?>)" 
            class="flex-shrink-0 px-5 py-2.5 bg-emerald-600 text-white text-sm font-medium rounded-lg hover:bg-emerald-700 active:scale-95 transition-all duration-200 flex items-center gap-2 cursor-pointer"
          >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Agregar
          </button>
        </div>
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
    .then(data => {
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
</script>

<style>
  @keyframes slide-in {
    from {
      transform: translateX(100%);
      opacity: 0;
    }
    to {
      transform: translateX(0);
      opacity: 1;
    }
  }
  
  .animate-slide-in {
    animation: slide-in 0.3s ease-out;
  }
  
  .line-clamp-1 {
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
