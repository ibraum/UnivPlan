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
  <title>Sidebar Responsive</title>
  <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg" />
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>  
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="assets/js/script.js"></script>
</head>

<body class="flex bg-white overflow-hidden">

  <div class="md:w-[300px] md:block hidden bg-white h-screen shadow-md p-4 sticky top-0">
    <h2 class="text-2xl font-bold pb-3 mb-5 text-blue-600 flex gap-2 items-center border-b border-blue-200">
      <span class="w-[50px] h-[50px] flex items-center justify-center bg-blue-500 text-white rounded shadow">
        <i class="fi fi-rr-calendar"></i>
      </span>
      <span class="flex flex-col gap-0">
        <span>UnivPlan</span>
        <span class="text-[10px]">Consulter vos plannings.</span>
      </span>
    </h2>
    <nav class="flex flex-col gap-4">
      <a data-page="statistiques.php" class="navlink cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition">
        <i class="fi fi-rr-dashboard-panel"></i> Statistiques
      </a>
      <a data-page="index.php" class="navlink cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition">
        <i class="fi fi-rr-calendar"></i> Emploi du Temps
      </a>
      <a data-page="affichage_classe.php" class="navlink cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition">
        <i class="fi fi-rr-graduation-cap"></i> Étudiants & Modules
      </a>
      <div class="flex gap-1 items-center text-slate-300">
        <i class="fi fi-rr-settings"></i>
        <hr class="w-full border border-slate-200">
      </div>
      <a data-page="ajouter_emploi.php" class="navlink cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition">
        <i class="fi fi-rr-multiple"></i> Saisie Séance
      </a>
 <div>
      <button id="toggleAccordion" class="w-full text-left px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition flex items-center justify-between">
        <span><i class="fi fi-rr-add"></i> Ajouter...</span>
        <i class="fi fi-rr-angle-down transition-transform" id="accordionIcon"></i>
      </button>
      <div id="accordionContent" class="pl-4 mt-2 space-y-2 hidden">
        <a data-page="ajouter_etudiant.php" class="navlink block px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded transition">
          <i class="fi fi-rr-student"></i> Étudiants
        </a>
        <a data-page="ajouter_professeur.php" class="navlink block px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded transition">
          <i class="fi fi-rr-chalkboard-user"></i> Professeur
        </a>
        <a data-page="ajouter_salle.php" class="navlink block px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded transition">
          <i class="fi fi-rr-school"></i> Salle
        </a>
        <a data-page="ajouter_filiere.php" class="navlink block px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded transition">
          <i class="fi fi-rr-department-structure"></i> Filière
        </a>
        <a data-page="ajouter_module.php" class="navlink block px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded transition">
          <i class="fi fi-rr-lesson"></i> Module
        </a>
        <a data-page="ajouter_classe.php" class="navlink block px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded transition">
          <i class="fi fi-rr-users-class"></i> Classe
        </a>
      </div>
    </div>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="flex flex-col gap-4 w-full md:w-[calc(100%-300px)]">
    <div class="w-full px-4 pt-2 sticky top-1 z-40">
      <div class="w-full bg-white border border-gray-200 rounded h-[60px] shadow flex items-center justify-between px-2">
        <div class="md:hidden flex">
          <button id="toggleSidebar" class="bg-blue-500 text-white px-4 py-2 rounded shadow">
            ☰ Menu
          </button>
        </div>
        <div class="hidden md:block">
          <button class="h-[40px] w-[40px] border border-gray-300 bg-white text-black flex items-center justify-center rounded cursor-pointer hover:bg-gray-200 transition">
            <i class="fi fi-sr-bars-staggered"></i>
          </button>
        </div>
        <div class="flex items-center gap-2 relative">
          <div class="h-[40px] w-[40px] border border-gray-300 bg-gray-100 text-gray-500 flex items-center justify-center rounded cursor-pointer hover:bg-gray-200 transition">
            <i class="fi fi-sr-moon"></i>
          </div>
          <div class="h-[40px] w-[40px] border border-blue-300 bg-blue-100 text-blue-500 flex items-center justify-center rounded cursor-pointer hover:bg-blue-200 transition">
            <i class="fi fi-sr-user"></i>
          </div>
          <div id="dropdownToggle" class="h-[40px] w-[40px] border border-white bg-white text-black flex items-center justify-center rounded cursor-pointer hover:bg-gray-100 transition">
            <i class="fi fi-sr-angle-down"></i>
          </div>
          <div id="dropdownMenu" class="hidden absolute top-[60px] right-0 w-[150px] bg-white shadow border border-gray-200 rounded p-2 text-gray-500">
            <ul class="flex flex-col gap-2">
              <li class="py-1 border-b border-gray-300 cursor-pointer hover:text-blue-600 transition"><i class="fi fi-sr-clipboard-user"></i> Profile</li>
              <li class="cursor-pointer hover:text-blue-600 transition"><i class="fi fi-sr-settings"></i> Paramètre</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <iframe src="statistiques.php" id="loadPages" class="w-full min-h-screen pb-[100px] bg-white flex pt-[10px]" loading="lazy"></iframe>
  </div>

  <div id="mobileSidebar" class="fixed inset-0 bg-white z-50 p-6 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
    <button id="closeSidebar" class="mb-6 text-blue-500 font-bold text-3xl"><i class="fi fi-rr-cross-circle"></i></button>
    <nav class="flex flex-col gap-4">
      <a onclick="pages('statistiques.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition"><i class="fi fi-rr-dashboard-panel"></i> Statistiques</a>
      <a onclick="pages('index.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition"><i class="fi fi-rr-calendar"></i> Emploi du Temps</a>
      <a onclick="pages('affichage_classe.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition"><i class="fi fi-rr-graduation-cap"></i> Étudiants & Modules</a>
      <a onclick="pages('ajouter_emploi.php', this)" class="cursor-pointer px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 rounded transition"><i class="fi fi-rr-multiple"></i> Saisie Séance</a>
    </nav>
  </div>

  <script>
    const toggleSidebar = document.getElementById('toggleSidebar');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const dropdownToggle = document.getElementById('dropdownToggle');
    const dropdownMenu = document.getElementById('dropdownMenu');

    toggleSidebar?.addEventListener('click', () => {
      mobileSidebar.classList.remove('-translate-x-full');
    });

    closeSidebar?.addEventListener('click', () => {
      mobileSidebar.classList.add('-translate-x-full');
    });

    dropdownToggle?.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
    });

      document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggleAccordion');
    const accordion = document.getElementById('accordionContent');
    const icon = document.getElementById('accordionIcon');

    toggleBtn.addEventListener('click', () => {
      accordion.classList.toggle('hidden');
      icon.classList.toggle('rotate-180'); // Pour effet visuel de flèche retournée
    });
  });
  </script>
</body>
</html>