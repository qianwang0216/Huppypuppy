<?php

class ProductController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function deleteProduct()
	{
            $productID = Input::get('productID');
//            DB::delete('delete from products where productID = ?', array($productID));
            $product = Product::find($productID);      
            $product->delete();
            
            return Redirect::to('listProducts');
            
	}
        
        public function listProducts()
        {
            //$products = DB::select('select * from products');
            $products = Product::all();
            return View::make('productlist')->with('products', $products);            
        }
        
        public function addProduct()
        {
            $categoryID = Input::get('category');
            $productCode = Input::get('code');
            $productName = Input::get('name');
            $listPrice = Input::get('price');
            
//            DB::insert('insert into products (categoryID, productCode, productName, listPrice) values (?, ?, ?, ?)', array($categoryID, $productCode, $productName, $listPrice));
            
//            $validator = Validator::make(
//                array(
//                    'category' => $categoryID,
//                    'code' => $productCode,
//                    'name' => $productName,
//                    'price' => $listPrice
//                ),
//                array(
//                    'category' => 'required',
//                    'code' => 'required|min:8',
//                    'name' => 'required',
//                    'price' => 'required'
//                )
//            );
            
            Input::flash();
            
            $rules = array(
                    'category' => 'required',
                    'code' => 'required',
                    'name' => 'required',
                    'price' => 'required'
                );
            $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails())
            {
                return Redirect::to('addProductForm')->withErrors($validator)->withInput();
            }
            
            $product = new Product;
            $product->categoryID = $categoryID;
            $product->productCode = $productCode;
            $product->productName = $productName;
            $product->listPrice = $listPrice;
            
            $product->save();
            
            return Redirect::to('listProducts');
        }
        
        public function showEditProductForm($productID)
        {
//            $products = DB::select('select * from products where productID = ?', array($productID));
//            
//            $product = $products[0];
            $product = Product::find($productID);
            
            return View::make('editProductForm')->with('product', $product); 
        }

        
        public function editProduct()
        {
            $productID = Input::get('productID');
            $categoryID = Input::get('category');
            $productCode = Input::get('code');
            $productName = Input::get('name');
            $listPrice = Input::get('price');
            
//            DB::update('update products set categoryID = ?, productCode = ?, productName = ?, listPrice =? where productID = ?', array($categoryID, $productCode, $productName, $listPrice, $productID));
        
            $product = Product::find($productID);
            $product->categoryID = $categoryID;
            $product->productCode = $productCode;
            $product->productName = $productName;
            $product->listPrice = $listPrice;
            
            $product->save();            
            
            return Redirect::to('listProducts');
        }        
}