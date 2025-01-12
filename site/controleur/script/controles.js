// Obtenir les éléments
const modal = document.getElementById("controles-modal");
const btn = document.getElementById("controles");
const closeBtn = document.querySelector(".close");

// Ouvrir la fenêtre modale
btn.addEventListener("click", () => {
  modal.style.display = "block";
});

// Fermer la fenêtre modale
closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

// Fermer la fenêtre modale en cliquant à l'extérieur
window.addEventListener("click", (event) => {
  if (event.target === modal) {
    modal.style.display = "none";
  }
});
