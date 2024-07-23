<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Login extends MX_Controller {
	public $headerPage = '../../views/header';
	public $footerPage = '../../views/footer';
	public $listPage   = 'login';
	
	public $searchPage        = 'search';
	public $listPage_redirect ='login';
	public $login_redirect    ='products';
	public $reDirect          = 'checkout/payment/';
	
	public function __construct() {
        parent::__construct();
		$this->load->model('Common_model','common_model');
		$this->load->model('Login_model','login_model');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off'); 
    }
	
	public function index(){
		
		if($this->input->post('submit')!='')
		{
            $this->form_validation->set_rules('remail','Email','trim|valid_email|required');
            $this->form_validation->set_rules('rpassword','Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
	            $data = array(
					'email'    => $this->input->post('remail'),
					'password' => $this->input->post('rpassword')
				 );
				//echo "<pre>";print_r($data);exit;
				$user_details = $this->login_model->getUser($data);
				if($user_details)
				{	
		            /*echo "hi";exit;*/
					$newdata = array
					(
						'user_name'  => $user_details['fname'],
						'user_id'    => $user_details['id'],
					);
					//echo "<pre>";print_r($newdata);exit;
					$this->session->set_userdata($newdata);
					if($this->session->userdata('user_name')!=""):
						$this->session->set_flashdata('msg_succ', 'Welcome, '.$this->session->userdata('user_name').'');
					else:
						$this->session->set_flashdata('msg_succ', 'Welcome, Guest!');
					endif;

					if(($this->session->userdata('user_id')!='') &&($this->cart->total_items() > 0))
					{
						redirect($this->reDirect);
					} else {
						$this->session->set_flashdata( 'msg_fail_order', 'Your Cart Was Empty...! Please add products to cart.' );
						redirect($this->login_redirect);
					}
				} 
				else 
				{
					$this->session->set_flashdata( 'msg_fails', 'Invalid Email or Password.' );
					redirect($this->listPage_redirect);
				}
			}
		}
		$data['web_settings']   = $this->common_model->get_all_websettings();
	    $data['menu']           = $this->common_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}

	public function guest()
	{
		$newdata = array('user_name'  => "Guest",'user_id' => 1);
		$this->session->set_userdata($newdata);
		$this->session->set_flashdata('msg_succ', 'Welcome, '.$this->session->userdata('user_name').'');
		if(($this->session->userdata('user_id')!='') &&($this->cart->total_items() > 0))
		{
			redirect($this->reDirect);
		} else {
			$this->session->set_flashdata( 'msg_fail_order', 'Your Cart Was Empty...! Please add products to cart.' );
			redirect($this->login_redirect);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('guest_name');
		$this->session->unset_userdata('guest_id');
		/*$this->session->sess_destroy();*/
		redirect($this->login_redirect,'refresh');
	}
}