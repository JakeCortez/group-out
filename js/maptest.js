function initialize() {
        var mapOptions = {
          center: { lat: -34.397, lng: 150.644},
          zoom: 8
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
        var drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.MARKER,
            drawingControl: true,
            drawingControlOptions: {
              position: google.maps.ControlPosition.TOP_CENTER,
              drawingModes: [
                google.maps.drawing.OverlayType.MARKER,
              google.maps.drawing.OverlayType.POLYLINE
               
              ]
            },
            markerOptions: {
              icon: 'http://www.example.com/icon.png'
            },
            circleOptions: {
              fillColor: '#ffff00',
              fillOpacity: 1,
              strokeWeight: 5,
              clickable: false,
              zIndex: 1,
              editable: true
            }
        });
          drawingManager.setMap(map);
    }
google.maps.event.addDomListener(window, 'load', initialize);