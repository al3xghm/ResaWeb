document.addEventListener('DOMContentLoaded', function () {
    // Définir les limites pour restreindre la zone visible de la carte
    var bounds = L.latLngBounds(
        L.latLng(-90, -180), // Coin inférieur gauche
        L.latLng(90, 180)    // Coin supérieur droit
    );

    // Initialiser la carte avec les limites fixées et une viscosité maximale des limites
    var map = L.map('map', {
        maxBounds: bounds,
        maxBoundsViscosity: 1.0,
        center: [51.505, -0.09],
        zoom: 2
    });

    // Supprimer le contrôle d'attribution par défaut
    map.attributionControl.remove();

    // Ajouter une couche de tuiles à la carte
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 1,
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright" title="Openstreetmap">OpenStreetMap</a>'
    }).addTo(map);

    // Définir une icône personnalisée pour les marqueurs
    var blackIcon = L.icon({
        iconUrl: './img/location.svg',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34]
    });

    // Créer un groupe de clusters de marqueurs
    var markers = L.markerClusterGroup({
        chunkedLoading: true
    });

    // Récupérer les données GeoJSON et les ajouter au groupe de clusters
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
                        <a href="location.php?id=${feature.properties.logementID}" class="popup-image-link" style="background-image: url('./img/logements/${feature.properties.image}');" aria-label="${feature.properties.nom_logement}" title="${feature.properties.nom_logement}"></a>
                        <div class="popup-content">
                            <h5 class="popup-title">${feature.properties.nom_logement}</h5>
                            <a href="location.php?id=${feature.properties.logementID}" class="popup-link" title="Voir plus de détails">Plus d'infos</a>
                        </div>
                    </div>
                    `;
                    layer.bindPopup(popupContent);
                }
            }
        }).addTo(markers);
    })
    .catch(err => console.error('Erreur lors du chargement du GeoJSON: ', err));

    // Ajouter le groupe de clusters à la carte
    map.addLayer(markers);

    // Gérer l'ouverture des popups
    map.on('popupopen', function(e) {
        map.setMaxBounds(null); // Supprimer temporairement les limites maximales
    });
    
    // Gérer la fermeture des popups
    map.on('popupclose', function(e) {
        map.setMaxBounds(bounds); // Rétablir les limites maximales
    });

    // Gestion du menu burger pour les filtres
    let burger = document.querySelector(".burger");
    let nav = document.querySelector(".des-left");

    burger.addEventListener("click", () => {
      nav.classList.toggle("_active");
      burger.classList.toggle("_active");
    });

    // Stocker l'ordre initial des éléments à la charge de la page
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
            sortedList = defaultOrder;
        } else {
            sortedList = Array.from(productList).sort(function (a, b) {
                var priceA = parseFloat(a.dataset.price);
                var priceB = parseFloat(b.dataset.price);
                return selectedValue === "1" ? priceA - priceB : priceB - priceA;
            });
        }

        var container = document.querySelector(".des-right-bottom");
        container.innerHTML = "";
        sortedList.forEach(function (item) {
            container.appendChild(item);
        });
    }

    document.getElementById("sort").addEventListener("change", trierPrix);

    // Gérer les boutons d'augmentation et de diminution du nombre d'invités
    document.getElementById('increase').addEventListener('click', function (event) {
        event.preventDefault();
        var guestNumber = document.getElementById('guest-number');
        var currentValue = parseInt(guestNumber.value);
        if (currentValue < 12) {
            guestNumber.value = currentValue + 1;
        }
    });

    document.getElementById('decrease').addEventListener('click', function (event) {
        event.preventDefault();
        var guestNumber = document.getElementById('guest-number');
        var currentValue = parseInt(guestNumber.value);
        if (currentValue > 1) {
            guestNumber.value = currentValue - 1;
        }
    });

    // Réinitialiser la page via le bouton de réinitialisation
    const resetButton = document.getElementById('resetButton');
    resetButton.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = window.location.origin + window.location.pathname;
    });
});

// Fonction pour permettre une seule case à cocher à la fois
function allowOnlyOneCheckbox(checkbox) {
    var checkboxes = document.querySelectorAll('.type-property input[type="checkbox"]');
    checkboxes.forEach(function (cb) {
        if (cb !== checkbox) {
            cb.checked = false;
        }
    });
}
