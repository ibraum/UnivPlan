<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Ajouter un professeur</title>
  <script defer src="assets/js/ajouter_professeur.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center py-2 px-4">
  <div class="w-full max-w-md bg-white shadow-lg rounded p-8">
    <h1 class="text-3xl font-bold mb-4">Ajouter un professeur</h1>

    <form id="profForm" class="space-y-5">
      <div id="messageProf" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500 z-50"></div>

      <div>
        <label class="block text-gray-700 font-medium mb-1" for="nom_prof">Nom du professeur</label>
        <input type="text" name="nom_prof" id="nom_prof" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1" for="tel">Téléphone</label>
        <input type="tel" name="tel" id="tel" required pattern="^\+?\d{8,12}$"
               placeholder="+22812345678"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <button type="submit" class="w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-3 rounded shadow transition duration-300">
        Ajouter le professeur
      </button>
    </form>
  </div>

  <style>
    #messageProf.fade-in { opacity: 1; }
    #messageProf.fade-out { opacity: 0; }
  </style>
</body>
</html>
