function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(38.42616, -122.371216),
    zoom: 11,
    disableDefaultUI: true,
    scrollwheel: false,
  };
  
  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);