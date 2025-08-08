<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Ajouter une filière</title>
  <script defer src="assets/js/ajouter_filiere.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center p-4">
  <div class="w-full max-w-md bg-white rounded shadow-lg p-6">
    <h1 class="text-2xl font-bold mb-4 text-center">Ajouter une filière</h1>

    <form id="filiereForm" class="space-y-5">
      <div id="message" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500 z-50"></div>

      <div>
        <label for="nom_filiere" class="block text-gray-700 font-medium mb-1">Nom de la filière *</label>
        <input type="text" id="nom_filiere" name="nom_filiere" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded shadow transition duration-300">
        Ajouter la filière
      </button>
    </form>
  </div>

  <style>
    #message.fade-in {opacity: 1;}
    #message.fade-out {opacity: 0;}
  </style>
</body>
</html>
