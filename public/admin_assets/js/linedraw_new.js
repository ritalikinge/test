/*
	1. a00000 - dark red
	2. 03689b - dark blue
	3. 2cc960 - light green
	4. 49a2fc - light blue
	5. ba51ad - pink
	6. 1d7f18 - dark green
	7. 5c5c63 - dark gray
	8. 7a79b7 - lavender
	9. 302020 - light black
   10. aa008e - dark pink
   
*/

var colors = Array('#a00000','#03689b','#aa008e','#49a2fc','#ba51ad', '#1d7f18','#5c5c63','#7a79b7','#302020','#2cc960');

function draw_new_line_leaflet(map,color,drawline,marker_details,route_type){
	// console.log(route_type);
   var car = "M17.402,0H5.643C2.526,0,0,3.467,0,6.584v34.804c0,3.116,2.526,5.644,5.643,5.644h11.759c3.116,0,5.644-2.527,5.644-5.644 V6.584C23.044,3.467,20.518,0,17.402,0z M22.057,14.188v11.665l-2.729,0.351v-4.806L22.057,14.188z M20.625,10.773 c-1.016,3.9-2.219,8.51-2.219,8.51H4.638l-2.222-8.51C2.417,10.773,11.3,7.755,20.625,10.773z M3.748,21.713v4.492l-2.73-0.349 V14.502L3.748,21.713z M1.018,37.938V27.579l2.73,0.343v8.196L1.018,37.938z M2.575,40.882l2.218-3.336h13.771l2.219,3.336H2.575z M19.328,35.805v-7.872l2.729-0.355v10.048L19.328,35.805z";	

	var color = color;
	
	// if(route_type == 'default_with_circle'){
	// 	var lineSymbol = {
	// 		path: google.maps.SymbolPath.CIRCLE,
	// 		strokeColor: color,
	// 		fillColor: color,
	// 		fillOpacity: 1,
	// 		scale : 2
	// 	}; 
	// }else if(route_type == 'stop_animate'){
	// 	var lineSymbol = {
	// 		path: google.maps.SymbolPath.CIRCLE,
	// 		strokeColor: color,
	// 		fillColor: color,
	// 		fillOpacity: 1,
	// 		scale : 3
	// 	}; 
	// }else{
	// 	var lineSymbol = {
	// 		path: car,
	// 		scaledSize: new google.maps.Size(20, 20), // scaled size
	// 		scale: .5,
	// 		strokeColor: color,
	// 		fillColor: color,
	// 		fillOpacity: 1,
	// 		offset: '5%'
	// 	};  
	// }

	// var mapline = new L.Polyline(drawline, {
	// 	color: color,
	// 	weight: 3,
	// 	opacity: 0.7,
	// 	smoothFactor: 1
	// });
	// mapline.addTo(map);

	// var mapline = new L.Polyline(drawline, {		
	// 	color: color,
	// 	weight: 3,
	// 	opacity: 0.8,
	// 	smoothFactor: 1,
	// 	snakingSpeed: 100
	// });
	// mapline.addTo(map).snakeIn();

	// DASH PATH BETWEEN START AND END MARKERS

	if(route_type == 'defined'){
		var mapline = new L.Polyline(drawline, {			
			color: '#0000FF',
			weight: 4,
			opacity: 0.7,
			smoothFactor: 1,
		});
		mapline.addTo(map);
	}else{
		var mapline = new L.Polyline.AntPath(drawline, {
			"delay": 2000,
			"dashArray": [
				5,
				20
			],
			
			color: '#0000FF',
			weight: 4,
			opacity: 0.7,
			smoothFactor: 1,
	
			"pulseColor": '#fff',
			"paused": false,
			"reverse": false,
			"hardwareAccelerated": true
		});
		mapline.addTo(map);
	
		map.addLayer(mapline);
		map.fitBounds(mapline.getBounds())
	}

    // var mapline = new google.maps.Polyline({
    //     path: drawline,
    //     geodesic: true,
    //     icons: [{
    //         icon: lineSymbol,
    //         offset: '100%'
    //     }],			
    //     strokeColor: color,
    //     strokeOpacity: 0.7,
    //     strokeWeight: 3,
    //     editable: false
    //      // editable: true
    // });
	
	// if(route_type == 'stop_animate'){			
	// }else{
	// 	animateCircle(mapline);
	// }
    // mapline.setMap(map);
	
    var start_lat = drawline[0].lat;
    var start_lng = drawline[0].lng;

    marker_pos = [start_lat, start_lng];
	if(route_type != 'none'){
		if(route_type == 'defined'){
			// var image = {
			// 	url :base_url+'assets/img/skyblue_location.png',
			// 	scaledSize: new google.maps.Size(65, 65) // scaled size
			// }
			var imageUrl =  base_url+'assets/img/skyblue_location.png';

		}else if(route_type == 'travelled'){
			// var image = {
			// 	url :base_url+'assets/img/pink_location.png',
			// 	scaledSize: new google.maps.Size(65, 65) // scaled size
			// }
			var imageUrl =  base_url+'assets/img/pink_location.png';
		}else if(route_type == 'default_with_circle'){
			// var image = {
			// 	path: google.maps.SymbolPath.CIRCLE,
			// 	scale: 2,
			// 	strokeColor: color,
			// 	fillColor: color,
			// 	fillOpacity: 8
			// }		
			// var imageUrl =  base_url+'assets/img/skyblue_location.png';
		}else if(route_type == 'stop_animate'){
			// var image = {
			// 	url :base_url+'assets/img/skyblue_location.png',
			// 	scaledSize: new google.maps.Size(65, 65) // scaled size
			// }		
			var imageUrl =  base_url+'assets/img/skyblue_location.png';
		}
	}else{
		// var image = {
		// 	url :base_url+'assets/img/skyblue_location.png',
		// 	scaledSize: new google.maps.Size(65, 65) // scaled size
		// }
		var imageUrl =  base_url+'assets/img/skyblue_location.png';
	}

	var image = L.icon({
		iconUrl: imageUrl,
		iconSize: [65, 65],
	});

	marker = L.marker(
				marker_pos, 
				{	
					icon: image,
					title: 'Start location'
				}
			).addTo(map);	

	// var marker = new google.maps.Marker({
	// 		position: marker_pos,
	// 		title: 'Start location',
	// 		map:map,
	// 		icon: image
	// 	});

	if(marker_details != 'none'){
		var info_str = '<strong>Vehicle Number</strong> : <a href="'+base_url+'route_deviation/index/'+marker_details.vehicleId+'/0/all_routes">'+marker_details.vehicle_number+'</a>';

		marker.bindPopup(info_str);
	} 
	
    var last_index = parseInt(drawline.length) - 1; 
    var end_lat = drawline[last_index].lat;
    var end_lng = drawline[last_index].lng;

    marker_pos = [end_lat, end_lng];
 
	if(route_type != 'none'){
		if(route_type == 'defined'){
			// var image = {
			// 	url :base_url+'assets/img/orange_location.png',
			// 	scaledSize: new google.maps.Size(50, 50) // scaled size
			// }
			var imageUrl = base_url+'assets/img/orange_location.png';

		}else if(route_type == 'travelled'){
			// var image = {
			// 	url :base_url+'assets/img/brown_location.png',
			// 	scaledSize: new google.maps.Size(50, 50) // scaled size
			// }		
			var imageUrl = base_url+'assets/img/brown_location.png';

		}else if(route_type == 'default_with_circle'){
			// var image = {
			// 	path: google.maps.SymbolPath.CIRCLE,
			// 	scale: 2,
			// 	strokeColor: color,
			// 	fillColor: color,
			// 	fillOpacity: 8
			// }		
			// var imageUrl = base_url+'assets/img/orange_location.png';

		}else if(route_type == 'stop_animate'){
			// var image = {
			// 	url :base_url+'assets/img/orange_location.png',
			// 	scaledSize: new google.maps.Size(50, 50) // scaled size
			// }
			var imageUrl = base_url+'assets/img/orange_location.png';
		
		}
	}else{
		// var image = {
		// 	url :base_url+'assets/img/orange_location.png',
		// 	scaledSize: new google.maps.Size(50, 50) // scaled size
		// }
		var imageUrl = base_url+'assets/img/orange_location.png';
	}

	var image = L.icon({
		iconUrl: imageUrl,
		iconSize: [50, 50]
	});

	marker = L.marker(
		marker_pos, 
		{	
			icon: image,
			title: 'End location'
		}
	).addTo(map);
}
