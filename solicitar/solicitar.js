var map;
var places;
var emergency;
var autocomplete;
var hospitales;

function initMap() {
    map = new google.maps.Map(document.getElementById("googleMap"), {
        center: {
            lat: 20.6259067,
            lng: -103.2521258,
        },
        zoom: 12,
    });

    var input = document.getElementById("ubicacion-autocomplete");
    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(20.6605563, -103.2765846),
        new google.maps.LatLng(20.565327, -103.227146)
    );
    var options = {
        bounds: defaultBounds,
        types: ["geocode"],
    };

    autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.setFields(["address_components", "geometry", "icon", "name"]);

    google.maps.event.addListener(autocomplete, "place_changed", function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
                "No details available for input: '" + place.name + "'"
            );
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        var emergencyMarker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
        });

        console.log(
            place.geometry.location.lat + "," + place.geometry.location.lng
        );

        //Get the emergency's spot lat-lng
        var placeLat = place.geometry.location.lat();
        var placeLng = place.geometry.location.lng();

        console.log(placeLat, placeLng);

        emergency = new google.maps.LatLng(placeLat, placeLng);

        // Request to search nearby hospitals
        var request = {
            location: emergency,
            radius: "1000",
            type: ["hospital"],
        };
        places = new google.maps.places.PlacesService(map);

        places.nearbySearch(request, callback);
    });
}

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
        hospitales = results;
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
            var option = new Option(results[i].name,results[i].name);
            $(option).html(results[i].name);
            $('select[name="hospital"]').append(option);
        }
    }
}

function createMarker(place) {
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location,
    });
}
