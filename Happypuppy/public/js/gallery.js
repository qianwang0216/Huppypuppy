/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    $('#albumlist').elastislide();

    $('.popup-gallery').magnificPopup({
      delegate: '.albumitem',
      type: 'image',
      tLoading: 'Loading image #%curr%...',
      mainClass: 'mfp-img-mobile',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      image: {
        tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
        titleSrc: function(item) {
          return '<div class="albumdogname">' + item.el.attr('data-dog-name') + '</div><div>' + item.el.attr('title') + '</div><div><a href="editAlbum/' + item.el.attr('data-idimage') + '">Edit</a>&nbsp;<a href="deleteAlbum/' + item.el.attr('data-idimage') + '">Delete</a></div>';
        }
      }
    });
    
    $('.open-popup-link').magnificPopup({
        type:'inline',
        midClick: true 
    });
    
  });
  

var map;
var markers = [];
var picmarkers = [];
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
    
    $('.albumitem').each(function () {
        var img=new Image;
        img.src=$(this).attr('href');
        pinIcon = new google.maps.MarkerImage(
            $(this).attr('href'),
            null, /* size is determined at runtime */
            null, /* origin is 0,0 */
            null, /* anchor is bottom center of the scaled image */
            new google.maps.Size(48 * (img.width/img.height), 48)
        );
        picmarker = new google.maps.Marker(
        {
            map:map,
            draggable:false,
            position: new google.maps.LatLng($(this).attr('data-latitude'), $(this).attr('data-longitude')),
            icon: pinIcon
        });
        picmarkers.push(picmarker);
        titleSrc = '<div class="albumdogname">' + $(this).attr('data-dog-name') + '</div><div>' + $(this).attr('title') + '</div><div><a href="editAlbum/' + $(this).attr('data-idimage') + '">Edit</a>&nbsp;<a href="deleteAlbum/' + $(this).attr('data-idimage') + '">Delete</a></div>';
        console.log(titleSrc);
        attachImage(picmarker, $(this).attr('href'), titleSrc);
      
    });
//    var pinIcon = new google.maps.MarkerImage(
//        $('.albumimage').attr('src'),
//        null, /* size is determined at runtime */
//        null, /* origin is 0,0 */
//        null, /* anchor is bottom center of the scaled image */
//        new google.maps.Size(42, 68)
//    );
//    picmarker = new google.maps.Marker(
//    {
//        map:map,
//        draggable:true,
//        position: new google.maps.LatLng($('#editAlbumForm').attr('data-latitude'), $('#editAlbumForm').attr('data-longitude')),
//         icon: '../img/marker.png'
//    });
}

function attachImage (picmarker, imgSrc, titleSrc)
{
    google.maps.event.addListener(picmarker, 'click', function() {
        $.magnificPopup.open({
            items: {
              src: imgSrc
            },
            type: 'image',
            callbacks: {
            open: function() {
              $('.mfp-title').html(titleSrc);
            },
            close: function() {
              $('.mfp-title').html('');
            }
          }
        });
    });      
}

google.maps.event.addDomListener(window, 'load', initialize);

$(window).resize(function () {
    var w = $('#map-canvas').parent().width();
    var h = w * 0.75;
    $('#map-canvas').css({'width': w,'height': h});
    //google.maps.event.trigger(map, 'resize');
}).resize(); 