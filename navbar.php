<?php
require_once 'db_conexion.php';

session_start();

$arrayLength = count($_SESSION['carrito'] ?? []);

?>


<nav class="bg-white border-b border-neutral-200 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      
      <!-- Logo -->
      <a href="/" class="flex items-center space-x-2 group">
        <div class="w-8 h-8 bg-neutral-900 rounded-lg flex items-center justify-center">
          <span class="text-white font-bold text-sm">TN</span>
        </div>
        <span class="text-xl font-semibold text-neutral-900 tracking-tight">PHPealo</span>
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex items-center space-x-3">
        <a href="/" class="text-sm px-3 py-2 rounded-lg font-medium hover:bg-neutral-100 text-neutral-600 hover:text-neutral-900 transition-colors">
          Inicio
        </a>
        <a href="/pages/cart.php" class="text-sm px-3 py-2 rounded-lg font-medium hover:bg-neutral-100 text-neutral-600 hover:text-neutral-900 transition-colors">
          Carrito
        </a>
        <a href="/pages/contact.php" class="text-sm px-3 py-2 rounded-lg font-medium hover:bg-neutral-100 text-neutral-600 hover:text-neutral-900 transition-colors">
          Contacto
        </a>
      </div>

      <!-- Right Side Actions -->
      <div class="flex items-center space-x-4">
        <!-- Cart Button -->
        <a href="/pages/cart.php" class="relative group">
          <div class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-neutral-100 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-700 group-hover:text-neutral-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <span class="hidden sm:inline text-sm font-medium text-neutral-700 group-hover:text-neutral-900">Carrito</span>
            <!-- Badge -->
            <span id="cart-badge" class="<?= $arrayLength == 0 ? "hidden" : "block" ?> absolute -top-1 -right-1 bg-neutral-900 text-white text-xs font-semibold rounded-full w-5 h-5 flex items-center justify-center">
              <?= $arrayLength ?>
            </span>
          </div>
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-neutral-100 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-neutral-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden border-t border-neutral-200 bg-white">
    <div class="px-4 py-4 space-y-3">
      <a href="/" class="block px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-100 rounded-lg transition-colors">
        Inicio
      </a>
      <a href="/pages/cart.php" class="block px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-100 rounded-lg transition-colors">
        Carrito
      </a>
      <a href="/pages/contact.php" class="block px-4 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-100 rounded-lg transition-colors">
        Contacto
      </a>
    </div>
  </div>
</nav>

<script>
  function updateCartBadge() {
    fetch('/store/cart_count.php')
      .then(res => res.text())
      .then(count => {
        const badge = document.getElementById('cart-badge');
        badge.textContent = count;
        if (count == 0) badge.classList.add('hidden');
        else badge.classList.remove('hidden');
      });
  }
  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  
  mobileMenuButton?.addEventListener('click', () => {
    mobileMenu?.classList.toggle('hidden');
  });
</script>
