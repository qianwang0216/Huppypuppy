@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/gallery.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/elastislide.css" />
<link href="{{ url('/') }}/css/magnific-popup.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAcS-ge1EuDdTB0YwaDqwL9qB3wZVk-d4&sensor=false&language=en-CA">
</script>
@stop

@section('content')
    <div class="dogGallery">
        <div class="album-wrapper row">
            <ul id="albumlist"  class="elastislide-list popup-gallery">
                @foreach ($albums as $album)
                    <li><a class="albumitem" title="{{ $album->caption }}" data-latitude="{{ $album->latitude }}"  data-longitude="{{ $album->longitude }}" data-idimage="{{ $album->idImage }}" data-dog-name="{{ $album->dog->name }}" href="{{ url('/') }}/uploadImage/{{ $album->idDog }}/{{ $album->imageFileName }}"><img src="{{ url('/') }}/uploadImage/{{ $album->idDog }}/{{ $album->imageFileName }}" alt="image" /></a></li>
                @endforeach
                <li><a href="#addAlbumForm" class="open-popup-link"><div class="addAlbum"></div></a></li>
            </ul>
        </div>
        <div class="row">
            <div id="map-wrapper" class="map-wrapper columns large-12 medium-12 small-12" data-user-latitude="{{ $user->latitude }}" data-user-longitude="{{ $user->longitude }}">
                <div id="map-canvas"></div>
            </div>
        </div>
        <div id="addAlbumForm" class="uploadGalleryImage white-popup mfp-hide">
            {{ Form::open(array('action' => 'GalleryController@uploadAlbum', 'files' => true)) }}
            <div class="dogGalleryItem row">
                <div class="small-4 columns"><label class="right inline">Image:</label></div>
                <div class="small-8 columns"><input type='file' name='dogGalleryImage' accept="image/*" required="required"></div>
            </div>
<!--            <div class="dogGalleryItem row">
                <div class="small-4 columns"><label class="right inline">Caption:</label></div>
                <div class="small-8 columns"><input type="text" name="caption" placeholder="Figure caption"></div>
            </div>-->
            <div class="dogGalleryItem row">
                <div class="small-4 columns"><label class="right inline">Dog:</label></div>
                <div class="small-8 columns">
                    <select name="idDog">
                    @foreach ($dogs as $dog)
                    <option value="{{ $dog->idDog }}">{{ $dog->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="dogGalleryItem row">
                <div class="small-12 columns text-center"><button>Upload</button></div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scriptonbottom')
    <script src="{{ url('/') }}/js/jquery.elastislide.js" ></script>
    <script src="{{ url('/') }}/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/js/gallery.js" ></script>
@stop