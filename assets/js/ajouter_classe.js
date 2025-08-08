document.getElementById('classeForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);

  const niveau = form.niveau.value;
  const id_filiere = form.id_filiere.value;

  if (!niveau || !id_filiere) {
    afficherMessage("Veuillez remplir tous les champs.", false);
    return;
  }

  fetch('http://localhost/emploi-du-temps/php/ajouter_classe.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      afficherMessage("Classe ajoutée avec succès !", true);
      form.reset();
    } else {
      afficherMessage(data.error, false, 3000);
    }
  })
  .catch(err => {
    afficherMessage("Erreur réseau.", false, 3000);
    console.error(err);
  });
});

function afficherMessage(message, success = true, duree = 3000) {
  const el = document.getElementById('message');

  el.className = 'fixed top-4 left-1/2 transform -translate-x-1/2 px-4 py-3 rounded shadow-lg text-white text-sm transition-opacity duration-500 z-50';
  el.classList.add(success ? 'bg-green-600' : 'bg-red-600');

  el.textContent = message;

  el.classList.remove('hidden', 'fade-out');
  requestAnimationFrame(() => {
    el.classList.add('fade-in');
  });

  setTimeout(() => {
    el.classList.remove('fade-in');
    el.classList.add('fade-out');
    setTimeout(() => {
      el.classList.add('hidden');
    }, 500);
  }, duree);
}
