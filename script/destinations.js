document.addEventListener('DOMContentLoaded', function () {


    // Initialiser la et ajoute la carte

    var map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);



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

    document.getElementById('increase').addEventListener('click', function () {
        var guestNumber = document.getElementById('guest-number');
        guestNumber.textContent = parseInt(guestNumber.textContent) + 1;
        console.log(guestNumber.textContent);
    });

    document.getElementById('decrease').addEventListener('click', function () {
        var guestNumber = document.getElementById('guest-number');
        if (parseInt(guestNumber.textContent) > 1) {
            guestNumber.textContent = parseInt(guestNumber.textContent) - 1;
        }
        console.log(guestNumber.textContent);
    });



});