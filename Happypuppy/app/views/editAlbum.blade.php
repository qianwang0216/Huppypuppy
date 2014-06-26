@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/gallery.css" />
<link href="{{ url('/') }}/css/magnific-popup.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAcS-ge1EuDdTB0YwaDqwL9qB3wZVk-d4&sensor=false&language=en-CA">
</script>
@stop

@section('content')
<div id="editAlbumForm" data-latitude="{{ $album->latitude }}" data-longitude="{{ $album->longitude }}" data-user-latitude="{{ $album->dog->user->latitude }}" data-user-longitude="{{ $album->dog->user->longitude }}">
{{ Form::open(array('action' => 'GalleryController@updateAlbum')) }}
            <div class="dogGalleryItem row">
                <div class="small-12 columns text-center">
                    <a href="{{ url('/') }}/uploadImage/{{ $album->idDog }}/{{ $album->imageFileName }}" class="editAlbumImage"><img class="albumimage" src="{{ url('/') }}/uploadImage/{{ $album->idDog }}/{{ $album->imageFileName }}" alt="image" /></a>
                </div>
            </div>
            <div class="dogGalleryItem row">
                <div class="columns large-offset-2 large-8 medium-10 medium-offset-1 small-12">
                    <div class="small-4 larg-3 medium-4 columns"><label class="right inline">Caption:</label></div>
                    <div class="small-8 large-5 medium-6 columns end"><input type="text" name="caption" value="{{ $album->caption }}"></div>
                </div>
            </div>
            <div class="dogGalleryItem row">
                <div id="map-wrapper" class="map-wrapper columns large-offset-2 large-8 medium-10 medium-offset-1 small-12">
                    <div id="map-canvas"></div>
                </div>
            </div>
            <div class="dogGalleryItem row">
                <div class="small-12 columns text-center"><button>Submit</button></div>
                <input type="hidden" name="idImage" value="{{ $album->idImage }}" />
                <input type="hidden" name="latitude" id="picLatitude" value="{{ $album->latitude }}" />
                <input type="hidden" name="longitude" id="picLongitude" value="{{ $album->longitude }}" />
            </div>            
{{ Form::close() }}
</div>
@stop

@section('scriptonbottom')
    <script src="{{ url('/') }}/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/js/editAlbum.js" ></script>
@stop
