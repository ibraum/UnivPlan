document.getElementById('profForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);

  const nomProf = form.nom_prof.value.trim();
  const tel = form.tel.value.trim();

  if (!nomProf || !tel) {
    afficherMessageProf("Veuillez remplir tous les champs.", false);
    return;
  }

  fetch('http://localhost/emploi-du-temps/php/ajouter_professeur.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      afficherMessageProf("Professeur ajouté avec succès !", true);
      form.reset();
      // Optionnel : mettre à jour la liste déroulante des professeurs si besoin
    } else {
      afficherMessageProf(data.error, false);
    }
  })
  .catch(err => {
    afficherMessageProf("Erreur réseau.", false);
    console.error(err);
  });
});

function afficherMessageProf(message, success = true, duree = 3000) {
  const el = document.getElementById('messageProf');

  el.className = 'fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500 z-50';
  el.classList.add(success ? 'bg-green-600' : 'bg-red-600');
  el.textContent = message;
  el.classList.remove('hidden', 'fade-out');
  requestAnimationFrame(() => el.classList.add('fade-in'));

  setTimeout(() => {
    el.classList.remove('fade-in');
    el.classList.add('fade-out');
    setTimeout(() => el.classList.add('hidden'), 500);
  }, duree);
}
