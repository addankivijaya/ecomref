<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {

	public $listPage   = 'register';
	public $editPage   = 'edit';
	
	public function __construct() {
        parent::__construct();
		$this->load->model('Common_model','common_model');
		$this->load->model('Register_model','register_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
    }
	
	public function index()
	{
		if($this->input->post('submit')!='')
		{
            $this->form_validation->set_rules('rfname','First Name','trim|alpha_numeric_spaces|required');
		    $this->form_validation->set_rules('rlname','Last Name','trim|alpha_numeric_spaces|required');
            $this->form_validation->set_rules('remail','Email','trim|valid_email|required');
            $this->form_validation->set_rules('rmobile','Phone','trim|numeric|min_length[10]|max_length[10]|required');
            $this->form_validation->set_rules('rpassword','Password', 'trim|required');
            $this->form_validation->set_rules('rcpassword','Confirm Password', 'trim|required|matches[rpassword]');
            $this->form_validation->set_rules('checkbox','Checkbox', 'trim|required');

            if($this->form_validation->run() == true)
            {
	            $exists = $this->register_model->get_exists_data($this->input->post('remail'));
				if(empty($exists['remail']))
				{
					$result = $this->register_model->add_registered();
					if($result)
					{
						$this->session->set_flashdata( 'msg_succ', 'Registered Successfully...!Please Login To Continue.');
						redirect(site_url()."login");
					}
					else
					{
						$this->session->set_flashdata('msg_fail_order', 'Failed Try Again');
						redirect(site_url()."register");
					}
				}
				else
				{
					$this->session->set_flashdata( 'msg_fail_order', 'Email already exists, Try with another email..');
					redirect("register");
				}
            }
		}
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$data['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}



	public function guest()
	{
		if($this->input->post('submit')!='')
		{
            /*$this->form_validation->set_rules('rfname','First Name','trim|alpha_numeric_spaces|required');
		    $this->form_validation->set_rules('rlname','Last Name','trim|alpha_numeric_spaces|required');*/
            $this->form_validation->set_rules('remail','Email','trim|valid_email|required');
            $this->form_validation->set_rules('rmobile','Phone','trim|numeric|min_length[10]|max_length[10]|required');
            $this->form_validation->set_rules('rpassword','Password', 'trim|required');
            /*$this->form_validation->set_rules('rcpassword','Confirm Password', 'trim|required|matches[rpassword]');
            $this->form_validation->set_rules('checkbox','Checkbox', 'trim|required');*/

            if($this->form_validation->run() == true)
            {
	            $exists = $this->register_model->get_exists_data($this->input->post('remail'));
				if(empty($exists['remail']))
				{
					$result = $this->register_model->add_registered();
					if($result)
					{
						$this->session->set_flashdata( 'msg_succ', 'Registered Successfully...!Please Login To Continue.');
						redirect(site_url()."login");
					}
					else
					{
						$this->session->set_flashdata('msg_fail_order', 'Failed Try Again');
						redirect(site_url()."register");
					}
				}
				else
				{
					$this->session->set_flashdata( 'msg_fail_order', 'Email already exists, Try with another email..');
					redirect("register");
				}
            }
		}
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$data['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}
	
	public function edit()
	{	$data['record']=$this->register_model->get_profie();
		if($this->input->post('submit')!='')
		{
			if ($this->form_validation->run('edit_register') == TRUE) {

				$result = $this->register_model->edit_registered();
				if($result)
				{
					$this->session->set_flashdata( 'msg_succ', 'Updated Successfully...!');
					redirect(site_url()."register");
				}
				else
				{
					$this->session->set_flashdata('msg_succ', 'Failed to update. Please Try Again');
					redirect(site_url()."register");
			}
		  }
		}
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$data['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->editPage,$data);
	}
	
	
	public function verify_email($id,$code)
	{
		
		$emp_data = $this->register_model->get_single_data($id); 
		$data['record'] = $this->register_model->get_single_data($id); 
		if($emp_data['v_code']==$code)
		{  
			$code = rand(10,10000);
			$pass = $this->register_model->update_password_id($id,$code);
		
			if($pass)
			{
				$msg = "\n\n\n Your login details is \n\n\n Username: ".$emp_data['email']." \n\n\n Password : ".$code." ";
				$this->emailssend($msg,$emp_data['email']);
				$this->session->set_flashdata('msg_succ', 'Password Sent to your Email, Login with your email and password...');
				redirect("register");
			}
			else
			{
				$this->session->set_flashdata( 'msg_succ', 'Please try again...');
				redirect("register");
			}
		}
		else
		{
			$this->session->set_flashdata( 'msg_succ', 'Please Try again, your verification link might be expired...');
			redirect("register");
		}
	}
	
	function emailssend($msg,$email)
	{
		$this->load->library('email');
		$this->email->from('info@bracedeal.com', 'bracedeal');
		$this->email->to($email);
		$this->email->set_mailtype("html");
		$this->email->subject("Bracedeal");
		$this->email->message($msg);
		$result=$this->email->send();
		return $result;
	}
}
