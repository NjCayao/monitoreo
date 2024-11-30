<html>
	<head>
		<script src="openlayers/lib/OpenLayers.js"></script>
	</head>
	<body>
		<div id="demoMap" style="width:960px; height:540px"></div>
	</body>

	<script>
	/// En esta parte vamos a definir las variables
    var lat            = -12.150170; // Latitud
    var lon            = -76.990500; // Longitud
    var zoom           = 15; // Zoom Inicial
	var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984 / Original
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection / Google Maps
    var position       = new OpenLayers.LonLat(lon, lat).transform( fromProjection, toProjection);     // creamos una posicion / objeto
    var position2       = new OpenLayers.LonLat(-106.3774421, 27.7634607).transform( fromProjection, toProjection);     // Creamos la segunda posicion


    map = new OpenLayers.Map("demoMap"); // Asignamos el mapa al contenedor
    map.addLayer(new OpenLayers.Layer.OSM()); // Agregamos la capa de OpenStreetMap
    map.setCenter(position, zoom) /// Asignamos el centro, la posicion y el zoom inicial

    var markers = new OpenLayers.Layer.Markers( "Markers" ); // Creamos una capa para los marcadores
    map.addLayer(markers); // Agregamos la capa al mapa
    markers.addMarker(new OpenLayers.Marker(position)); // Agregamos el primer marcador
    markers.addMarker(new OpenLayers.Marker(position2)); // Agregamos el segundo marcador
</script>

</html>