@extends('master')

@section('content')
            <!-- display a table of products -->
            <h2>Product list</h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th class="right">Price</th>
                    <th>Category</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->productCode; }}</td>
                    <td>{{ $product->productName; }}</td>
                    <td class="right">{{ $product->listPrice; }}</td>
                    <td>{{ $product->categoryID; }}</td>
                    <td><a href="{{ url('editProductForm', array($product->productID)) }}">Edit</a></td>
                    <td>
                        {{ Form::open(array('action' => 'ProductController@deleteProduct')) }}
                            <input type="hidden" name="productID" value="{{ $product->productID; }}" />
                            <input type="submit" value="Delete" />
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </table>
            <p><a href="{{ URL::to('addProductForm') }}">Add Product</a></p>
@stop
