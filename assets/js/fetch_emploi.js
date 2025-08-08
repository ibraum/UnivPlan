document.addEventListener('DOMContentLoaded', () => {
  const skeleton = document.getElementById('skeleton');
  const container = document.getElementById('emploiContainer');
  const selectEmploi = document.getElementById('emploi');
  const selectClasse = document.getElementById('filter_classe');
  const classeContainer = document.getElementById('classeContainer');

  // Charger l'emploi du temps pour une classe par défaut (classeId = 3)
  const defaultClasseId = 3;
  if (container) {
    fetch(`http://localhost/emploi-du-temps/php/emploi.php?classe=${defaultClasseId}`)
      .then(response => response.text())
      .then(xmlString => {
        const parser = new DOMParser();
        const xml = parser.parseFromString(xmlString, "application/xml");
        return fetch("http://localhost/emploi-du-temps/xsl/emploi.xsl")
          .then(res => res.text())
          .then(xslText => {
            const xsl = parser.parseFromString(xslText, "application/xml");
            const processor = new XSLTProcessor();
            processor.importStylesheet(xsl);
            const fragment = processor.transformToFragment(xml, document);
            container.innerHTML = '';
            container.appendChild(fragment);
          });
      });
  }

  // Filtrage par classe via #emploi
  if (selectEmploi && container) {
    selectEmploi.addEventListener('change', function () {
      const classeId = this.value;
      container.innerHTML = '';

      if (skeleton) {
        skeleton.style.display = 'block';
        container.appendChild(skeleton);
      }

      fetch(`http://localhost/emploi-du-temps/php/emploi.php?classe=${classeId}`)
        .then(response => response.text())
        .then(xmlString => {
          const parser = new DOMParser();
          const xml = parser.parseFromString(xmlString, "application/xml");
          return fetch("http://localhost/emploi-du-temps/xsl/emploi.xsl")
            .then(res => res.text())
            .then(xslText => {
              const xsl = parser.parseFromString(xslText, "application/xml");
              const processor = new XSLTProcessor();
              processor.importStylesheet(xsl);
              const fragment = processor.transformToFragment(xml, document);
              container.innerHTML = '';
              container.appendChild(fragment);
            });
        })
        .catch(error => {
          container.innerHTML = `<div class="text-red-500">Erreur de chargement : ${error.message}</div>`;
          console.error(error);
        });
    });

    if (selectEmploi.value) {
      selectEmploi.dispatchEvent(new Event('change'));
    }
  }

  // Filtrage par classe via #filter_classe
  if (selectClasse && classeContainer) {
    selectClasse.addEventListener('change', function () {
      const classeId = this.value;

      fetch(`http://localhost/emploi-du-temps/php/classes.php?classe=${classeId}`)
        .then(response => response.text())
        .then(xmlString => {
          const parser = new DOMParser();
          const xml = parser.parseFromString(xmlString, "application/xml");
          return fetch("http://localhost/emploi-du-temps/xsl/classe.xsl")
            .then(res => res.text())
            .then(xslText => {
              const xsl = parser.parseFromString(xslText, "application/xml");
              const processor = new XSLTProcessor();
              processor.importStylesheet(xsl);
              const fragment = processor.transformToFragment(xml, document);
              classeContainer.innerHTML = '';
              classeContainer.appendChild(fragment);
            });
        })
        .catch(error => {
          classeContainer.innerHTML = `<div class="text-red-500">Erreur de chargement : ${error.message}</div>`;
          console.error(error);
        });
    });

    if (selectClasse.value) {
      selectClasse.dispatchEvent(new Event('change'));
    }
  }
});
