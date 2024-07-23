<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends MX_Controller
{
	public $listPage     = 'home';
	public $cartPageajax = 'cart-ajax';
	public $orderPage    = 'track_order';
	public function __construct()
	{
        parent::__construct();
        $this->load->model('Common_model','common_model');
		$this->load->model('Home_model','my_model');
		$this->load->model('products/Products_model','products_model');
		$this->load->library('email');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
    }

	public function index()
	{
		$data['web_settings']   = $this->common_model->get_all_websettings();
		$data['menu']           = $this->common_model->get_all_menu();
        $data['partners']       = $this->my_model->get_partners();
        $data['products']       = $this->products_model->get_feature_products();


        $query        = $this->my_model->get_sliders();
        $count        = count($query);
        $indicators = '';
        $slides  = '';
        $counter = 0;  
        foreach($query AS $key => $value)
        {
          $image = $query[$key]['image'];
          if ($counter == 0) 
          {
            $indicators .= '<li data-target="#myCarousel" data-slide-to="' . $counter . '" 
            class="active"></li>';
            $slides .= '<div class="item active">
            <img src="'.site_url().'images/sliders/'.$image.'" alt="Bracedeal"/>
            </div>';
          } else 
          {
            $indicators .= '<li data-target="#myCarousel" 
            data-slide-to="' . $counter . '"></li>';
            $slides .= '<div class="item">
            <img src="'.site_url().'images/sliders/'.$image.'" alt="Bracedeal"/>
            </div>';
          }
          $counter=$counter+1;
        }
      $data['indicators'] = $indicators;
      $data['slides']     = $slides;
      //echo '<pre>';print_r($data['products']);exit;
	  $this->load->view($this->listPage,$data);
	}       
 





















	  /*public function contact()
	  {
		if($this->input->post('contact')!='')
		{
            $this->form_validation->set_rules('name','First Name','trim|alpha_numeric_spaces|required');
            $this->form_validation->set_rules('email','Email','trim|valid_email|required');
            $this->form_validation->set_rules('subject','Subject','trim|alpha_numeric_spaces|required');
            $this->form_validation->set_rules('message','Message','trim|required');
            if($this->form_validation->run() == true)
            {
				$result = $this->my_model->add_contact();
				if($result)
				{
	               $message = 'Name: ' . $this->input->post('name') . "\n\n" . 'Email: ' . $this->input->post('email') . "\n\n" . 'Subject: ' . $this->input->post('subject') . "\n\n" . 'Message: ' . $this->input->post('message');
					$this->email->from($this->input->post('email'), $this->input->post('name'));
					$this->email->to('naresh@royalinfosys.com');
					$this->email->subject('Bracedeal Contact Us form');
					$this->email->message($message);
					$this->email->send();

					$this->session->set_flashdata('msg_succ', 'Contacted Successfully, We will get back to you...');
					redirect(site_url()."home");
				}
				else
				{
					$this->session->set_flashdata('msg_fail_order', 'Failed Try Again');
					redirect(site_url()."home");
				}
		    }
		}
		$data['web_settings']   = $this->common_model->get_all_websettings();
		//$data['menu']           = $this->common_model->get_all_menu();
        $data['sliders']        = $this->my_model->get_sliders();
        $data['partners']       = $this->my_model->get_partners();
		$this->load->view($this->listPage,$data);
	}*/

	
	public function trackorder()
	{	
		if($this->input->post('submit')!='')
		{
		    $orderid      =	$this->input->post('orderid');
		    $data['orderstatus']  = $this->common_model->get_order_status($orderid);
		    $data['web_settings'] = $this->common_model->get_all_websettings();
		    $data['menu']         = $this->common_model->get_all_menu();
            /*echo "<pre>";print_r($data['orderstatus']);exit;*/
		    $this->load->view($this->orderPage,$data);
		}else
		{
            $data['web_settings'] = $this->common_model->get_all_websettings();
		    $data['menu']         = $this->common_model->get_all_menu();
		    $this->load->view($this->orderPage,$data);
		}
	}
}
