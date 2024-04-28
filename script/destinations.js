document.addEventListener('DOMContentLoaded', function () {
    var map = L.map('map').setView([51.505, -0.09], 2);
    map.attributionControl.remove();
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 2,
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var blackIcon = L.icon({
        iconUrl: './img/location.svg',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34]
    });

    var markers = L.markerClusterGroup({
        chunkedLoading: true
    });

    fetch('logements.json')
    .then(response => response.json())
    .then(geojson => {
        L.geoJSON(geojson, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {icon: blackIcon});
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties && feature.properties.nom_logement) {
                    var popupContent = `
                    <div class="popup-container">
                        <a href="location.php?id=${feature.properties.logementID}" class="popup-image-link" style="background-image: url('./img/${feature.properties.image}');"></a>
                        <div class="popup-content">
                            <h5 class="popup-title">${feature.properties.nom_logement}</h5>
                            <a href="location.php?id=${feature.properties.logementID}" class="popup-link">Plus d'infos</a>
                        </div>
                    </div>
                    `;
                    layer.bindPopup(popupContent);
                }
            }
        }).addTo(markers);
    })
    .catch(err => console.error('Erreur lors du chargement du GeoJSON: ', err));

    map.addLayer(markers);



    // Stocker l'ordre initial des éléments au chargement de la page
    var defaultOrder = [];

    window.onload = function () {
        var productList = document.querySelectorAll(".product");
        productList.forEach(function (item) {
            defaultOrder.push(item);
        });
    };

    // Trier les éléments en fonction du prix
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
        var currentValue = parseInt(guestNumber.value);
        if (currentValue < 12) { // Vérifiez si la valeur est inférieure à 12 avant d'incrémenter
            guestNumber.value = currentValue + 1;
        }
    });
    
    document.getElementById('decrease').addEventListener('click', function (event) {
        event.preventDefault();
        var guestNumber = document.getElementById('guest-number');
        var currentValue = parseInt(guestNumber.value);
        if (currentValue > 1) { // Vérifiez si la valeur est supérieure à 1 avant de décrémenter
            guestNumber.value = currentValue - 1;
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

});

// checkbox
function allowOnlyOneCheckbox(checkbox) {
    var checkboxes = document.querySelectorAll('.type-property input[type="checkbox"]');
    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}

