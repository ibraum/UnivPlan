document.getElementById('seanceForm').addEventListener('submit', async function(e) {
  e.preventDefault();

  const form = this;
  const formData = new FormData(form);

  const id_classe = form.id_classe.value;
  const jour = form.jour.value;
  const heureDebut = form.heure_debut.value;
  const heureFin = form.heure_fin.value;

  const duree = getDuration(heureDebut, heureFin);

  if (duree < 2) {
    afficherMessage("La durée minimale d'une séance est de 2h.", false);
    return;
  }
  if (duree > 6) {
    afficherMessage("La durée maximale d'une séance est de 6h.", false);
    return;
  }

  const horaires = await chargerHorairesIndisponibles(id_classe, jour);

  if (detecterChevauchement(horaires, heureDebut, heureFin)) {
    afficherMessage("Ce créneau chevauche déjà une autre séance.", false);
    return;
  }

  fetch('http://localhost/emploi-du-temps/php/ajouter_emploi.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      afficherMessage("Séance ajoutée avec succès !", true);
      form.reset();
    } else {
      afficherMessage(data.error, false, 2000);
    }
  })
  .catch(err => {
    afficherMessage("Erreur réseau.", false, 2000);
    console.error(err);
  });
});

async function chargerHorairesIndisponibles(classeId, jour) {
  const res = await fetch(`http://localhost/emploi-du-temps/php/get_creneaux.php?id_classe=${classeId}&jour=${jour}`);
  return await res.json();
}

function detecterChevauchement(creneaux, debut, fin) {
  const debutTime = toMinutes(debut);
  const finTime = toMinutes(fin);

  for (let seance of creneaux) {
    const start = toMinutes(seance.heure_debut);
    const end = toMinutes(seance.heure_fin);

    if (
      (debutTime >= start && debutTime < end) ||
      (finTime > start && finTime <= end) ||
      (debutTime <= start && finTime >= end)
    ) {
      return true;
    }
  }
  return false;
}

function toMinutes(horaire) {
  const [h, m] = horaire.split(':').map(Number);
  return h * 60 + m;
}

function getDuration(debut, fin) {
  return (toMinutes(fin) - toMinutes(debut)) / 60;
}

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