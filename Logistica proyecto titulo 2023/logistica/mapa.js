let map = L.map('map').setView([-26.74498953523902, -70.11705815627623],6)

//Agregar tilelAyer mapa base desde openstreetmap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
  minZoom:7,
  maxzoom:20,
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

document.getElementById('select-location').addEventListener('change',function(e){
  let coords = e.target.value.split(",");
  map.flyTo(coords,16);
})

// Agregar un marcador jynx
var marker_cerro = L.circleMarker(L.latLng(-33.44832752066772, -70.56766918970794), {
  opacity: 1,
  draggable:false,
}).addTo(map);
 
// Agregar un marcador san bernardo
var marker_cerro = L.circleMarker(L.latLng(-33.582874, -70.704997), {
  opacity: 1,
  draggable:false,
}).addTo(map);

// Agregar un marcador rancagua
var marker_cerro = L.circleMarker(L.latLng(-34.16980637493457, -70.73583016400315), {
  opacity: 1,
  draggable:false,
}).addTo(map);

// Agregar un marcador huechuraba
var marker_cerro = L.circleMarker(L.latLng(-33.375004, -70.644606), {
  opacity: 1,
  draggable:false,
}).addTo(map);