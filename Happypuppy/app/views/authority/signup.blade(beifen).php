@extends('master')

@section('content')

@section('title') Registration @parent @stop
<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $("#btn1").click(function(){
       $("#part1").hide(1000);
       $("#part2").show(1000);
     });
});
</script>
-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
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
   function codeAddress() {
       alert("1");
       var address = document.getElementById("address").value + "," + document.getElementById("city").value + "," + document.getElementById("province").value;
geocoder = new google.maps.Geocoder();
       alert("2");  
       geocoder.geocode({ 'address': address}, function(results) {
           alert("3");  
           /*经纬度*/
           document.getElementById("merge_address").value = results[0].geometry.location;
       alert("4");  
       alert(document.getElementById("merge_address").value);
       });
   }
</script>

    {{ Form::open(array('action' => 'AuthorityController@postSignup','files'=> true ,'onsubmit'=>'codeAddress()')) }}
       <h2>User Registration</h2>
       <table>
           <tr>
               <td>Real Name: </td>
               <td>
                   {{ $errors->first('realname', '<strong class="error">:message</strong>') }}
                   <input name="realname" type="text" placeholder="Real Name" required autofocus>
               </td>
           </tr>
           <tr>
               <td>Username: </td>
               <td>
                   {{ $errors->first('username', '<strong class="error">:message</strong>') }}
                   <input name="username" type="text" placeholder="Username" required>
               </td>
           </tr>
           <tr>
               <td>Email: </td>
               <td>
                   {{ $errors->first('email', '<strong class="error">:message</strong>') }}
                   <input name="email" type="text" placeholder="Email" required>
               </td>
           </tr>
           <tr>
               <td>Password: </td>
               <td>
                   {{ $errors->first('password', '<strong class="error">:message</strong>') }}
                   <input name="password" type="password" placeholder="Password" required>
                   <span>
                       <button type="button" onclick="Hint()">?</button>
                   </span>
               </td>
           </tr>
           <tr>
               <td>Confirm password: </td>
               <td>
                  {{ $errors->first('password_confirmation', '<strong class="error">:message</strong>') }}
                   <input name="password_confirmation" type="password" placeholder="Confirm password" required>
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
                  {{ $errors->first('answer', '<strong class="error">:message</strong>') }}
                   <input name="answer" type="text" placeholder="Answer" required>
               </td>
           </tr>  
           <tr>
               <td>Phone number: </td>
               <td>
                   {{ $errors->first('phone', '<strong class="error">:message</strong>') }}
                   <input name="phone" type="text" placeholder="Phone" required>
               </td>
           </tr>
           <tr>
               <td>Birthday: </td>
               <td>
                   {{ $errors->first('birthday', '<strong class="error">:message</strong>') }}
                   <input name="birthday" id="birthday" type="text" placeholder="Birthday" required>
               </td>
           </tr>
           <tr>
               <td>Address: </td>
               <td>
                   {{ $errors->first('address', '<strong class="error">:message</strong>') }}
                   <input id="address" name="address" type="text" placeholder="Address" required>
                   <input type="hidden" name="merge_address" id="merge_address" value=""/>
               </td>
           </tr>
           <tr>
               <td>City: </td>
               <td>
                   {{ $errors->first('city', '<strong class="error">:message</strong>') }}
                   <input id="city" name="city" type="text" placeholder="City" required>
               </td>
           </tr>
           <tr>
               <td>Province: </td>
               <td>
                   {{ $errors->first('province', '<strong class="error">:message</strong>') }}
                   <input id="province" name="province" type="text" placeholder="Province" required>
               </td>
           </tr>
           <tr>
               <td>Postal Code: </td>
               <td>
                   {{ $errors->first('postal', '<strong class="error">:message</strong>') }}
                   <input name="postal" type="text" placeholder="Postal" required>
               </td>
           </tr>
           <tr>
               <td>Image: </td>
               <td>
                   {{ $errors->first('image', '<strong class="error">:message</strong>') }}
                   <input name="image" type="file" placeholder="Image" required> 
               </td>
           </tr>
           <tr>
               <td>Do you want to become a public user? </td>
               <td>
                   <input type="radio" name="public" value="YES">Yes
                   <input type="radio" name="public" value="NO">No &nbsp;
                   <span>
                       <button type="button" onclick="Hint_user()">?</button>
                   </span>
               </td>
           </tr>
       </table>
       <!--<input id="btn1" type="button" value="Registration">-->
      
       <input type="submit" onsubmit="codeAddress()" value="Registration">
       
   {{ Form::close() }}

@stop
