document.addEventListener('DOMContentLoaded', function () {


    // Initialiser la et ajoute la carte

    var map = L.map('map', {
        attributionControl: false
    }).setView([51.505, -0.09], 2);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var popupContent = 'Hello, this is a popup!';

    L.marker([50.5, 30.5]).addTo(map).bindPopup(popupContent);;



    // Stocker l'ordre initial des éléments au chargement de la page
    var defaultOrder = [];

    window.onload = function () {
        var productList = document.querySelectorAll(".product");
        productList.forEach(function (item) {
            defaultOrder.push(item);
        });
    };

    function trierPrix() {
        var selectElement = document.getElementById("sort");
        var selectedValue = selectElement.value;
        var productList = document.querySelectorAll(".product");

        var sortedList;

        if (selectedValue === "0") {
            // Réinsérer les éléments dans l'ordre initial
            sortedList = defaultOrder;
        } else {
            sortedList = Array.from(productList).sort(function (a, b) {
                var priceA = parseFloat(a.dataset.price);
                var priceB = parseFloat(b.dataset.price);

                if (selectedValue === "1") {
                    return priceA - priceB;
                } else if (selectedValue === "2") {
                    return priceB - priceA;
                } else {
                    // Si la valeur sélectionnée est autre que 1 ou 2, revenez à l'ordre par défaut
                    // Vous pouvez personnaliser cela selon vos besoins
                    return 0;
                }
            });
        }

        // Réordonner les éléments dans le DOM
        var container = document.querySelector(".des-right-bottom");
        container.innerHTML = "";
        sortedList.forEach(function (item) {
            container.appendChild(item);
        });
    }

    document.getElementById("sort").addEventListener("change", trierPrix);

    // Filtrer le nombre

    document.getElementById('increase').addEventListener('click', function (event) {
        event.preventDefault();

        var guestNumber = document.getElementById('guest-number');
        // guest-number is an input type number, so we can directly increment the value
        guestNumber.value = parseInt(guestNumber.value) + 1;
    });

    document.getElementById('decrease').addEventListener('click', function (event) {
        event.preventDefault();
        var guestNumber = document.getElementById('guest-number');
        if (parseInt(guestNumber.value) > 1) {
            guestNumber.value = parseInt(guestNumber.value) - 1;

        }
    });

         // Sélectionnez le bouton de réinitialisation
         const resetButton = document.getElementById('resetButton');

         // Ajoutez un écouteur d'événements pour le clic sur le bouton de réinitialisation
         resetButton.addEventListener('click', function (event) {
             // Empêchez le comportement par défaut du bouton de réinitialisation
             event.preventDefault();
    
             // Redirigez l'utilisateur vers la même page sans aucun paramètre d'URL
             window.location.href = window.location.origin + window.location.pathname;
            });


            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form');
                const inputs = form.querySelectorAll('input, select, textarea');
            
                // Charger les valeurs sauvegardées
                inputs.forEach(input => {
                    const savedValue = localStorage.getItem(input.name);
                    if (savedValue) {
                        if (input.type === 'checkbox') {
                            input.checked = savedValue === 'true';
                        } else {
                            input.value = savedValue;
                        }
                    }
                });
            
                // Sauvegarder les valeurs dans localStorage lors de leur modification
                inputs.forEach(input => {
                    input.addEventListener('change', () => {
                        if (input.type === 'checkbox') {
                            localStorage.setItem(input.name, input.checked);
                        } else {
                            localStorage.setItem(input.name, input.value);
                        }
                    });
                });
            
                // Réinitialiser le localStorage lors du clic sur le bouton Réinitialiser
                document.getElementById('resetButton').addEventListener('click', () => {
                    inputs.forEach(input => {
                        localStorage.removeItem(input.name);
                    });
                });
            });
            

});

// checkbox
function allowOnlyOneCheckbox(checkbox) {
    var checkboxes = document.querySelectorAll('.type-property input[type="checkbox"]');
    checkboxes.forEach(function(cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

