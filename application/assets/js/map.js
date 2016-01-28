    var map;
    var infowindow;

    // function initMap() {
    //   var pyrmont = {lat: -33.867, lng: 151.195};

    //   map = new google.maps.Map(document.getElementById('map'), {
    //     center: pyrmont,
    //     zoom: 15
    //   });

    //   infowindow = new google.maps.InfoWindow();

    //   var service = new google.maps.places.PlacesService(map);
    //   service.nearbySearch({
    //     location: pyrmont,
    //     radius: 500,
    //     types: ['store']
    //   }, callback);
    // }

    // function callback(results, status) {
    //   if (status === google.maps.places.PlacesServiceStatus.OK) {
    //     for (var i = 0; i < results.length; i++) {
    //       createMarker(results[i]);
    //     }
    //   }
    // }
    function initMap() {
    var pyrmont = {lat: -33.867, lng: 151.195};
    var pos = {lat: -33.867, lng: 151.195};
    map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });
    var infoWindow = new google.maps.InfoWindow({map: map});

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };

          infoWindow.setPosition(pos);
          //infoWindow.setContent('Location found.');
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
      google.maps.event.addDomListener(map, 'idle', function() {
        map.setCenter(pos);
      });
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pos,
          radius: 500,
          types: ['store']
        }, callback);
    }

    function callback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          var place = results[i];
          createMarker(results[i]);
        }
      }
    }
    function createMarker(place) {
      var placeLoc = place.geometry.location;
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });

      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(place.name);
        infowindow.open(map, this);
      });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    }