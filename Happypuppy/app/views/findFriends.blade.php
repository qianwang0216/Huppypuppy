@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/friends.css" />
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAcS-ge1EuDdTB0YwaDqwL9qB3wZVk-d4&sensor=false&language=en-CA">
</script>
@stop

@section('content')
    <div class="findFriends">
        {{ Form::open(array('action'=>'GalleryController@searchFriends', 'id'=>'searchFiendsForm')) }}
        <div class="row">
            <div class="columns large-offset-3 large-4 medium-offset-3 medium-4 small-12">
                <div class="row">
                    <div class="columns small-3">
                        <label class="inline">Distance</label>
                    </div>
                    <div class="columns small-9">
                        <select name="distance" id="distance">
                            <option value="1">Within 1KM</option>
                            <option value="5">Within 5KM</option>
                            <option value="10">Within 10KM</option>
                            <option value="25">Within 25KM</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="columns large-2 medium-2 small-12 end text-center">
                <button>Submit</button>
            </div>             
        </div>
        {{ Form::close() }}
        <div class="row">
            <div id="map-wrapper" class="map-wrapper columns large-12 medium-12 small-12" data-user-latitude="{{ $user->latitude }}" data-user-longitude="{{ $user->longitude }}">
                <div id="map-canvas"></div>
            </div>
        </div>
    </div>
@stop

@section('scriptonbottom')
    <script src="{{ url('/') }}/js/findFriends.js" ></script>
@stop