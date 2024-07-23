<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkout extends MX_Controller {
	public $headerPage     = 'header';
	public $footerPage     = 'footer';
	public $listPage       = 'checkout';
	public $searchPage     = 'search';
	public $redirPagelogin = 'login';
	public $redirPage      = 'products';
	public $redirPayment2  = 'confirm/pay';
	
	public function __construct() 
	{
        parent::__construct();
		$this->load->model('Common_model','common_model');
		$this->load->model('Checkout_model','checkout_model');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
	    if(($this->session->userdata('user_id')==''))
		{
			//echo "checkout";exit;
			$this->session->set_flashdata( 'msg_fail_order', '<b>Please Login To Continue...<b>' );
			redirect($this->redirPagelogin);
		}

		if(($this->cart->total_items() == 0)||($this->cart->total_items() == ''))
		{
			//echo "check-okk";exit;
			$this->session->set_flashdata( 'msg_fail_order', 'Your Cart Was Empty...! Please add products to cart.' );
			redirect($this->redirPage);
		}
    }
	
	public function payment()
	{
		if($this->input->post('submit')!='')
		{
		 	$this->form_validation->set_error_delimiters('<p class="error" style="color:red;">', '</p>');
		    $this->form_validation->set_rules('dname', 'Name','trim|required');
		    $this->form_validation->set_rules('dmobile','Mobile','trim|numeric|required|min_length[10]|max_length[10]');
		    $this->form_validation->set_rules('demail', 'Email','trim|required');
		    $this->form_validation->set_rules('dstate', 'State','trim|required');
		    $this->form_validation->set_rules('dcity', 'City','trim|required');
		    $this->form_validation->set_rules('dlocality', 'Locality','trim|required');
		    $this->form_validation->set_rules('dzipcode', 'Zipcode','trim|numeric|required|min_length[5]|max_length[7]');
            $this->form_validation->set_rules('daddress','Address','trim|required');

		 	if ($this->form_validation->run() == TRUE):
				$unique_id = rand(0, 1000000);
				$order_id  = "BD".$unique_id;
				/*echo "<pre>";print_r($this->cart->contents());exit;
				//echo '<pre>'; print_r($this->session->all_userdata());exit;*/
				$carttotal = ($this->session->userdata("gtotal") - $this->session->userdata("gshipping"));
				$shipping  = $this->session->userdata("gshipping");
				$gtot      = $this->session->userdata("gtotal");
				$result    = $this->checkout_model->insert_cod_order($order_id,$carttotal,$shipping,$gtot);
				if($result)
				{
					$this->session->unset_userdata('gtotal');
					$this->session->unset_userdata('gshipping');
					$this->cart->destroy();
					redirect($this->redirPayment2."/".$result);
				 }
				else
				{
					$this->session->set_flashdata( 'msg_fail', 'Order was Failed, Try Again...' );
					redirect(site_url());
				}
	            endif;
	    }
				$data['web_settings']   = $this->common_model->get_all_websettings();
				$data['menu']           = $this->common_model->get_all_menu();
			    $data['record']         = $this->checkout_model->get_user_data();
			    //echo "<pre>";print_r($data['record']);exit;
				$this->load->view($this->listPage,$data);
   }
}