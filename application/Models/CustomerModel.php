<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model {
	protected $table = 'customer';
	protected $allowedFields = ['name', 'contact', 'address', 'total'];
    protected $primaryKey = 'id';

	public function addCustomer($customer) {
		$this->insert($customer);	
	}
}