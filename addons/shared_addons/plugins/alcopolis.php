<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Plugin_Alcopolis extends Plugin
{
	public $version = '1.0.0';

	public $name = array(
		'en'	=> 'Alcopolis Plugin'
	);

	public $description = array(
		'en'	=> ''
	);

	public function _self_doc()
	{
		$info = array(
			'site_status' => array(
				'description' => array(// a single sentence to explain the purpose of this method
					'en' => ''
				),
				'single' => true,// will it work as a single tag?
				'double' => false,// how about as a double tag?
				'variables' => '',// list all variables available inside the double tag. Separate them|like|this
// 				'attributes' => array(
// 					'name' => array(// this is the name="World" attribute
// 						'type' => 'text',// Can be: slug, number, flag, text, array, any.
// 						'flags' => '',// flags are predefined values like asc|desc|random.
// 						'default' => 'World',// this attribute defaults to this if no value is given
// 						'required' => false,// is this attribute required?
// 					),
//				),
			),
		);
	
		return $info;
	}

	/**
	 * Hello
	 *
	 * Usage:
	 * {{ example:hello }}
	 *
	 * @return string
	 */
	function site_status()
	{
		if ( ! $this->settings->frontend_enabled && (empty($this->current_user) or $this->current_user->group != 'admin')){
			return FALSE;
		}else{
			return TRUE;
		}
	}
}

/* End of file example.php */