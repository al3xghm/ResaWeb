document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('reservationForm');
    if (!form) {
        console.error("Le formulaire n'est pas trouvé dans le DOM.");
        return;
    }

    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_debut').setAttribute('min', today);
    document.getElementById('date_fin').setAttribute('min', today);

    document.getElementById('date_debut').addEventListener('change', function() {
        var dateDebut = new Date(this.value);
        document.getElementById('date_fin').setAttribute('min', this.value);
    });

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        var dateDebutValue = document.getElementById('date_debut').value;
        var dateFinValue = document.getElementById('date_fin').value;
        var dateDebut = new Date(dateDebutValue);
        var dateFin = new Date(dateFinValue);

        if (dateDebut.getTime() === dateFin.getTime()) {
            alert("La date de fin doit être différente de la date de début.");
            return;
        }

        var totalAPayer = calculateTotal(dateDebut, dateFin);
        if (totalAPayer === null) {
            alert("Veuillez vérifier les dates saisies. La date de fin doit être postérieure à la date de début.");
            return;
        }

        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var email = document.getElementById('email').value;
        var tel = document.getElementById('tel').value;
        var nbPersonnes = document.getElementById('nb_personnes').value;

        document.getElementById('recapNom').textContent = nom;
        document.getElementById('recapPrenom').textContent = prenom;
        document.getElementById('recapEmail').textContent = email;
        document.getElementById('recapTel').textContent = tel;
        document.getElementById('recapDateDebut').textContent = dateDebutValue;
        document.getElementById('recapDateFin').textContent = dateFinValue;
        document.getElementById('recapNbPersonnes').textContent = nbPersonnes;
        document.getElementById('recapTotal').textContent = totalAPayer + ' €';

        document.querySelector('.reservation-wrapper').style.display = 'none';
        document.getElementById('recapitulatif').style.display = 'block';
    });
});

function calculateTotal(dateDebut, dateFin) {
    var prixParNuit = parseFloat(document.getElementById('prixParNuit').textContent);
    if (isNaN(prixParNuit)) {
        console.error("Prix par nuit non trouvé ou invalide.");
        return null;
    }

    var differenceTime = dateFin.getTime() - dateDebut.getTime();
    if (differenceTime <= 0) {
        return null;
    }

    var differenceDays = Math.ceil(differenceTime / (1000 * 3600 * 24));
    return (differenceDays * prixParNuit).toFixed(2);
}

function confirmReservation() {
    document.getElementById('reservationForm').submit();
    window.location.href = 'confirmation.php';
}

function editReservation() {
    document.querySelector('.reservation-wrapper').style.display = 'flex';
    document.getElementById('recapitulatif').style.display = 'none';
}
