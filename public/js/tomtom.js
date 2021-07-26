
        const apiKey = 'x03gOYgHS1403BuzYDLDXT3SZEhCK1sB';
        const map = tt.map({
            key: apiKey,
            container: 'map',
            center: [4.573040, 52.138950],
            zoom: 9,
            
        });

        const markersCity = [];
        const list = document.getElementById('store-list');

        stores.features.forEach(function (store, index) {
            const city = store.properties.city;
            const address = store.properties.address;
            const location = store.geometry.coordinates;
            const marker = new tt.Marker().setLngLat(location).setPopup(new tt.Popup({
                offset: 35
            }).setHTML(address)).addTo(map);
            markersCity[index] = {
                marker,
                city
            };

            let cityStoresList = document.getElementById(city);
            if (cityStoresList === null) {
                const cityStoresListHeading = list.appendChild(document.createElement('h3'));
                cityStoresListHeading.innerHTML = city;
                cityStoresList = list.appendChild(document.createElement('div'));
                cityStoresList.id = city;
                cityStoresList.className = 'list-entries-container';
                cityStoresListHeading.addEventListener('click', function (e) {
                    map.fitBounds(getMarkersBoundsForCity(e.target.innerText), {
                        padding: 50
                    });
                });
            }

            const details = buildLocation(cityStoresList, address);

            marker.getElement().addEventListener('click', function () {
                const activeItem = document.getElementsByClassName('selected');
                if (activeItem[0]) {
                    activeItem[0].classList.remove('selected');
                }
                details.classList.add('selected');
                openCityTab(city);
            });

            details.addEventListener('click', function () {
                const activeItem = document.getElementsByClassName('selected');
                if (activeItem[0]) {
                    activeItem[0].classList.remove('selected');
                }
                details.classList.add('selected');
                map.easeTo({
                    center: marker.getLngLat(),
                    zoom: 12
                });
                closeAllPopups();
                marker.togglePopup();

            });

            function buildLocation(htmlParent, text) {
                const details = htmlParent.appendChild(document.createElement('a'));
                details.href = '#';
                details.className = 'list-entry';
                details.innerHTML = text;
                return details;
            }

            function closeAllPopups() {
                markersCity.forEach(markerCity => {
                    if (markerCity.marker.getPopup().isOpen()) {
                        markerCity.marker.togglePopup();
                    }
                });
            }

            function getMarkersBoundsForCity(city) {
                const bounds = new tt.LngLatBounds();
                markersCity.forEach(markerCity => {
                    if (markerCity.city === city) {
                        bounds.extend(markerCity.marker.getLngLat());
                    }
                });
                return bounds;
            }

            function openCityTab(selected_id) {
                const storeListElement = $('#store-list');
                const citiesListDiv = storeListElement.find('div.list-entries-container');
                for (let activeCityIndex = 0; activeCityIndex < citiesListDiv.length; activeCityIndex++) {
                    if (citiesListDiv[activeCityIndex].id === selected_id) {
                        storeListElement.accordion('option', {
                            'active': activeCityIndex
                        });
                    }
                }
            }
        });

        $('#store-list').accordion({
            'icons': {
                'header': 'ui-icon-plus',
                'activeHeader': 'ui-icon-minus'
            },
            'heightStyle': 'content',
            'collapsible': true,
            'active': false
        });
