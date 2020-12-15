<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CustomerModel;

class Cart extends BaseController
{
	public function index() {
		$session = session();
		$data['cart'] = $session->cart;
		echo view('templates/header');
		echo view('pages/cart', $data);
		echo view('templates/footer');
	}

	public function checkOut () {
		$session = session();
		$data['cart'] = $session->cart;
		if($this->validate(['customername' => 'required'])) {
			$name = $_POST['customername'];
			$contact = $_POST['customercontact'];
			$address = $_POST['customeraddress'];
			$total = 0;
			foreach ($data['cart'] as $cartItem) {
				$total += $cartItem['price'];
			}
			$customer = [
				'name' => $name,
				'contact' => $contact,
				'address' => $address,
				'total' => $total
			];
			$model = new CustomerModel();
			$model->addCustomer($customer);
			$session->setFlashdata('customer', $customer);
			$session->remove('cart');
			return redirect()->to('/cart/checkout');
		}
		echo view('templates/header');
		echo view('pages/checkout', $data);
		echo view('templates/footer');
	}

	public function addProduct($productId = null) {
		if(!$productId) return redirect()->to("/");
		$model = new ProductModel();
		$product = $model->addToCart($productId);
		$session = session();
		$cart = $session->cart;
		$cartItemsId = $session->cartItemsId;
		array_push($cartItemsId, $product['id']);
		array_push($cart, $product);
		$session->set('cart', $cart);
		$session->set('cartItemsId', $cartItemsId);
		return redirect()->to('/cart');
	}
}
