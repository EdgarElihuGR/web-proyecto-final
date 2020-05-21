var map;

function initMap() {
    map = new google.maps.Map(document.getElementById("googleMap"), {
        center: {
            lat: 20.6259067,
            lng: -103.2521258,
        },
        zoom: 12,
    });
}

$(document).ready(function () {
    var autocomplete;
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
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
        });

        var placeLat = place.geometry.location.lat();
        var placeLng = place.geometry.location.lng();
        console.log(placeLat + ", " + placeLng);

        var urlNearbyHospitals = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location="+placeLat+","+placeLng+"&radius=1500&type=hospital";

        $.ajax({
            url: urlNearbyHospitals,
            type: "GET",
            dataType: "jsonp",
            cache: false,
            success: function (result) {
                var hospitales = [];
                result.forEach(element => {
                    hospitales.push({
                        nombre: element.name
                        // location: element.geometry.location
                    });
                    console.log(hospitales);
                });
            },
            fail: function(error) {
                console.log("falló");
            }
        });
    });
});

$(document).on("change", "#" + "ubicacion-autocomplete", function () {
    nearPlaceLat = 0;
    nearPlaceLng = 0;
});

google.maps.event.addDomListener(window, "load", initMap);
