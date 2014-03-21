<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * EPG Module
 *
 * @author 		Adriant Rivano
 * @website		adriantrivano.com
 * @package 	PyroCMS
 * @subpackage 	EPG Module
 */

class Epg extends Public_Controller
{
	protected $section = 'items';

	public function __construct()
	{
		parent::__construct();

		// Load all the required classes
		$this->load->model('epg_ch_m');
		$this->load->model('epg_sh_m');
		$this->load->library('form_validation');
		$this->load->library('alcopolis');
		$this->lang->load('epg');
		
		// Set validation rules
		$this->form_validation->set_rules($this->epg_sh_m->filter_rules);
	}

	
	function render($view, $var = NULL){		
		$this->template
			->title($this->module_details['name'])
			->append_js('module::main.js')
			->append_css('module::style.css')
			->set($var)
			->set_layout('retail.html')
			->build($view);
	}
	
	
	public function index()
	{

		$channels = $this->epg_ch_m->get_all_channel();
		foreach($channels as $c){
			$ch[$c->id] = $c->name;
		}
						
		$tgl = '';
		$ch_info = NULL;
		
		if($this->form_validation->run()){
			$cond = $this->alcopolis->array_from_post(array('cid', 'date'), $this->input->post());
			$sh = $this->epg_sh_m->get_epg_by($cond);	
			$tgl = $this->input->post('date');
			$ch_info = $this->epg_ch_m->get_channel_by(array('id'=>$this->input->post('cid')), '', TRUE);
		}else{
			$sh = NULL;
			$tgl = date('Y-m-d');
		}
		
		$this->render('tv-guide', array('shows'=>$sh, 'ch'=>$ch, 'tgl'=>$tgl, 'ch_info'=>$ch_info));
	}
	
	
	public function channel_lineup(){
		$cats = $this->epg_ch_m->get_categories();
		
		foreach($cats as $ct){
			if($ct->id == '0'){
				$cat[0] = 'All Categories';
			}else{
				$cat[$ct->id] = $ct->cat;
			}
		}
		
		if($this->input->post('cat_id') == NULL || $this->input->post('cat_id') == '0'){
			$c = 'All Categories';
		}else{
			$c = $cat[intval($this->input->post('cat_id'))];
		}
		
		$this->render('channel_lineup', array('cat'=>$cat, 'category'=>$c));
	}
}
