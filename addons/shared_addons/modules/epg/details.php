<?php defined('BASEPATH') or exit('No direct script access allowed');

class Module_Epg extends Module {
	public $version = '1.0';
	
	public function info()
	{
		return array(
				'name' => array(
						'en' => 'EPG'
				),
				'description' => array(
						'en' => 'EPG Tools'
				),
				'frontend' => true,
				'backend' => true,
				'skip_xss' => true,
				'menu' => 'content',
				'sections' => array(
					'channels' => array(
						'name' => 'Channels',
						'uri' => 'admin/epg/channels',
						'shortcuts' => array(
							array(
								'name' => 'Add Channel',
								'uri' => 'admin/epg/channels/create',
								'class' => 'add',
							),
						),
					),
					'shows' => array(
						'name' => 'Shows',
						'uri' => 'admin/epg/shows',
					),
					'upload' => array(
							'name' => 'Upload',
							'uri' => 'admin/epg/upload',
					),
				)
		);
	}
	
	public function install()
	{
		return TRUE;
	}
	
	public function uninstall()
	{
		return TRUE;
	}
	
	public function upgrade($old_version)
	{
		// Your Upgrade Logic
		return TRUE;
	}
	
	public function help()
	{
		// Return a string containing help info
		// You could include a file and return it here.
		return "No documentation has been added for this module.<br />Contact the module developer for assistance.";
	}
}