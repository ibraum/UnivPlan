<?php
    require_once 'php/all_classes.php';
?>
<?php 
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
  <title>Emploi du Temps</title>
  <script src="assets/js/fetch_emploi.js"></script>
  <script src="assets/js/script.js"></script>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-start justify-center px-4" id="emplois">
  <div class="w-full p-6 bg-white rounded shadow border border-gray-200">
    
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
      Emploi du temps
    </h1>
    
    <p class="text-gray-600 mb-6">
      Consultez l'emploi du temps par classe
    </p>
    
    <div class="mb-8">
      <label for="emploi" class="block text-gray-700 font-medium mb-2">Choisir une classe :</label>
      <select id="emploi" name="emploi"
        class="block w-full px-4 py-3 border border-blue-300 rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
        <?php
          foreach ($classes as $classe) {
              echo "<option value=\"{$classe['ID_CLASSE']}\">Classe - {$classe['ID_CLASSE']}</option>\n";
          }
        ?>
      </select>
    </div>
    
    <div id="emploiContainer" class="w-full">
      <div id="skeleton" class="hidden w-full h-12 rounded bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 animate-pulse flex items-center justify-center text-gray-500 font-medium">
        Chargement...
      </div>
    </div>
  
  </div>
</body>
</html>