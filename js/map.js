function initMap() {
  // The location of RACAuckland
  var RACAuckland = { lat: -36.845305, lng: 174.763603 };
  // The map, centered at RACAuckland
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    center: RACAuckland,
  });
  // The marker, positioned at RACAuckland
  var marker = new google.maps.Marker({ position: RACAuckland, map: map });
}
