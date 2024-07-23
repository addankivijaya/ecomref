<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contactus extends CI_Controller {
	public $listPage   = 'contactus';

	public function __construct()
	{
        parent::__construct();
		$this->load->model('Common_model','common_model');
		$this->load->model('Contactus_model','contact_model');
		$this->load->library('email');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
    }

	public function index(){
		if($this->input->post('contactme')!='')
		{
            $this->form_validation->set_rules('name','First Name','trim|alpha_numeric_spaces|required');
            $this->form_validation->set_rules('email','Email','trim|valid_email|required');
            $this->form_validation->set_rules('subject','Subject','trim|alpha_numeric_spaces|required');
            $this->form_validation->set_rules('message','Message','trim|required');
            if($this->form_validation->run() == true)
            {
			$result = $this->contact_model->add_contact();
			if($result)
			{
               $message = 'Name: ' . $this->input->post('name') . "\n\n" . 'Email: ' . $this->input->post('email') . "\n\n" . 'Subject: ' . $this->input->post('subject') . "\n\n" . 'Message: ' . $this->input->post('message');
				$this->email->from($this->input->post('email'), $this->input->post('name'));
				$this->email->to('naresh@royalinfosys.com');
				$this->email->subject('Bracedeal Contact Us form');
				$this->email->message($message);
				$this->email->send();

				$this->session->set_flashdata('msg_succ', 'Contacted Successfully, We will get back to you...');
				redirect(site_url()."contactus");
			}
			else
			{
				$this->session->set_flashdata('msg_fail_order', 'Failed Try Again');
				redirect(site_url()."contactus");
			}
		}
		}
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$data['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}
}
