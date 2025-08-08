document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".navlink");
  const mobileSidebar = document.getElementById('mobileSidebar');

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
  const allLinks = document.querySelectorAll('.navlink');
  allLinks.forEach(a => a.classList.remove('bg-blue-300'));

  const mobileSidebar = document.getElementById('mobileSidebar');
  if (mobileSidebar) mobileSidebar.classList.add('-translate-x-full');

  if (el) el.classList.add('bg-blue-300');

  const load = page ?? 'statistiques.php';
  const loadPages = document.getElementById('loadPages');

  if (!loadPages) {
    console.error("L'élément #loadPages est introuvable.");
    return;
  }

  loadPages.src = 'loading.html';
  setTimeout(() => {
    loadPages.src = load;
  }, 0);
}