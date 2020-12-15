<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model {
	protected $table = 'product';
	protected $allowedFields = ['name', 'description', 'category', 'price', 'image'];
    protected $primaryKey = 'id';

	public function getProducts($category) {
		return $this->where('category', $category)->findAll();
	}

	public function saveProduct($product) {
		$this->insert($product);
	}

	public function addToCart($productId) {
		return $this->find($productId);
	}
}