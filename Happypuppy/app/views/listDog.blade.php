@extends('master')

@section('customcss')
<link rel="stylesheet" href="{{ url('/') }}/css/dogManagement.css" />
<link rel="stylesheet" href="{{ url('/') }}/css/jquery-ui.css"/>
@stop

@section('content')
<div class="row">
    @foreach ($dogs as $dog) 
    <div class="dogInfo small-12 large-4 medium-6 columns" data-id="{{ $dog->idDog; }}">
        <div class="dogInfoShow">
            <div class="dogActionIcons row">
                <a href="{{ url('deleteDog', array($dog->idDog)) }}"><image src="{{ url('/') }}/img/close.png" title="Delete" class="deleteIcon" /></a><image src="{{ url('/') }}/img/pencil.png" class="editIcon" title="Edit" />
            </div>
            <div class="dogInfoHead row">
                <div class="dogNameGender small-6 columns">
                    <div class="dogName text-center row"><label class="inline">{{ $dog->name; }}</label></div>
                    <div class="dogGender text-center row"><label class="inline">{{ $dog->gender; }}</label></div>
                </div>
                <div class="dogImage small-6 columns">
                    <?php
                        if ($dog->picture == '')
                        {
                    ?>
                    <img class='avatar' src='{{ url('/') }}/uploadImage/avatar/dog-default.png' >
                    <?php
                        }
                        else {
                    ?>
                    <img class='avatar' src='{{ url('/') }}/uploadImage/avatar/{{ $dog->picture; }}' >
                    <?php
                        }
                    ?>
                    
                </div>                
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Breed:</label></div>
                    <div class="small-8 columns"><label class="left inline">{{ $dog->breed; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">DOB:</label></div>
                    <div class="small-8 columns"><label class="left inline">{{ $dog->DOB; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Color:</label></div>
                    <div class="small-8 columns"><label class="left inline">{{ $dog->color; }}</label></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Weight:</label></div>
                    <div class="small-3 columns"><label class="left inline">{{ $dog->weight; }}</label></div>
                    <div class="small-5 columns"><label class="left inline">KG</label></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Description:</label></div>
                    <div class="small-8 columns"><label class="left inline">{{ $dog->description; }}</label></div>
            </div>
        </div>
        <div class="dogEditForm">
            {{ Form::open(array('action' => 'DogController@editDog', 'files' => true)) }}
            <div class="dogActionIcons row"><image src="{{ url('/') }}/img/disk.png" title="Save" class="saveEditIcon" /><image src="{{ url('/') }}/img/undo.png" title="Cancel" class="cancelEditIcon" /></div>
            <div class="dogInfoHead row">
                <div class="dogNameGender small-6 columns">
                    <div class="dogName"><input type="text" name="name" value="{{ $dog->name; }}"><input type="hidden" name="dogid" value="{{ $dog->idDog; }}" /></div>
                    <div class="dogGender text-center"><input type="radio" name="gender" value="Male" {{ $dog->gender=='Male' ?  ' checked="checked" ' : '' }}>Male <input type="radio" name="gender" value="Female" {{ $dog->gender=='Female' ?  ' checked="checked" ' : '' }}>Female</div>
                </div>
                <div class="dogImage small-6 columns">
                    <input type='file' name='dogImage' accept="image/*">
                </div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Breed:</label></div>
                    <div class="small-8 columns"><input type="text" name="breed" value="{{ $dog->breed; }}" required="required"></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">DOB:</label></div>
                    <div class="small-8 columns"><input type="text" name="DOB" value="{{ $dog->DOB; }}" class="DOB" required="required"></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Color:</label></div>
                    <div class="small-8 columns"><input type="text" name="color" value="{{ $dog->color; }}" required="required"></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Weight:</label></div>
                    <div class="small-6 columns"><input type="text" name="weight" value="{{ $dog->weight; }}" required="required"></div>
                    <div class="small-2 columns"><label class="left inline">KG</label></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Description:</label></div>
                    <div class="small-8 columns"><textarea name="description" cols="20" cols="5">{{ $dog->description; }}</textarea></div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
    @endforeach
    <div class="dogInfo dogEmptyAdd small-12 large-4 medium-6 columns end">
        <div class="dogAddIcon">
            <img src="{{ url('/') }}/img/plus.png" alt="Add a new dog" title="Add"/>
        </div>
        <div class="dogAddForm">
            {{ Form::open(array('action' => 'DogController@addDog', 'files' => true)) }}
            <div class="dogActionIcons row"><image src="{{ url('/') }}/img/disk.png" title="Save" class="saveAddIcon right" /> <image src="{{ url('/') }}/img/undo.png" title="Cancel" class="cancelAddIcon right" /></div>
            <div class="dogInfoHead row">
                <div class="dogNameGender small-6 columns">
                    <div class="dogName"><input type="text" name="name" id="name" placeholder="Dog Name"></div>
                    <div class="dogGender text-center"><input type="radio" name="gender" value="Male" checked="checked">Male <input type="radio" name="gender" value="Female">Female</div>
                </div>
                <div class="dogImage small-6 columns">
                    <input type='file' name='dogImage' accept="image/*">
                </div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Breed:</label></div>
                    <div class="small-8 columns"><input type="text" name="breed" id="breed" placeholder="Breed" required="required"></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">DOB:</label></div>
                    <div class="small-8 columns"><input type="text" name="DOB" id="DOB" class="DOB" placeholder="Date of birth" required="required"></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Color:</label></div>
                    <div class="small-8 columns"><input type="text" name="color" id="color" placeholder="Color" required="required"></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Weight:</label></div>
                    <div class="small-6 columns"><input type="text" name="weight" id="weight" placeholder="weight" required="required"></div>
                    <div class="small-2 columns"><label class="left inline">KG</label></div>
            </div>
            <div class="dogInfoItem row">
                    <div class="small-4 columns"><label class="right inline">Description:</label></div>
                    <div class="small-8 columns"><textarea name="description" id="description" cols="20" cols="5"></textarea></div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop

@section('scriptonbottom')
    <script src="{{ url('/') }}/js/jquery-ui.js" ></script>
    <script src="{{ url('/') }}/js/dogManagement.js" ></script>
@stop