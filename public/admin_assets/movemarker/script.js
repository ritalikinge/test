var map = new L.Map('map', {
  zoom: 6,
  minZoom: 3,
});

// create a new tile layer
var tileUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
layer = new L.TileLayer(tileUrl,
{
    attribution: 'Maps © <a href=\"www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors',
    maxZoom: 18
});

// add the layer to the map
map.addLayer(layer);

var parisKievLL = [[48.8567, 2.3508], [50.45, 30.523333]];
map.fitBounds(parisKievLL);

var marker5 = L.Marker.movingMarker(
    parisKievLL,
    10000, {autostart: true}).addTo(map);
// L.polyline(barcelonePerpignanPauBordeauxMarseilleMonaco,
//     {color: 'green'}).addTo(map);