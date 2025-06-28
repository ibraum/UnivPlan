<?php require_once "php/all_etudiants.php"; ?>
<?php require_once "php/all_modules.php"; ?>
<?php require_once "php/all_professeurs.php"; ?>
<?php require_once "php/all_filieres.php"; ?>
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
  <meta charset="UTF-8" />
  <title>Statistiques Enseignants</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
  <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex" id="statistiques">
  <div class="w-full p-8 max-w-7xl mx-auto">
    
    <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
      Statistiques
    </h1>
    <p class="text-gray-600 mb-8">
      Tableaux de bord résumant le système.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      
      <!-- Professeurs -->
      <div class="bg-blue-50 border border-blue-200 rounded p-4 shadow flex items-center gap-4 hover:bg-blue-100 transition">
        <div class="w-16 h-16 bg-blue-200 text-blue-700 rounded-full flex items-center justify-center text-3xl">
          <i class="fi fi-sr-chalkboard-user"></i>
        </div>
        <div>
          <p class="text-blue-800 text-lg font-medium">Professeurs</p>
          <p class="text-2xl font-extrabold text-blue-700"><?php echo count($professeurs);?></p>
        </div>
      </div>

      <!-- Étudiants -->
      <div class="bg-green-50 border border-green-200 rounded p-4 shadow flex items-center gap-4 hover:bg-green-100 transition">
        <div class="w-16 h-16 bg-green-200 text-green-700 rounded-full flex items-center justify-center text-3xl">
          <i class="fi fi-sr-student"></i>
        </div>
        <div>
          <p class="text-green-800 text-lg font-medium">Étudiants</p>
          <p class="text-2xl font-extrabold text-green-700"><?php echo count($etudiants);?></p>
        </div>
      </div>

      <!-- Modules -->
      <div class="bg-amber-50 border border-amber-200 rounded p-4 shadow flex items-center gap-4 hover:bg-amber-100 transition">
        <div class="w-16 h-16 bg-amber-200 text-amber-700 rounded-full flex items-center justify-center text-3xl">
          <i class="fi fi-sr-e-learning"></i>
        </div>
        <div>
          <p class="text-amber-800 text-lg font-medium">Modules</p>
          <p class="text-2xl font-extrabold text-amber-700"><?php echo count($modules);?></p>
        </div>
      </div>

      <!-- Filières -->
      <div class="bg-red-50 border border-red-200 rounded p-4 shadow flex items-center gap-4 hover:bg-red-100 transition">
        <div class="w-16 h-16 bg-red-200 text-red-700 rounded-full flex items-center justify-center text-3xl">
          <i class="fi fi-sr-book-alt"></i>
        </div>
        <div>
          <p class="text-red-800 text-lg font-medium">Filières</p>
          <p class="text-2xl font-extrabold text-red-700"><?php echo count($filieres);?></p>
        </div>
      </div>

    </div>

    <div class="bg-white border border-gray-200 rounded p-6 shadow mb-8">
      <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4">Total d'heures par enseignant</h2>
      <canvas id="enseignantChart" height="125"></canvas>
    </div>

    <div class="bg-white border border-gray-200 rounded p-6 shadow">
      <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-4">Total d'heures par module</h2>
      <canvas id="moduleChart" height="125"></canvas>
    </div>

  </div>

  <script>
    fetch('http://localhost/emploi-du-temps/php/statistiques.php')
      .then(response => response.json())
      .then(data => {
        const labels = data.map(item => item.NOM_PROF);
        const heures = data.map(item => item.heures_totales);

        const ctx = document.getElementById('enseignantChart').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Heures enseignées',
              data: heures,
              backgroundColor: 'rgba(59, 130, 246, 0.5)', // blue
              borderColor: 'rgba(59, 130, 246, 1)',
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: { display: true },
              tooltip: { enabled: true }
            },
            scales: {
              y: {
                beginAtZero: true,
                title: { display: true, text: 'Heures' }
              },
              x: {
                title: { display: true, text: 'Enseignants' }
              }
            }
          }
        });
      });

    fetch('http://localhost/emploi-du-temps/php/modules_heures.php')
      .then(response => response.json())
      .then(data => {
        const labels = data.map(item => item.NOM_MODULE);
        const heures = data.map(item => item.heures_totales);

        const ctx = document.getElementById('moduleChart').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Total d\'heures par module',
              data: heures,
              backgroundColor: 'rgba(251, 191, 36, 0.5)', // amber
              borderColor: 'rgba(251, 191, 36, 1)',
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: { display: true },
              tooltip: { enabled: true }
            },
            scales: {
              y: {
                beginAtZero: true,
                title: { display: true, text: 'Heures cumulées' }
              },
              x: {
                title: { display: true, text: 'Modules' }
              }
            }
          }
        });
      });
  </script>
</body>
</html>