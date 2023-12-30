function showTabContent(tabId, buttonId) {
  // Semua konten tab disembunyikan
  document.querySelectorAll(".tab-pane").forEach((tabContent) => {
    tabContent.classList.remove("show", "active");
  });

  // Menampilkan konten tab yang sesuai
  const selectedTabContent = document.getElementById(tabId);
  if (selectedTabContent) {
    selectedTabContent.classList.add("show", "active");
  }

  document.querySelectorAll(".nav-link").forEach((tabContent1) => {
    tabContent1.classList.remove("active");
    tabContent1.setAttribute("aria-selected", "false");
  });

  // Menampilkan konten tab yang sesuai
  const selectedTabContent1 = document.getElementById(buttonId);
  if (selectedTabContent1) {
    selectedTabContent1.classList.add("active");
    selectedTabContent1.setAttribute("aria-selected", "true");
  }
}
