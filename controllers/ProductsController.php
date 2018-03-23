<?php
class ProductsController
{

	public function read(){
		
		$products = App::get('database')->selectAll('products');

		return jsonView($products);
	
	}

	public function create(){
		$newProduct = [
				'name' => Request::params()['name'],
				'description' => Request::params()['description'],
				'size' => Request::params()['size'],
				'price' => Request::params()['price']
			];

		$productId = App::get('database')->insert('products', $newProduct);

		$product =  App::get('database')->findById('products', $productId);
		return jsonView($product);
	}

	public function update(){
		
		$params = [
				'name' => Request::params()['name'],
				'description' => Request::params()['description'],
				'size' => Request::params()['size'],
				'price' => Request::params()['price']
			];

		$updateProduct = App::get('database')->update('products', $params, Request::params()['id']);

		$product =  App::get('database')->findById('products', Request::params()['id']);
		
		return jsonView($product);
	}

	public function delete(){
		
		$id = Request::params()['id'];
		
		if(App::get('database')->findById('products', $id) == null)
		{
			$response = ["message" => "Row {$id} not found."];
			return jsonView($response);
		}

			$product = App::get('database')->delete('products', $id);
			$response = ["error" => "Row {$id} deleted."];


		return jsonView($response);
	}
}