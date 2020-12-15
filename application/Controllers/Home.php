<?php namespace App\Controllers;

use App\Models\ProductModel;

class Home extends BaseController
{
	public function category($category = 'Phone') {
		$session = session();
		$model = new ProductModel();
		$data['products'] = $model->getProducts($category);
		if(!$session->cart) {
			$cart = [];
			$cartItemsId = [];
			$session->set('cart', $cart);
			$session->set('cartItemsId', $cartItemsId);
		}
		$data['cartItemsId'] = $session->cartItemsId;
		echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
	}

	public function about() {
		echo view('templates/header');
		echo view('pages/about');
		echo view('templates/footer');
	}
}
