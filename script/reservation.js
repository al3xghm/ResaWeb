document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('reservationForm');
    if (!form) {
        console.error("Le formulaire n'est pas trouvé dans le DOM.");
        return;
    }

    // Définir les dates minimales pour les champs de type date
    const aujourdHui = new Date().toISOString().split('T')[0];
    document.getElementById('date_debut').setAttribute('min', aujourdHui);
    document.getElementById('date_fin').setAttribute('min', aujourdHui);

    // S'assurer que la date de fin n'est pas antérieure à la date de début
    document.getElementById('date_debut').addEventListener('change', function () {
        document.getElementById('date_fin').setAttribute('min', this.value);
    });

    document.getElementById('submitBtn').addEventListener('click', function (event) {
        event.preventDefault();  // Empêcher l'envoi du formulaire au serveur

        // Valider que tous les champs sont remplis
        var isValid = validerFormulaire();
        if (!isValid) {
            alert("Veuillez remplir tous les champs requis.");
            return;
        }

        // Calculer le montant total à payer
        var totalAPayer = calculerTotal();
        if (totalAPayer === null) {
            alert("Veuillez vérifier les dates saisies. La date de fin doit être postérieure à la date de début.");
            return;
        }

        // Mettre à jour et afficher le résumé de la réservation
        mettreAJourEtAfficherResume(totalAPayer);

        // Masquer le formulaire de réservation et afficher le résumé
        document.getElementById('stepone').style.display = 'none';
        document.getElementById('recapitulatif').style.display = 'block';

        // Masquer le titre
        document.querySelectorAll('.res-title').forEach(function (title) {
            title.style.display = 'none';
        });
    });
});

function validerFormulaire() {
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var email = document.getElementById('email').value;
    var tel = document.getElementById('tel').value;
    var dateDebutValue = document.getElementById('date_debut').value;
    var dateFinValue = document.getElementById('date_fin').value;
    var nbPersonnes = document.getElementById('nb_personnes').value;

    return nom && prenom && email && tel && dateDebutValue && dateFinValue && nbPersonnes;
}

function calculerTotal() {
    var dateDebutValue = document.getElementById('date_debut').value;
    var dateFinValue = document.getElementById('date_fin').value;
    var dateDebut = new Date(dateDebutValue);
    var dateFin = new Date(dateFinValue);
    var prixParNuit = parseFloat(document.getElementById('prixParNuit').textContent);

    if (isNaN(prixParNuit) || dateFin <= dateDebut) {
        return null;
    }

    var differenceJours = Math.ceil((dateFin - dateDebut) / (1000 * 3600 * 24));
    return (differenceJours * prixParNuit).toFixed(2);
}

function mettreAJourEtAfficherResume(totalAPayer) {
    document.getElementById('recapNom').textContent = document.getElementById('nom').value;
    document.getElementById('recapPrenom').textContent = document.getElementById('prenom').value;
    document.getElementById('recapEmail').textContent = document.getElementById('email').value;
    document.getElementById('recapTel').textContent = document.getElementById('tel').value;
    document.getElementById('recapDateDebut').textContent = document.getElementById('date_debut').value;
    document.getElementById('recapDateFin').textContent = document.getElementById('date_fin').value;
    document.getElementById('recapNbPersonnes').textContent = document.getElementById('nb_personnes').value;
    document.getElementById('recapTotal').textContent = totalAPayer + ' €';
}

function editReservation() {
    // Afficher le formulaire de réservation
    document.getElementById('stepone').style.display = 'block';

    // Masquer le résumé
    document.getElementById('recapitulatif').style.display = 'none';

    // Afficher à nouveau le titre
    document.querySelectorAll('.res-title').forEach(function (title) {
        title.style.display = 'block'; // Assurez-vous que cela correspond à votre CSS d'origine pour .res-title
    });
}

function confirmReservation() {
    // document.getElementById('reservationForm').submit();
    window.location.href = 'confirmation.php';
}