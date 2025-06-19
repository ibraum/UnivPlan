<?php
  if (isset($_GET['classe'])) {
      $classeID = htmlspecialchars($_GET['classe']);
      $xmlUrl = "http://localhost/emploi-du-temps/php/classes.php?classe=" . $classeID;

      $xml = new DOMDocument;
      $xml->load($xmlUrl);

      $xsl = new DOMDocument;
      $xsl->load("http://localhost/emploi-du-temps/xsl/classe.xsl");

      $proc = new XSLTProcessor();
      $proc->importStylesheet($xsl);

      $output = $proc->transformToXML($xml);
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Affichage d'une classe</title>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="assets/js/fetch_emploi.js" defer></script>
  <script src="assets/js/script.js" defer></script>
</head>
<body class="bg-gray-50 flex" id="classes">
  <?php require_once "php/all_classes.php";?>
    <div class="w-full p-4">
        <h1 class="text-2xl font-bold">Sélection de classe</h1>
        <div class="mb-4">Séléctionnez la classe pour voir ses informations.</div>

        <form method="GET" id="filter_classe" class="mb-8 flex flex-col w-full gap-3">
            <select name="classe" id="classe" class="p-2 border rounded shadow">
                <?php
                  foreach ($classes as $classe) {
                      echo "<option value=\"{$classe['ID_CLASSE']}\">Classe - {$classe['ID_CLASSE']}</option>\n";
                  }
                ?>
            </select>
        </form>

        <div id="classe"></div>
        <?php if (isset($output)) echo $output; ?>
    </div>

</body>
</html>