<?php require_once "php/all_etudiants.php";?>
<?php require_once "php/all_modules.php";?>
<?php require_once "php/all_professeurs.php";?>
<?php require_once "php/all_filieres.php";?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Statistiques Enseignants</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex" id="statitiques">
  <div class="w-full p-4">
    <h1 class="text-2xl font-bold mb-1">
      Statistiques
    </h1>
    <div class="mb-4">Tableaux de bord résumant le système.</div>
    <div class="w-full flex flex-wrap mb-3 bg-white shadow rounded p-2 gap-3">
      <div class="grow w-[200px] h-[100px] border rounded flex gap-4 py-3 px-6 items-center">
          <div class="w-[80px] h-[80px] bg-blue-100 border border-blue-300 rounded text-blue-500 flex items-center justify-center text-3xl"><i class="fi fi-sr-chalkboard-user"></i></div>
          <div class=" flex flex-col gap-[10px]">
            <div class="text-black text-2xl">Professeurs</div>
            <div class="text-xl font-bold"><?php echo count($professeurs);?></div>
          </div>
          <div class=""></div>
      </div>
      <div class="grow w-[200px] h-[100px] border rounded flex gap-4 py-3 px-6 items-center">
          <div class="w-[80px] h-[80px] bg-green-100 border border-green-300 rounded text-green-500 flex items-center justify-center text-3xl"><i class="fi fi-sr-student"></i></div>
          <div class=" flex flex-col gap-[10px]">
            <div class="text-black text-2xl">Etudiants</div>
            <div class="text-xl font-bold"><?php echo count($etudiants);?></div>
          </div>
          <div class=""></div>
      </div>
      <div class="grow w-[200px] h-[100px] border rounded flex gap-4 py-3 px-6 items-center">
          <div class="w-[80px] h-[80px] bg-yellow-100 border border-yellow-300 rounded text-yellow-500 flex items-center justify-center text-3xl"><i class="fi fi-sr-e-learning"></i></div>
          <div class=" flex flex-col gap-[10px]">
            <div class="text-black text-2xl">Modules</div>
            <div class="text-xl font-bold"><?php echo count($modules);?></div>
          </div>
          <div class=""></div>
      </div>
      <div class="grow w-[200px] h-[100px] border rounded flex gap-4 py-3 px-6 items-center">
          <div class="w-[80px] h-[80px] bg-red-100 border border-red-300 rounded text-red-500 flex items-center justify-center text-3xl"><i class="fi fi-sr-book-alt"></i></div>
          <div class=" flex flex-col gap-[10px]">
            <div class="text-black text-2xl">Filières</div>
            <div class="text-xl font-bold"><?php echo count($filieres);?></div>
          </div>
          <div class=""></div>
      </div>
    </div>  
    <div class="bg-white p-2 rounded shadow border mb-3">
      <h1 class="text-xl font-bold mb-6">Total d'heures par enseignant</h1>
      <canvas id="enseignantChart" height="100"></canvas>
    </div> 
    <div class="bg-white p-2 rounded shadow border">
      <h1 class="text-xl font-bold mb-6">Total d'heures par module</h1>
      <canvas id="moduleChart" height="100"></canvas>
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
              backgroundColor: ['rgba(59, 130, 246, 0.7)', 'rgba(59, 130, 246, 0.5)', 'rgba(59, 130, 246, 0.3)'],
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
            backgroundColor: 'rgba(34, 197, 94, 0.5)',
            borderColor: 'rgba(34, 197, 94, 1)',
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
