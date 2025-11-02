<?php require_once __DIR__ . '/../includes/header.php'; ?>

<main class="max-w-6xl mx-auto px-4 py-16">
  <!-- Header Section -->
  <div class="text-center mb-12">
    <h1 class="text-4xl md:text-5xl font-bold text-neutral-900 mb-4">Contactanos</h1>
    <p class="text-lg text-neutral-600 max-w-2xl mx-auto">
      ¿Tenés alguna duda o consulta? Estamos acá para ayudarte. Escribinos y te responderemos lo antes posible.
    </p>
  </div>

  <div class="grid md:grid-cols-2 gap-12">
    <!-- Contact Form -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-neutral-200">
      <h2 class="text-2xl font-bold text-neutral-900 mb-6">Envianos un mensaje</h2>
      
      <form class="space-y-5" id="contactForm">
        <!-- Name -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-2">
            Nombre completo <span class="text-red-500">*</span>
          </label>
          <input 
            type="text" 
            name="name"
            placeholder="Juan Pérez" 
            required
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
          >
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-2">
            Email <span class="text-red-500">*</span>
          </label>
          <input 
            type="email" 
            name="email"
            placeholder="juan@ejemplo.com" 
            required
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
          >
        </div>

        <!-- Phone -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-2">
            Teléfono <span class="text-neutral-400 text-xs">(opcional)</span>
          </label>
          <input 
            type="tel" 
            name="phone"
            placeholder="+54 9 11 1234-5678" 
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
          >
        </div>

        <!-- Subject -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-2">
            Asunto <span class="text-red-500">*</span>
          </label>
          <select 
            name="subject"
            required
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
          >
            <option value="">Seleccioná un motivo</option>
            <option value="consulta">Consulta general</option>
            <option value="pedido">Consulta sobre pedido</option>
            <option value="producto">Consulta sobre producto</option>
            <option value="devolucion">Devolución o cambio</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <!-- Message -->
        <div>
          <label class="block text-sm font-medium text-neutral-700 mb-2">
            Mensaje <span class="text-red-500">*</span>
          </label>
          <textarea 
            name="message"
            placeholder="Escribí tu mensaje aquí..." 
            required
            rows="5"
            class="w-full px-4 py-3 border border-neutral-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all resize-none"
          ></textarea>
        </div>

        <!-- Submit Button -->
        <button 
          type="submit"
          class="w-full bg-emerald-500 hover:bg-emerald-600 text-white py-3.5 rounded-lg font-semibold transition-colors flex items-center justify-center gap-2"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
          Enviar mensaje
        </button>
      </form>
    </div>

    <!-- Contact Information -->
    <div class="space-y-6">
      <!-- Contact Cards -->
      <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-8 rounded-2xl border border-emerald-200">
        <div class="flex items-start gap-4 mb-6">
          <div class="w-12 h-12 bg-emerald-500 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h3 class="font-semibold text-neutral-900 mb-1">Email</h3>
            <p class="text-neutral-600 text-sm mb-2">Escribinos directamente</p>
            <a href="mailto:info@phpealo.com" class="text-emerald-600 hover:text-emerald-700 font-medium">
              info@phpealo.com
            </a>
          </div>
        </div>
      </div>

      <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl border border-blue-200">
        <div class="flex items-start gap-4 mb-6">
          <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <h3 class="font-semibold text-neutral-900 mb-1">Teléfono</h3>
            <p class="text-neutral-600 text-sm mb-2">Lun a Vie de 9 a 18hs</p>
            <a href="tel:+541112345678" class="text-blue-600 hover:text-blue-700 font-medium">
              +54 9 11 1234-5678
            </a>
          </div>
        </div>
      </div>

      <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl border border-purple-200">
        <div class="flex items-start gap-4 mb-6">
          <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <div>
            <h3 class="font-semibold text-neutral-900 mb-1">Ubicación</h3>
            <p class="text-neutral-600 text-sm mb-2">Visitanos en nuestra tienda</p>
            <p class="text-purple-600 font-medium">
              Av. Corrientes 1234<br>
              Buenos Aires, Argentina
            </p>
          </div>
        </div>
      </div>

      <!-- FAQ Link -->
      <div class="bg-neutral-50 p-6 rounded-xl border border-neutral-200">
        <h3 class="font-semibold text-neutral-900 mb-2">¿Buscás respuestas rápidas?</h3>
        <p class="text-sm text-neutral-600 mb-4">
          Visitá nuestra sección de preguntas frecuentes para encontrar respuestas inmediatas.
        </p>
        <a href="#" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium text-sm">
          Ver preguntas frecuentes
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>
  </div>

  <!-- Success Message (hidden by default) -->
  <div id="successMessage" class="hidden fixed bottom-4 right-4 bg-emerald-500 text-white px-6 py-4 rounded-lg shadow-lg flex items-center gap-3">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    <span>¡Mensaje enviado con éxito!</span>
  </div>
</main>

<script>
// Form submission handler
document.getElementById('contactForm')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Show success message
  const successMsg = document.getElementById('successMessage');
  successMsg.classList.remove('hidden');
  
  // Reset form
  this.reset();
  
  // Hide success message after 3 seconds
  setTimeout(() => {
    successMsg.classList.add('hidden');
  }, 3000);
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
