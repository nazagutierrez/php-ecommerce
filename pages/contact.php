<?php require_once __DIR__ . '/../includes/header.php'; ?>

<main class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Contacto</h1>

  <p class="mb-6 text-gray-600">
    ¿Tenés alguna duda o consulta? ¡Escribinos y te responderemos lo antes posible!
  </p>

  <form class="bg-white p-6 rounded-lg shadow space-y-4">
    <!-- Nombre -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
      <input type="text" placeholder="Tu nombre" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Email</label>
      <input type="email" placeholder="tuemail@example.com" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    <!-- Asunto -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Asunto</label>
      <input type="text" placeholder="Motivo de tu consulta" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    <!-- Mensaje -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Mensaje</label>
      <textarea placeholder="Escribí tu mensaje aquí..." class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-600 h-32"></textarea>
    </div>

    <!-- Botón enviar -->
    <button class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">
      Enviar mensaje
    </button>
  </form>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
