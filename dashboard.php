<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Sidebar Responsive</title>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/js/script.js" defer></script>
</head>
<body class="flex bg-gray-100 overflow-hidden">

  <!-- Sidebar -->
  <div class="md:w-[300px] md:block hidden bg-white h-screen shadow-md p-4 sticky top-0">
    <h2 class="text-2xl font-bold pb-3 mb-5 text-blue-600 flex gap-2 items-center border-b border-blue-200"><span class="w-[50px] h-[50px] flex items-center justify-center bg-blue-500 text-white rounded shadow"><i class="fi fi-rr-calendar"></i></span> <span class="flex flex-col gap-[0px]"><span>UnivPlan</span><span class="text-[10px] ">Consulter vos planning.</span></span></h2>
    <nav class="flex flex-col gap-4">
      <a onclick="pages('statistiques.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-dashboard-panel"></i> Statistiques</a>
      <a onclick="pages('index.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-calendar"></i> Emploi du Temps</a>
      <a onclick="pages('affichage_classe.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-graduation-cap"></i> Étudiants & Modules</a>
      <a onclick="pages('ajouter_emploi.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-multiple"></i> Saisie Séance</a>
    </nav>
  </div>

  <div class="flex flex-col gap-4 w-[calc(100%-300px)]">
      <div class="w-full px-4 pt-2 sticky top-1">
        <div class="w-full bg-white border border-gray-200 rounded h-[60px] shadow flex items-center justify-between px-2">
          <div class="flex-1 p-6 absolute top-1 left-1">
            <button id="toggleSidebar" class="md:hidden mb-4 bg-blue-500 text-white px-4 py-2 rounded">
              ☰ Menu
            </button>
          </div>
          <button class="h-[40px] w-[40px] border border-1 border-slate-300 bg-white text-black flex items-center justify-center rounded cursor-pointer hover:bg-gray-200 duration-100">
            <i class="fi fi-sr-bars-staggered"></i>
          </button>
          <div class="h-[40px] w-[40px] border border-1 border-blue-300 outline outline-1 outline-white bg-blue-100 text-blue-500 flex items-center justify-center rounded cursor-pointer hover:bg-blue-200 duration-100">
            <i class="fi fi-sr-user"></i>
          </div>
        </div>
      </div>

      <iframe src="statistiques.php" id="loadPages" class="w-full min-h-screen pb-2 bg-gray-100 flex pt-[75px]">

      </iframe>
  </div>

  <!-- Content -->

  <!-- Sidebar Mobile -->
  <div id="mobileSidebar" class="fixed inset-0 bg-white z-50 p-6 transform -tranblue-x-full transition-transform duration-300 ease-in-out md:hidden">
    <button id="closeSidebar" class="mb-6 text-red-500 font-bold text-xl">✖</button>
    <nav class="flex flex-col gap-4">
      <a href="#" class="px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-dashboard-panel"></i> Emploi du Temps</a>
      <a href="#" class="px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-calendar"></i> Étudiants & Modules</a>
      <a href="#" class="px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-graduation-cap"></i> Statistiques</a>
      <a href="#" class="px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded"><i class="fi fi-rr-multiple"></i> Saisie Séance</a>
    </nav>
  </div>

  <script>
    const toggleSidebar = document.getElementById('toggleSidebar');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    toggleSidebar.addEventListener('click', () => {
      mobileSidebar.classList.remove('-tranblue-x-full');
    });

    closeSidebar.addEventListener('click', () => {
      mobileSidebar.classList.add('-tranblue-x-full');
    });
  </script>
</body>
</html>