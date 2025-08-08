<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Ajouter un module - Emploi du temps</title>
  <script defer src="assets/js/ajouter_module.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center py-10 px-4">
  <div class="w-full max-w-md bg-white shadow-lg rounded p-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter un module</h1>

    <form id="moduleForm" class="space-y-5">
      <div id="message" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500 z-50"></div>

      <div>
        <label for="id_module" class="block mb-1 font-medium text-gray-700">ID Module</label>
        <input type="text" id="id_module" name="id_module" required maxlength="15" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="nom_module" class="block mb-1 font-medium text-gray-700">Nom du module</label>
        <input type="text" id="nom_module" name="nom_module" required maxlength="25" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" />
      </div>

      <div>
        <label for="description" class="block mb-1 font-medium text-gray-700">Description (optionnel)</label>
        <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500"></textarea>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded shadow transition duration-300">
        Ajouter le module
      </button>
    </form>
  </div>

  <style>
    #message.fade-in { opacity: 1; }
    #message.fade-out { opacity: 0; }
  </style>
</body>
</html>
