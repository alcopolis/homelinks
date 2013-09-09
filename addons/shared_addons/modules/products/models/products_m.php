<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Regular pages model
 *
 * @author Phil Sturgeon
 * @author Jerel Unruh
 * @author PyroCMS Dev Team
 * @package PyroCMS\Core\Modules\Pages\Models
 *
 */
class Products_m extends MY_Model
{
		
	
	public $_rules = array(
			'name' => array(
					'field' => 'name',
					'label' => 'name',
					'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			'slug' => array(
					'field' => 'slug',
					'label' => 'slug',
					'rules' => 'trim|required|alpha_dot_dash|max_length[200]|xss_clean'
			),
			'teaser' => array(
					'field' => 'teaser',
					'label' => 'teaser',
					'rules' => 'max_length[200]|xss_clean'
			),
			'body' => array(
					'field' => 'body',
					'label' => 'body',
					'rules' => 'xss_clean'
			),
	);
	
	
	
	
	//Start Product Model
//	protected $product;
	protected $_table = 'inn_products_data_copy';
	
	public function __construct() {
		parent::__construct();
	}
	
	
	//Get data produk dan paket2nya sesuai dengan id input
	public function get_product($id = NULL){	
		$prod_query = new stdClass();
		
		if($id == NULL || $id == ''){
			$prod_query = $this->db->get($this->_table)->result();
		}else{
			$prod_query->data = $this->db->where('id', $id)->get($this->_table)->row();
			$prod_query->packages = $this->get_packages($prod_query->data->id);
		}
		
		return $prod_query;
	}
	
	
	public function get_product_by($fields = NULL, $condition = NULL, $single = FALSE){
		$method = 'result';
		
		if($fields != NULL){
			$this->db->select($fields);
		}
		
		if($condition != NULL){
			$this->db->where($condition);
		}
		
		if($single){
			$method = 'row';
		}else{
			$method = 'result';
		}
		
		return $this->db->get($this->_table)->$method();
	}
	
	
	public function get_packages($id = NULL){
		$packages_table = 'inn_products_packages_copy';
		
		if($id != NULL || $id != ''){
			return $this->db->where('prod_id', $id)
							->get($packages_table)->result();
		}
	}
	
	
	public function update_product($id, $data){
		$this->db->where('id', $id);
		
		if($this->db->update($this->_table, $data)){
			return TRUE;
		}else{
			return FALSE;
		}		
	}

}