
<?php
    require_once 'php/all_classes.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Emploi du Temps</title>
  <script src="assets/js/fetch_emploi.js" defer></script>
  <script src="assets/js/script.js" defer></script>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex" id="emplois">
  <div class="flex flex-col w-full px-4 py-5">
        <h1 class="text-2xl font-bold mb-1">
          Emploi du temps
        </h1>
        <div class="mb-4">Consultez l'emploie du temps par classe</div>
        <div class="w-full mb-4 flex flex-col gap-2 p-2 border rounded shadow">
            <select name="" id="emploi" class="w-full p-2 border-1 border-blue-400 rounded" style="border: 1px solid rgba(0, 119, 255, 0.4);">
                <?php
                  foreach ($classes as $classe) {
                      echo "<option value=\"{$classe['ID_CLASSE']}\">Classe - {$classe['ID_CLASSE']}</option>\n";
                  }
                ?>
            </select>
        </div>
    <div id="emploiContainer" class="w-full flex flex-col">
      <div id="skeleton">Loading...</div>
    </div>
  </div>
  <style>
    #skeleton {
      width: 100%;
      height: 40px;
      border-radius: 4px;
      background-color: rgba(162, 162, 162, 0.5);
      animation: skeleton 1s ease-in-out .1s infinite;
      display: none;
      text-align: center;
      align-content: center;
    }
    @keyframes skeleton {
      0%{
        background-color: rgba(162, 162, 162, 0.25);
      }
      100% {
        background-color: rgba(162, 162, 162, 0.5);
      }
    }
  </style>
</body>
</html>
