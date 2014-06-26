@extends('master')

@section('content')
            <h1>Add Product</h1>
                {{ Form::open(array('action' => 'ProductController@addProduct')) }}

                <label>Code:</label>
                <input id="code" type="input" name="code" maxlength="10" /><?php echo $errors->first('code'); ?>
                <br />

                <label>Name:</label>
                <input id="name" type="input" name="name" maxlength="255" /><?php echo $errors->first('name'); ?>
                <br />

                <label>List Price:</label>
                <input id="price" type="input" name="price" maxlength="10" /><?php echo $errors->first('price'); ?>
                <br />
                
                <label>Category:</label>
                <input id="category" type="input" name="category" maxlength="50" /><?php echo $errors->first('category'); ?>
                
                <br />
                <label>&nbsp;</label>
                <input type="submit" value="Add Product" />
                <br />
                {{ Form::close() }}
            <p><a href="{{ URL::to('listProducts') }}">View Product List</a></p>    
@stop