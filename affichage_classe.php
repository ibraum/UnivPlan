<?php 
  require_once "php/all_classes.php";
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: 0");
  if (function_exists('opcache_reset')) {
      opcache_reset();
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Affichage d'une classe</title>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="assets/js/fetch_emploi.js"></script>
  <script src="assets/js/script.js"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-start justify-center px-4">
  <div class="w-full bg-white rounded shadow border border-gray-200 p-8">
    
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2 flex items-center gap-3">
      Sélection d'une classe
    </h1>
    
    <p class="text-gray-600 mb-4">
      Veuillez sélectionner la classe dont vous souhaitez afficher les informations.
    </p>
    
    <div class="mb-6">
      <label for="filter_classe" class="block text-gray-700 font-medium mb-2">Classe :</label>
      <select
        name="classe"
        id="filter_classe"
        class="block w-full px-4 py-3 border border-blue-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        <?php
          foreach ($classes as $classe) {
              echo "<option value=\"{$classe['ID_CLASSE']}\">Classe numéro - {$classe['ID_CLASSE']}</option>\n";
          }
        ?>
      </select>
    </div>
    
    <div id="classeContainer" class="mt-6">
      
    </div>
    
  </div>
</body>
</html>