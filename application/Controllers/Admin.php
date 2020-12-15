<?php namespace App\Controllers;

use App\Models\ProductModel;

class Admin extends BaseController
{
	public function index()
	{
		$session = session();
		if($session->admin) return redirect()->to('/admin/adminpage');
		helper('form');

		if($this->validate(['adminname' => 'required', 'password' => 'required'])) {
			if($this->login($_POST['adminname'], $_POST['password'])) {
				$session->set('admin', 'admin');
				return redirect()->to('/admin/adminpage');
			} else {
				$data['auth'] = false;
				echo view('templates/header');
				echo view('admin/admin_login', $data);
				echo view('templates/footer');
			}
		} else {
			echo view('templates/header');
			echo view('admin/admin_login');
			echo view('templates/footer');
		}
	}

	public function adminPage() {
		$session = session();
		if($session->admin) {
			echo view('templates/header');
			echo view('admin/admin_page');
			echo view('templates/footer');	
		} else {
			return redirect()->to('/admin');
		}

		if($this->validate(['productimage' => 'is_image[productimage]'])) {
			$name = $_POST['productname'];
			$description = $_POST['productdescription'];
			$category = $_POST['productcategory'];
			$price = $_POST['productprice'];
			$file = $this->request->getFile('productimage');
			$file->move('./uploads');
			$product = [
				'name' => $name,
				'description' => $description,
				'category' => $category,
				'image' => $file->getName(),
				'price' => $price
			];
			$model = new ProductModel();
			$model->saveProduct($product);
			$session->setFlashdata('added', "Product was added");
			return redirect()->to('/admin/adminpage');
		}
	}

	private function login($name, $password) {
		if($name == 'admin' && $password == 'admin') return true;
		else return false;
	}

	public function logout() {
		$session = session();
		$session->remove('admin');
		return redirect()->to('/admin');
	}

}
