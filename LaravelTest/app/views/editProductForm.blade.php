@extends('master')

@section('content')
            <h1>Edit Product</h1>
                {{ Form::open(array('action' => 'ProductController@editProduct')) }}
                <label>Code:</label>
                <input id="code" type="input" name="code" value="{{ $product->productCode }}" maxlength="10" />
                <br />

                <label>Name:</label>
                <input id="name" type="input" name="name" value="{{ $product->productName }}" maxlength="255" />
                <br />

                <label>List Price:</label>
                <input id="price" type="input" name="price" value="{{ $product->listPrice }}" maxlength="10" />
                <br />
                
                <label>Category:</label>
                <input id="category" type="input" name="category" value="{{ $product->categoryID }}" maxlength="50" />
                
                <input type="hidden" name="productID" value="{{ $product->productID }}" />
                <br />
                <label>&nbsp;</label>
                <input type="submit" value="Edit Product" />
                <br />
                {{ Form::close() }}
            <p><a href="{{ URL::to('listProducts') }}">View Product List</a></p>
@stop