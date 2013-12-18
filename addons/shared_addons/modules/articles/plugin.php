<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Template Plugin
 *
 * Display theme templates
 *
 * @author  PyroCMS Dev Team
 * @package PyroCMS\Core\Plugins
 */
class Plugin_Articles extends Plugin
{
	public $version = '1.0.0';
	
	public $name = array(
			'en'	=> 'Articles'
	);
	
	public $description = array(
			'en'	=> 'Articles Module Plugin'
	);
	
	public function _self_doc()
	{
		$info = array(	
				'get_category' => array(
						'description' => array(// a single sentence to explain the purpose of this method
								'en' => ''
						),
						'single' => true,// will it work as a single tag?
						'double' => false,// how about as a double tag?
						'attributes' => array(
							'slug' => array(
									'type' => 'text',// Can be: slug, number, flag, text, array, any.
									'flags' => '',
									'default' => '',
									'required' => true,
							),
						),
				),
		);
	
		return $info;
	}
	
	public function __construct()
	{	
		$this->load->model('articles_category_m');
	}	
	
	
	function get_category(){
		$cat_slug = $this->attribute('slug');
		
		$temp = $this->articles_category_m->get_category_by(array('slug'=>$cat_slug), NULL, TRUE);
		//var_dump($temp);
		return $temp->name;
	}
	
}