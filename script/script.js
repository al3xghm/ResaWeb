// Obtenez la référence de la fenêtre modale et du bouton de fermeture
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

// Obtenez la référence de l'image dans la fenêtre modale
var modalImg = document.getElementById("modal-img");

// Fonction pour afficher la fenêtre modale avec l'image cliquée
function openModal(imageSrc) {
  modal.style.display = "block";
  modalImg.src = imageSrc;
  // Supprimer la classe 'show' si elle est déjà présente
  modal.classList.remove("show");
  // Ajouter la classe 'show' après un court délai pour déclencher la transition CSS
  setTimeout(function() {
    modal.classList.add("show");
  }, 10);
}

// Fermez la fenêtre modale lorsque l'utilisateur clique sur le bouton de fermeture
span.onclick = function() {
  modal.classList.remove("show");
}

// Fermez la fenêtre modale lorsque l'utilisateur clique en dehors de la fenêtre modale
window.onclick = function(event) {
  if (event.target == modal) {
    modal.classList.remove("show");
  }
}

// Supprimez la classe 'show' lorsque la transition vers la visibilité de la fenêtre modale est terminée
modal.addEventListener("transitionend", function(event) {
  if (!modal.classList.contains("show")) {
    modal.style.display = "none";
  }
});
