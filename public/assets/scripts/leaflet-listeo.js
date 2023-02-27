
/* ----------------- Start Document ----------------- */
$(document).ready(function(){
if(document.getElementById("map") !== null){

	// Touch Gestures
	if ( $('#map').attr('data-map-scroll') == 'true' || $(window).width() < 992 ) {
		var scrollEnabled = false;
	} else {
		var scrollEnabled = true;
	}

	var mapOptions = {
		gestureHandling: scrollEnabled,
	}

	// Map Init
	window.map = L.map('map',mapOptions);
	$('#scrollEnabling').hide();


	// ----------------------------------------------- //
	// Popup Output
	// ----------------------------------------------- //

    var businessname ;


    $(document).ready(function() {
        function getData() {
            $.ajax({
                url: "http://localhost:8000/test",
                type: "GET",
                success: function(data){
                var business = data.business;
                for(let i = 0; i < business.length; i++){
                            businessname = business[i].name;
                            var address = business[i].address;
                            var slug = business[i].slug;
                            var featureimage = business[i].featureImage;
                            // console.log(businessname);
                            // e.preventDefault();
                }
                            function locationData(locationURL,locationImg,locationTitle, locationAddress, locationPhone) {
                                return(''+
                                  '<a href="/show/'+ locationURL +'" class="leaflet-listing-img-container">'+
                                     '<div class="infoBox-close"><i class="fa fa-times"></i></div>'+
                                     '<img src="http://localhost:8000/business/feature/'+locationImg+'" alt="">'+

                                     '<div class="leaflet-listing-item-content">'+
                                        '<h3>'+locationTitle+'</h3>'+
                                        '<span>'+locationAddress+'</span>'+
                                     '</div>'+

                                  '</a>'
                                  )
                              }


                              // Listing rating on popup (star-rating or numerical-rating)
                              var infoBox_ratingType = 'star-rating';

                              map.on('popupopen', function () {
                                  if (infoBox_ratingType = 'numerical-rating') {
                                      numericalRating('.leaflet-popup .'+infoBox_ratingType+'');
                                  }
                                  if (infoBox_ratingType = 'star-rating') {
                                      starRating('.leaflet-popup .'+infoBox_ratingType+'');
                                  }
                              });


                              L.tileLayer(
                                'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
                                maxZoom: 18,
                            }).addTo(map);


                            console.log(business);
                            var locations = [];
                                for(let i = 0; i < business.length; i++){
                                var temp = [ locationData(`${business[i].slug}`,`${business[i].featureImage}`,`${business[i].name}`,`${business[i].address}`,`${business[i].phone}`), `${business[i].latitude}`, `${business[i].longitude}`, 1, '<i class="im im-icon-Map-Marker2"></i>']
                                locations.push(temp);
                                };
                                console.log(locations);


                            // MapBox (Requires API Key)
                            // -----------------------//
                            // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}@2x.png?access_token={accessToken}', {
                            //     attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
                            //     maxZoom: 18,
                            //     id: 'mapbox.streets',
                            //     accessToken: 'ACCESS_TOKEN'
                            // }).addTo(map);


                            // ThunderForest (Requires API Key)
                            // -----------------------//
                            // var ThunderForest_API_Key = 'API_KEY';
                            // var tileUrl = 'https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey='+ThunderForest_API_Key,
                            // layer = new L.TileLayer(tileUrl, {maxZoom: 18});
                            // map.addLayer(layer);


                            // ----------------------------------------------- //
                            // Markers
                            // ----------------------------------------------- //
                                markers = L.markerClusterGroup({
                                    spiderfyOnMaxZoom: true,
                                    showCoverageOnHover: false,
                                  });


                                for (var i = 0; i < locations.length; i++) {

                                  var listeoIcon = L.divIcon({
                                      iconAnchor: [20, 51], // point of the icon which will correspond to marker's location
                                      popupAnchor: [0, -51],
                                      className: 'listeo-marker-icon',
                                      html:  '<div class="marker-container">'+
                                               '<div class="marker-card">'+
                                                  '<div class="front face">' + locations[i][4] + '</div>'+
                                                  '<div class="back face">' + locations[i][4] + '</div>'+
                                                  '<div class="marker-arrow"></div>'+
                                               '</div>'+
                                             '</div>'
                                    }
                                  );

                                    var popupOptions =
                                      {
                                      'maxWidth': '270',
                                      'className' : 'leaflet-infoBox'
                                      }
                                        var markerArray = [];
                                    marker = new L.marker([locations[i][1],locations[i][2]], {
                                        icon: listeoIcon,

                                      })
                                      .bindPopup(locations[i][0],popupOptions );
                                      //.addTo(map);
                                      marker.on('click', function(e){

                                       // L.DomUtil.addClass(marker._icon, 'clicked');
                                      });
                                      map.on('popupopen', function (e) {
                                      //   L.DomUtil.addClass(e.popup._source._icon, 'clicked');


                                      // }).on('popupclose', function (e) {
                                      //   if(e.popup){
                                      //     L.DomUtil.removeClass(e.popup._source._icon, 'clicked');
                                      //   }

                                      });
                                      markers.addLayer(marker);
                                }
                                map.addLayer(markers);


                                markerArray.push(markers);
                                if(markerArray.length > 0 ){
                                  map.fitBounds(L.featureGroup(markerArray).getBounds().pad(0.2));
                                }


                            // Custom Zoom Control
                            map.removeControl(map.zoomControl);

                            var zoomOptions = {
                                zoomInText: '<i class="fa fa-plus" aria-hidden="true"></i>',
                                zoomOutText: '<i class="fa fa-minus" aria-hidden="true"></i>',
                            };

                            // Creating zoom control
                            var zoom = L.control.zoom(zoomOptions);
                            zoom.addTo(map);




                        // ----------------------------------------------- //
                        // Single Listing Map
                        // ----------------------------------------------- //
                        function singleListingMap() {

                            var lng = parseFloat($( '#singleListingMap' ).data('longitude'));
                            var lat =  parseFloat($( '#singleListingMap' ).data('latitude'));
                            var singleMapIco =  "<i class='"+$('#singleListingMap').data('map-icon')+"'></i>";

                            var listeoIcon = L.divIcon({
                                iconAnchor: [20, 51], // point of the icon which will correspond to marker's location
                                popupAnchor: [0, -51],
                                className: 'listeo-marker-icon',
                                html:  '<div class="marker-container no-marker-icon ">'+
                                                 '<div class="marker-card">'+
                                                    '<div class="front face">' + singleMapIco + '</div>'+
                                                    '<div class="back face">' + singleMapIco + '</div>'+
                                                    '<div class="marker-arrow"></div>'+
                                                 '</div>'+
                                               '</div>'

                              }
                            );

                            var mapOptions = {
                                center: [lat,lng],
                                zoom: 13,
                                zoomControl: false,
                                gestureHandling: true
                            }

                            var map_single = L.map('singleListingMap',mapOptions);
                            var zoomOptions = {
                               zoomInText: '<i class="fa fa-plus" aria-hidden="true"></i>',
                               zoomOutText: '<i class="fa fa-minus" aria-hidden="true"></i>',
                            };

                            // Zoom Control
                            var zoom = L.control.zoom(zoomOptions);
                            zoom.addTo(map_single);

                            map_single.scrollWheelZoom.disable();

                            marker = new L.marker([lat,lng], {
                                  icon: listeoIcon,
                            }).addTo(map_single);

                            // Open Street Map
                            // -----------------------//
                            L.tileLayer(
                                'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
                                maxZoom: 18,
                            }).addTo(map_single);


                            // MapBox (Requires API Key)
                            // -----------------------//
                            // L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}@2x.png?access_token={accessToken}', {
                            //     attribution: " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
                            //     maxZoom: 18,
                            //     id: 'mapbox.streets',
                            //     accessToken: 'ACCESS_TOKEN'
                            // }).addTo(map_single);


                            // Street View Button URL
                            $('a#streetView').attr({
                                href: 'https://www.google.com/maps/search/?api=1&query='+lat+','+lng+'',
                                target: '_blank'
                            });
                        }

                        if(document.getElementById("singleListingMap") !== null){
                            singleListingMap();
                        }


                }

            });
        }
        getData();

    });

}

});
