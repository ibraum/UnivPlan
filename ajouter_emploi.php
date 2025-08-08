<?php require_once "php/all_classes.php";?>
<?php require_once "php/all_modules.php";?>
<?php require_once "php/all_professeurs.php";?>
<?php 
    require_once "php/all_salles.php";
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
  <meta charset="UTF-8" />
  <title>Nouvelle séance - Emploi du temps</title>
  <script defer src="assets/js/ajouter_emploi.js"></script>
  <script src="assets/js/script.js" defer></script>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center py-2 px-4" id="addEmplois">
  <div class="w-full bg-white shadow-lg rounded p-8">
    <div class="flex items-center mb-6 gap-3 border-b pb-3 border-blue-200">
      <span class="w-[50px] h-[50px] bg-blue-600 text-white flex items-center justify-center rounded-full shadow">
        <i class="fi fi-rr-calendar"></i>
      </span>
      <div>
        <h1 class="text-2xl font-bold text-blue-700">Ajouter une séance</h1>
        <p class="text-gray-500 text-sm">Remplissez le formulaire ci-dessous pour planifier une nouvelle séance.</p>
      </div>
    </div>

 <form id="seanceForm" class="space-y-5">
  <div id="message" class="hidden fixed top-4 m-auto z-50 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500"></div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-gray-700 font-medium mb-1">Classe</label>
      <select name="id_classe" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <?php
          foreach ($classes as $classe) {
            echo "<option value=\"{$classe['ID_CLASSE']}\">Classe - {$classe['ID_CLASSE']}</option>\n";
          }
        ?>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-1">Professeur</label>
      <select name="id_prof" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
        <?php
          foreach ($professeurs as $professeur) {
            echo "<option value=\"{$professeur['ID_PROF']}\">{$professeur['NOM_PROF']}</option>\n";
          }
        ?>
      </select>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-gray-700 font-medium mb-1">Salle</label>
      <select name="id_salle" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
        <?php
          foreach ($salles as $salle) {
            echo "<option value=\"{$salle['ID_SALLE']}\">{$salle['NOM_SALLE']}</option>\n";
          }
        ?>
      </select>
    </div>

    <div>
      <label class="block text-gray-700 font-medium mb-1">Module</label>
      <select name="id_module" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
        <?php
          foreach ($modules as $module) {
            echo "<option value=\"{$module['ID_MODULE']}\">{$module['NOM_MODULE']}</option>\n";
          }
        ?>
      </select>
    </div>
  </div>

  <div>
    <label class="block text-gray-700 font-medium mb-1">Date</label>
    <input type="date" name="jour" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
      <label class="block text-gray-700 font-medium mb-1">Heure début</label>
      <input type="time" name="heure_debut" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div>
      <label class="block text-gray-700 font-medium mb-1">Heure fin</label>
      <input type="time" name="heure_fin" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
  </div>

  <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded shadow transition duration-300 flex items-center justify-center gap-2">
    <i class="fi fi-rr-plus"></i> Ajouter la séance
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