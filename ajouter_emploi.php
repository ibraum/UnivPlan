<?php require_once "php/all_classes.php";?>
<?php require_once "php/all_modules.php";?>
<?php require_once "php/all_professeurs.php";?>
<?php require_once "php/all_salles.php";?>
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
<body class="bg-gray-100 flex" id="addEmplois">
    <div class="w-full p-4">
          <h1 class="text-2xl font-bold">Ajouter une nouvelle séance</h1>
            <div class="mb-4">Remplissez ce formulaire pour ajouter une nouvelle séance.</div>
    <form id="seanceForm" class="bg-white p-6 rounded shadow-md space-y-3 m-full mx-auto">
    <div id="message" class="mt-6 max-w-lg mx-auto"></div>
    <div>
        <label class="block">Classe :</label>
        <select name="id_classe" required class="w-full border p-2 rounded">
            <?php
                foreach ($classes as $classe) {
                    echo "<option value=\"{$classe['ID_CLASSE']}\">Classe - {$classe['ID_CLASSE']}</option>\n";
                }
            ?>
        </select>
    </div>

    <div>
        <label class="block">Professeur :</label>
        <select name="id_prof" required class="w-full border p-2 rounded">
            <?php
                foreach ($professeurs as $professeur) {
                    echo "<option value=\"{$professeur['ID_PROF']}\">{$professeur['NOM_PROF']}</option>\n";
                }
            ?>
        </select>
    </div>

    <div>
        <label class="block">Salle :</label>
        <select name="id_salle" required class="w-full border p-2 rounded">
            <?php
                foreach ($salles as $salle) {
                    echo "<option value=\"{$salle['ID_SALLE']}\">{$salle['NOM_SALLE']}</option>\n";
                }
            ?>
        </select>
    </div>

    <div>
        <label class="block">Module :</label>
        <select name="id_module" required class="w-full border p-2 rounded">
            <?php
                foreach ($modules as $module) {
                    echo "<option value=\"{$module['ID_MODULE']}\">{$module['NOM_MODULE']}</option>\n";
                }
            ?>
        </select>
    </div>

    <div>
        <label class="block">Jour :</label>
        <select name="jour" required class="w-full border p-2 rounded">
        <option value="Lundi">Lundi</option>
        <option value="Mardi">Mardi</option>
        <option value="Mercredi">Mercredi</option>
        <option value="Jeudi">Jeudi</option>
        <option value="Vendredi">Vendredi</option>
        <option value="Samedi">Samedi</option>
        <option value="Dimanche">Dimanche</option>
        <!-- etc. -->
        </select>
    </div>

    <div>
        <label class="block">Heure début :</label>
        <input type="time" name="heure_debut" required class="w-full border p-2 rounded">
    </div>

    <div>
        <label class="block">Heure fin :</label>
        <input type="time" name="heure_fin" required class="w-full border p-2 rounded">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">Ajouter la séance</button>
    </form>

    </div>
</body>
</html>