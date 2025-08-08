document.getElementById('filiereForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);

  const nomFiliere = form.nom_filiere.value.trim();
  if (nomFiliere.length === 0) {
    afficherMessage("Le nom de la filière est obligatoire.", false);
    return;
  }

  fetch('php/ajouter_filiere.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      afficherMessage(data.message, true);
      form.reset();
    } else {
      afficherMessage(data.error || "Erreur lors de l'ajout.", false);
    }
  })
  .catch(err => {
    afficherMessage("Erreur réseau.", false);
    console.error(err);
  });
});

function afficherMessage(message, success = true, duree = 3000) {
  const el = document.getElementById('message');
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
