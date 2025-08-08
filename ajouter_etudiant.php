<?php require_once "php/all_classes.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un étudiant</title>
  <script defer src="assets/js/ajouter_etudiant.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
  <div class="w-full max-w-lg bg-white shadow-lg rounded p-6">
    <h1 class="text-2xl font-bold mb-4 text-center text-gray-800">Ajouter un étudiant</h1>

    <form id="etudiantForm" class="space-y-4">
      <div id="message" class="hidden fixed top-4 z-50 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500"></div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Numéro d'inscription</label>
        <input type="text" name="num_inscription" required class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Nom</label>
        <input type="text" name="nom_et" required class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Prénom</label>
        <input type="text" name="prenom_et" required class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Adresse</label>
        <input type="text" name="adresse" class="w-full border rounded px-3 py-2">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Classe</label>
        <select name="id_classe" required class="w-full border rounded px-3 py-2">
          <?php
            foreach ($classes as $classe) {
              echo "<option value=\"{$classe['ID_CLASSE']}\">Classe {$classe['ID_CLASSE']}</option>";
            }
          ?>
        </select>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white py-2 rounded font-semibold">
        Ajouter l'étudiant
      </button>
    </form>
  </div>

  <style>
    #message.fade-in {
      opacity: 1;
    }

    #message.fade-out {
      opacity: 0;
    }
  </style>
</body>
</html>