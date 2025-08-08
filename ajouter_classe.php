<?php require_once "php/all_filieres.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Ajouter une classe - Emploi du temps</title>
  <script defer src="assets/js/ajouter_classe.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center p-4">
  <div class="w-full max-w-md bg-white shadow-lg rounded p-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter une classe</h1>

    <form id="classeForm" class="space-y-6">
      <div id="message" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500 z-50"></div>

      <div>
        <label for="id_filiere" class="block text-gray-700 font-medium mb-1">Filière</label>
        <select name="id_filiere" id="id_filiere" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="" disabled selected>Choisir une filière</option>
          <?php
            foreach ($filieres as $filiere) {
              echo "<option value=\"{$filiere['ID_FILIERE']}\">{$filiere['NOM_FILIERE']}</option>";
            }
          ?>
        </select>
      </div>

      <div>
        <label for="niveau" class="block text-gray-700 font-medium mb-1">Niveau</label>
        <input type="number" name="niveau" id="niveau" min="1" max="10" required placeholder="Ex: 1, 2, 3..." class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded shadow transition duration-300">
        Ajouter la classe
      </button>
    </form>
  </div>

  <style>
    #message.fade-in {opacity: 1;}
    #message.fade-out {opacity: 0;}
  </style>
</body>
</html>
