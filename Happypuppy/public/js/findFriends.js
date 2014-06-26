var map;
var markers = [];
function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng($('#map-wrapper').attr('data-user-latitude'), $('#map-wrapper').attr('data-user-longitude')),
      zoom: 11
    };
    map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
    
    showHome();
    var w = $('#map-canvas').parent().width();
    var h = w * 0.75;
    $('#map-canvas').css({'width': w,'height': h});
    
}
function showHome()
  {
//  x.innerHTML = "Latitude: " + position.coords.latitude + 
//  "<br>Longitude: " + position.coords.longitude; 

    var homemarker = new google.maps.Marker({
        position: new google.maps.LatLng($('#map-wrapper').attr('data-user-latitude'), $('#map-wrapper').attr('data-user-longitude')),
        map: map,
        title: 'Home',
        icon: './img/home.png'
    });
    
}
google.maps.event.addDomListener(window, 'load', initialize);

$(window).resize(function () {
    var w = $('#map-canvas').parent().width();
    var h = w * 0.75;
    $('#map-canvas').css({'width': w,'height': h});
    //google.maps.event.trigger(map, 'resize');
}).resize(); 

$(document).ready(function () {
   $('#searchFiendsForm').submit(function (e) {
        event.preventDefault();
        $.ajax({
             type: 'POST',
             url: 'searchFriends',
             data: {distance : $('#distance').val()},
             dataType: 'text'
         })
        .done(function(data) {
//            console.log(data);
            deleteMarkers();
            friends = JSON.parse(data);
            if (jQuery.isEmptyObject(friends))
            {
                alert ('No friends found');
                return false;
            }
            else
            {
                showFriends(friends);
            }
        });

       return false;
   }); 
});

function deleteMarkers() {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(null);
  }
  markers = [];
}

function showFriends(friends)
{
    for (i = 0; i < friends.length; i++)
    {
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(friends[i].latitude, friends[i].longitude),
            map: map,
            title: friends[i].realname,
            icon: './img/friendHome.png'
        });
        markers.push(marker);
        dogString = '';
        for (j = 0; j < friends[i].dogs.length; j++)
        {
            if (friends[i].dogs[j].picture == null)
                dogString += '<div class="row dogListItem"><div class="columns small-6"><img src="./uploadImage/avatar/dog-default.png"></div>'
            else
                dogString += '<div class="row dogListItem"><div class="columns small-6"><img src="./uploadImage/avatar/' + friends[i].dogs[j].picture + '"></div>'
            dogString += '<div class="columns small-6">' + friends[i].dogs[j].name + '<br>';
            dogString += friends[i].dogs[j].breed + '<br>';
            dogString += friends[i].dogs[j].gender + '<br>';
            dogString += friends[i].dogs[j].color + '<br></div></div>';
        }
        contentString = '<div class="infoWindow"><table><tr><td>Name:</td><td>' + friends[i].realname + '</td></tr>'
                        + '<tr><td>Address:</td><td>' + friends[i].address + '<br>'
                        + friends[i].city + ', ' + friends[i].province + ' ' + friends[i].postalcode + '</td></tr>'
                        + '<tr><td>Phone:</td><td>' + friends[i].telephone + '</td></tr>'
                        + '<tr><td>Email:</td><td>' + friends[i].email + '</td></tr>'
                        + '<tr><td colspan=2>Dogs:</td></tr>'
                        + '<tr><td colspan=2 class="text-center">' + dogString + '</td></tr></table></div>';
        attachInfoWindow(marker, contentString)        
    }
}

function attachInfoWindow(marker, content) {
    var infowindow = new google.maps.InfoWindow({
      content: content
    });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(marker.get('map'), marker);
    });
}