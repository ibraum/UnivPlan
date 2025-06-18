
<?php
    require_once 'php/all_classes.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Emploi du Temps</title>
  <script src="assets/js/fetch_emploi.js" defer></script>
</head>
<body class="bg-gray-50 flex">
  <?php require_once "dashboard.php";?>
  <div class="flex flex-col w-full px-4 py-5">
        <h1 class="text-2xl font-bold mb-1">
          Emploi du temps
        </h1>
        <div class="mb-4">Consultez l'emploie du temps par classe</div>
        <div class="w-full mb-4 flex flex-col gap-2 p-2 border rounded">
            <select name="" id="" class="w-full p-2 border-1 border-blue-400 rounded" style="border: 1px solid rgba(0, 119, 255, 0.4);">
                <?php
                foreach ($classes as $classe) {
                    echo "<option onclick=\"loadEmploi({$classe['ID_CLASSE']})\" value=\"{$classe['ID_CLASSE']}\">Classe - {$classe['ID_CLASSE']}</option>\n";
                }
                ?>
            </select>
            <button class="w-full p-2 bg-blue-500 rounded text-white">charger</button>
        </div>
    <div id="emploiContainer" class="container mx-auto flex flex-col"></div>
  </div>
</body>
</html>
