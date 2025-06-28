document.addEventListener("DOMContentLoaded", () => {
  const addEmplois = document.getElementById('addEmplois');
  const emplois = document.getElementById('emplois');
  const statistiques = document.getElementById('statistiques');
  const loadPages = document.getElementById('loadPages');
  const mobileSidebar = document.getElementById('mobileSidebar');

  // Récupérer tous les liens de nav
  const navLinks = document.querySelectorAll(".navlink");

  navLinks.forEach(link => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const page = link.dataset.page;
      pages(page, link);
    });
  });

  pages(null);
});

function pages(page, el = null) {
  document.querySelectorAll('.navlink').forEach(a => a.classList.remove('bg-blue-300'));
  document.getElementById('mobileSidebar')?.classList.add('-translate-x-full');
  if (el) el.classList.add('bg-blue-300');

  let load = page ?? 'statistiques.php';
  const loadPages = document.getElementById('loadPages');
  loadPages.src = 'loading.html';
  setTimeout(() => {
      loadPages.src = load;
  }, 3000);
}

let chartInstance = null;

function renderChart(data) {
  const labels = data.map(item => item.NOM_PROF);
  const heures = data.map(item => item.heures_totales);
  const ctx = document.getElementById('enseignantChart')?.getContext('2d');

  if (!ctx) return;

  if (chartInstance) {
    chartInstance.destroy();
  }

  chartInstance = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Heures enseignées',
        data: heures,
        backgroundColor: 'rgba(59, 130, 246, 0.6)',
        borderColor: 'rgba(59, 130, 246, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });
}