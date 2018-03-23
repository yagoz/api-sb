<?php
class IndexController
{

	public function index(){
		
		$products = App::get('database')->selectAll('products');

		return view('index',compact('products'));
	
	}
}