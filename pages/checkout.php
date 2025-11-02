<?php require_once __DIR__ . '/includes/header.php'; ?>

<main class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Finalizar compra</h1>
  <form class="bg-white p-6 rounded-lg shadow space-y-4">
    <div>
      <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
      <input type="text" class="w-full border rounded p-2">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Email</label>
      <input type="email" class="w-full border rounded p-2">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Dirección</label>
      <input type="text" class="w-full border rounded p-2">
    </div>
    <button class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">Pagar</button>
  </form>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
