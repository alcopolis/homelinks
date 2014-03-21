<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Subscriber Module
 *
 * @author 		Adriant Rivano
 * @website		adriantrivano.com
 * @package 	PyroCMS
 * @subpackage 	Subscriber Module
 */
class Subscribe extends Public_Controller
{
	protected $ADMIN_PATH;
	protected $SALES_EMAIL = 'cs@cepat.net.id';
	protected $TICKET_PREFIX = '10';
	
	protected $subscriber;
	protected $rules = array();
	
	public function __construct()
	{
		parent::__construct();
		
		$this->ADMIN_PATH = base_url() . 'admin';
		
		$this->load->model('subscribe_m');
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('alcopolis');
		
		// Set our validation rules
		$this->rules = $this->subscribe_m->_rules;
		$this->form_validation->set_rules($this->rules);
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->form_validation->set_message('is_unique','You have been signed up with this %s');
	}	
	
	function render($view, $var = NULL){
		$this->template
		->title($this->module_details['name'])
		->append_css('module::subscribe.css')
		->append_js('module::subscribe.js')
		->set('subscriber', $this->subscriber)
		->set($var)
		->build($view);
	}
	
	
	public function index(){
		if($this->form_validation->run()){
			echo 'validation ok';
			
			$db_fields = array('name', 'email', 'address', 'area_code', 'phone', 'mobile');
			$data = $this->alcopolis->array_from_post($db_fields, $this->input->post());
			$data['date'] = date('Y-m-d');
			
			if($this->subscribe_m->insert($data)){
				$id = intval($this->subscribe_m->get_id());
				
				//Ticket ID config
				$ticketid = $this->TICKET_PREFIX;
				
				if($id < 10){
					$ticketid .= '0' . $id;
				}else{
					$ticketid .= $id;
				}
				
				//send notification email to sales team
				$msg = '<p><strong>' . $data['name'] . '</strong> telah mengajukan permohonan berlangganan Homelinks. Mohon segera di follow up calon pelanggan ini dengan data berikut:</p>';
				$msg .= '<table><tr><td>Nama</td><td>: ' . $data['name'] . '</td></tr>';
				$msg .= '<tr><td>Alamat</td><td>: ' . $data['address'] . '</td></tr>';
				$msg .= '<tr><td>Telepon</td><td>: ' . $data['area_code'] . ' ' . $data['phone'] . '</td></tr>';
				$msg .= '<tr><td>Ponsel</td><td>: ' . $data['mobile'] . '</td></tr></table>';
				$msg .= '<p>Silahkan masuk ke <a href="' . $this->ADMIN_PATH . '">Admin Panel</a> untuk memproses permohonan ini.<br/><br/><br/><br/>Terima kasih.</p>';
				
				$this->load->library('email');
					
				$this->email->from('admin.cepatnet@cepat.net.id', 'Homelinks Subscription System');
				$this->email->to($this->SALES_EMAIL);
				//$this->email->to('myseconddigitalmail@yahoo.com');
				$this->email->cc('');
				$this->email->bcc('');
					
				$this->email->subject('[ #' . $ticketid . ' ] Permohonan Berlangganan Homelinks');
				$this->email->message($msg);
					
				$this->email->send();
				
				//Redirect
				redirect('subscribe/success');	
			}
		}else{
			$this->subscriber = $this->subscribe_m->get_new();
			$this->template->set_layout('retail.html');
			$this->render('subscribe');
		}
	}
	
	
	public function success(){
		$this->render('success');
	}
}