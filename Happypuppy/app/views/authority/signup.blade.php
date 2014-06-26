@extends('master')

@section('customcss')
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="{{ url('/') }}/css/authority.css" />
@stop

@section('content')
<div class="row">
    <div  class="signup large-6 medium-6 large-centered medium-centered small-centered columns"> 
     {{ Form::open(array('action' => 'AuthorityController@postSignup','files'=> true , 'id' => 'registrationForm')) }}
        <h2>User Registration</h2>
        <table>
            <tr>
                <td>Real Name: </td>
                <td>
                    <input name="realname" type="text" placeholder="Real Name" required autofocus>
                     {{ $errors->first('realname', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td> 
                    <input name="username" type="text" placeholder="Username" required>
                    {{ $errors->first('username', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>
                    <input name="email" type="text" placeholder="Email" required>
                    {{ $errors->first('email', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    <input id="psw"  name="password" type="password" placeholder="Password" required>
                    <span>
                        <button type="button" onclick="Hint()">?</button>
                    </span>
                    <div>{{ $errors->first('password', '<strong class="error">:message</strong>') }}</div>
                </td>
            </tr>
            <tr>
                <td>Confirm password: </td>
                <td>
                    <input name="password_confirmation" type="password" placeholder="Confirm password" required>
                    {{ $errors->first('password_confirmation', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Security question: </td>
                <td>
                    <select id="question" name='question'>
                        <option>What your father's first name? </option>
                        <option>What your mother's first name? </option>
                        <option>What your grandfather's first name? </option>
                        <option>What your grandmother's first name? </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Security answer:</td>
                <td>
                    <input name="answer" type="text" placeholder="Answer" required>
                    {{ $errors->first('answer', '<strong class="error">:message</strong>') }}
                </td>
            </tr>  
            <tr>
                <td>Phone number: </td>
                <td>
                    <input name="phone" type="text" placeholder="Phone" required>
                    {{ $errors->first('phone', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Birthday: </td>
                <td>
                    <input name="birthday" id="birthday" type="text" placeholder="Birthday" required>
                    {{ $errors->first('birthday', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Address: </td>
                <td>
                    <input id="address" name="address" type="text" placeholder="Address" required>
                    <input type="hidden" name="merge_address" id="merge_address" value="">
                    {{ $errors->first('address', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>City: </td>
                <td>
                    <input id="city" name="city" type="text" placeholder="City" required>
                    {{ $errors->first('city', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Province: </td>
                <td>
                    <input id="province" name="province" type="text" placeholder="Province" required>
                    {{ $errors->first('province', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Postal Code: </td>
                <td>
                    <input name="postal" type="text" placeholder="Postal" required>
                     {{ $errors->first('postal', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Image: </td>
                <td>
                    <input name="image" type="file" placeholder="Image" required> 
                    {{ $errors->first('image', '<strong class="error">:message</strong>') }}
                </td>
            </tr>
            <tr>
                <td>Do you want to become a public user? </td>
                <td>
                    <input type="radio" name="public" value="YES" checked>Yes
                    <input type="radio" name="public" value="NO">No &nbsp;
                    <span>
                        <button type="button" onclick="Hint_user()">?</button>
                    </span>
                </td>
            </tr>
        </table>
        <!--<input id="btn1" type="button" value="Registration">-->
       
        <input id="btn_registration" type="submit" value="Submit">
        
    {{ Form::close() }}
    </div>
</div>

@stop

@section('scriptonbottom')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
    $(function() {
        $( "#birthday" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });
</script>

<script type="text/javascript">
    function Hint(){
        alert("Please use letter, number, underscore, strike. The length should be between 6 to 16 bits.");
    }
    function Hint_user(){
        alert("Public users description");
    }    
</script>

<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?sensor=false">
</script>
<script type="text/javascript">
    var geocoder;
    var map;
    var getAddressDone = false;
    $(document).ready(function () {
        $('#registrationForm').submit(function (e) {
            if (!getAddressDone)
            {
                e.preventDefault();
                //alert("1");
                var address = document.getElementById("address").value + "," + document.getElementById("city").value + "," + document.getElementById("province").value;
                geocoder = new google.maps.Geocoder();
                //alert("2");  
                geocoder.geocode({ 'address': address}, function(results) {
                    //alert("3");  
                    //Get the latitude and the longitude
                    document.getElementById("merge_address").value = results[0].geometry.location;
//                    alert("4");  
//                    alert(document.getElementById("merge_address").value);
                    getAddressDone = true;
                    $('#registrationForm').submit();
                });
            }

        });
    });
</script>
@stop


