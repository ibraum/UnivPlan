const classes = document.getElementById('classes');
const addEmplois = document.getElementById('addEmplois');
const emplois = document.getElementById('emplois');
const statistiques = document.getElementById('statistiques');
const loadPages = document.getElementById('loadPages');

function afficher(e) {
    e.preventDefault();
}

function pages(page, el = null) {
    document.querySelectorAll('nav a').forEach(a => a.classList.remove('bg-blue-300'));

    if (el) el.classList.add('bg-blue-300');
    
    let load = page ?? 'statistiques.php'
    loadPages.src = 'loading.html'; 
    setTimeout(() => {
        loadPages.src = load;
    }, 3000);
}

pages(null);


let chartInstance = null;

function renderChart(data) {
  const labels = data.map(item => item.NOM_PROF);
  const heures = data.map(item => item.heures_totales);
  const ctx = document.getElementById('enseignantChart').getContext('2d');

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
        y: { beginAtZero: true },
        x: {}
      }
    }
  });
}
