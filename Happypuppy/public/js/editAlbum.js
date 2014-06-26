var map;
var markers = [];
var picmarker;
function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng($('#editAlbumForm').attr('data-latitude'), $('#editAlbumForm').attr('data-longitude')),
      zoom: 11
    };
    map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
    
    showHome();
    var w = $('#map-canvas').parent().width();
    var h = w * 0.75;
    $('#map-canvas').css({'width': w,'height': h});
    //google.maps.event.trigger(map, 'resize');  

    google.maps.event.addListener(picmarker, "dragend", function(event) { 
        $('#picLatitude').val(event.latLng.lat()); 
        $('#picLongitude').val(event.latLng.lng()); 
    }); 
    
}

function showHome()
  {
//  x.innerHTML = "Latitude: " + position.coords.latitude + 
//  "<br>Longitude: " + position.coords.longitude; 

    var homemarker = new google.maps.Marker({
        position: new google.maps.LatLng($('#editAlbumForm').attr('data-user-latitude'), $('#editAlbumForm').attr('data-user-longitude')),
        map: map,
        title: 'Home',
        icon: '../img/home.png'
    });
    
//    var pinIcon = new google.maps.MarkerImage(
//        $('.albumimage').attr('src'),
//        null, /* size is determined at runtime */
//        null, /* origin is 0,0 */
//        null, /* anchor is bottom center of the scaled image */
//        new google.maps.Size(42, 68)
//    );
    picmarker = new google.maps.Marker(
    {
        map:map,
        draggable:true,
        position: new google.maps.LatLng($('#editAlbumForm').attr('data-latitude'), $('#editAlbumForm').attr('data-longitude')),
         icon: '../img/marker.png'
    });
google.maps.event.addListener(picmarker, "dragend", function(event) { 
    console.log('dragged');
    $('#picLatitude').val(event.latLng.lat()); 
    $('#picLongitude').val(event.latLng.lng()); 
}); 

}

google.maps.event.addDomListener(window, 'load', initialize);

$(window).resize(function () {
    var w = $('#map-canvas').parent().width();
    var h = w * 0.75;
    $('#map-canvas').css({'width': w,'height': h});
    //google.maps.event.trigger(map, 'resize');
}).resize(); 

$('.editAlbumImage').magnificPopup({
    type:'image'
});