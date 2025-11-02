<?php require_once '../includes/header.php'; ?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-slate-50 to-slate-100 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 py-20 md:py-28">
    <div class="max-w-3xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-bold text-slate-900 mb-6 leading-tight">
        Descubre productos excepcionales
      </h1>
      <p class="text-lg md:text-xl text-slate-600 mb-8 leading-relaxed">
        Explora nuestra colección cuidadosamente seleccionada de productos de alta calidad diseñados para mejorar tu vida diaria.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="#productos" class="inline-flex items-center justify-center px-8 py-3.5 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700 transition-colors">
          Ver productos
          <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </a>
        <a href="/pages/contact.php" class="inline-flex items-center justify-center px-8 py-3.5 bg-white text-slate-700 font-medium rounded-lg border border-slate-300 hover:bg-slate-50 transition-colors">
          Contáctanos
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Products Section -->
<main class="max-w-7xl mx-auto px-4 py-16" id="productos">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">
    <div>
      <h2 class="text-3xl font-bold text-slate-900 mb-2">Nuestros productos</h2>
      <p class="text-slate-600">Encuentra exactamente lo que necesitas</p>
    </div>
    
    <!-- Filter/Sort Options -->
    <div class="mt-6 md:mt-0 flex gap-3">
      <select class="px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition-colors">
        <option>Todos los productos</option>
        <option>Más vendidos</option>
        <option>Precio: Menor a mayor</option>
        <option>Precio: Mayor a menor</option>
      </select>
    </div>
  </div>

  <?php require_once '../includes/product-card.php'; ?>
</main>

<!-- Features Section -->
<section class="bg-slate-50 border-t border-slate-200">
  <div class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="text-center">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Calidad garantizada</h3>
        <p class="text-slate-600 text-sm">Productos seleccionados con los más altos estándares de calidad</p>
      </div>
      
      <div class="text-center">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Envío rápido</h3>
        <p class="text-slate-600 text-sm">Recibe tus productos en tiempo récord con nuestro servicio express</p>
      </div>
      
      <div class="text-center">
        <div class="inline-flex items-center justify-center w-12 h-12 bg-emerald-100 text-emerald-600 rounded-lg mb-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
          </svg>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">Pago seguro</h3>
        <p class="text-slate-600 text-sm">Transacciones protegidas con la mejor tecnología de seguridad</p>
      </div>
    </div>
  </div>
</section>

<?php require_once '../includes/footer.php'; ?>
