
const skeleton = document.getElementById('skeleton');

document.addEventListener('DOMContentLoaded', () => {
  const classeId = 3;
  fetch(`http://localhost/emploi-du-temps/php/emploi.php?classe=${classeId}`)
    .then(response => response.text())
    .then(xmlString => {
      const parser = new DOMParser();
      const xml = parser.parseFromString(xmlString, "application/xml");
      const xslRequest = new XMLHttpRequest();
      xslRequest.open("GET", "http://localhost/emploi-du-temps/xsl/emploi.xsl", true);
      xslRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const xsl = parser.parseFromString(this.responseText, "application/xml");
          const xsltProcessor = new XSLTProcessor();
          xsltProcessor.importStylesheet(xsl);
          const resultDocument = xsltProcessor.transformToFragment(xml, document);
          document.getElementById("emploiContainer").appendChild(resultDocument);
        }
      };
      xslRequest.send();
    });
});


// function loadEmploi (classeID) {
//   fetch(`http://localhost/emploi-du-temps/php/emploi.php?classe=${classeID}`)
//     .then(response => response.text())
//     .then(xmlString => {
//       const parser = new DOMParser();
//       const xml = parser.parseFromString(xmlString, "application/xml");
//       const xslRequest = new XMLHttpRequest();
//       xslRequest.open("GET", "http://localhost/emploi-du-temps/xsl/emploi.xsl", true);
//       xslRequest.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//           const xsl = parser.parseFromString(this.responseText, "application/xml");
//           const xsltProcessor = new XSLTProcessor();
//           xsltProcessor.importStylesheet(xsl);
//           const resultDocument = xsltProcessor.transformToFragment(xml, document);
//           document.getElementById("emploiContainer").appendChild(resultDocument);
//         }
//       };
//       xslRequest.send();
//     });
// }

function loadEmploi(event) {
  event.preventDefault();
  const emploi = document.getElementById('emploi').value;
  alert("hello");
}

document.addEventListener('DOMContentLoaded', () => {
  const select = document.getElementById('emploi');
  const container = document.getElementById('emploiContainer');

  select.addEventListener('change', function () {
    const classeId = this.value;
    
    container.innerHTML = '';
    skeleton.style.display = 'block';
    container.appendChild(skeleton);
    setTimeout(()=>{}, 3000);
    fetch(`http://localhost/emploi-du-temps/php/emploi.php?classe=${classeId}`)
      .then(response => response.text())
      .then(xmlString => {
        const parser = new DOMParser();
        const xml = parser.parseFromString(xmlString, "application/xml");

        return fetch("xsl/emploi.xsl")
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

  if (select.value) {
    select.dispatchEvent(new Event('change'));
  }
});

document.addEventListener('DOMContentLoaded', () => {
  const select = document.getElementById('filter_classe');
  const container = document.getElementById('classeContainer');

  select.addEventListener('change', function () {
    const classeId = this.value;
    // console.log(classeId);
    fetch("http://localhost/emploi-du-temps/php/classes.php?classe=" . $classeId)
      .then(response => response.text())
      .then(xmlString => {
        const parser = new DOMParser();
        const xml = parser.parseFromString(xmlString, "application/xml");
        console.log(classeId);
        return fetch("http://localhost/emploi-du-temps/xsl/classe.xsl")
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

  if (select.value) {
    select.dispatchEvent(new Event('change'));
  }
});