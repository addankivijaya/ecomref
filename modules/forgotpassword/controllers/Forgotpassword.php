<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forgotpassword extends CI_Controller {
	// Variable Declaration Here
	public $headerPage      = '../../views/header';
	public $footerPage      = '../../views/footer';
	public $listPage        = 'forgotpassword';
	public $forgot_redirect = 'forgotpassword';
	
	

	public function __construct() 
	{
        parent::__construct();
		$this->load->model('Common_model','common_model'); 
		$this->load->model('Forgotpassword_model','my_model'); 
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
 		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off'); 
		$this->load->library('email');
    }
	
	/*public function index(){
		if($this->input->post('submit')!=''){
			if($this->my_model->email_check() != 0){ 

				$pwddigt  =  substr(rand(1,1000000),0,4); 
				$pwdchar  =   substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUXYVWZ"), 0, 4); 
				$password =   $pwdchar.$pwddigt;
				$changepass=$this->my_model->change_password($password,$this->input->post('email'));
				if($changepass){
					$this->load->library('email');
					$this->email->from('info@telugupickles.in', 'Telugupickles.in');
					$this->email->to($this->input->post('email')); 
					$this->email->subject('Your New Password');
					$this->email->message(" Your new password is :".$password."");	
					$this->email->send();
					
				$this->session->set_flashdata( 'msg_succ', 'Password sent to your Email');
				redirect($this->forgot_redirect);
				}
			}else{		
				$this->session->set_flashdata( 'msg_succ', 'Invalid Email Id...');
				redirect($this->forgot_redirect);
			}
		}
		
		$header['web_settings'] = $this->common_model->get_all_websettings();
		$header['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->headerPage,$header);
		$this->load->view($this->listPage);
		$footer['web_settings'] = $this->common_model->get_all_websettings();
		$this->load->view($this->footerPage,$footer);
	}*/
	
	public function reset_password()
	{
		if($this->input->post('fp')!='' && $this->input->post('fp') == "Submit")
		{
			$this->form_validation->set_rules('remail','Email','trim|valid_email|required');
			if ($this->form_validation->run() == TRUE):
			    $exists = $this->my_model->get_exists_data($this->input->post('remail'));
			if(!empty($exists['email']))
			{
				$code = md5(uniqid(rand(), true));
				$result = $this->my_model->update_verification_code($code);
				if($result)
				{
					$msg = "\n\n\n <a href='".site_url()."forgotpassword/configure_mypassword/".$exists['id']."/".$code."'>RESET PASSWORD</a>";
					$this->emailssend($msg);
					$this->session->set_flashdata( 'msg_succ', 'To Configure new password check your mail');
					redirect("forgotpassword/reset_password");
				}	
				else
				{
					$this->session->set_flashdata( 'msg_fail', 'Please Try Again');
					redirect("forgotpassword/reset_password");
				}
			}
			else
			{
				$this->session->set_flashdata( 'msg_fail', 'Email Not Found');
				redirect("forgotpassword/reset_password");
			}	
          else:
          	$this->session->set_flashdata( 'msg_fail', 'Invalid Email or Password.' );
			redirect("forgotpassword/reset_password");
		 endif;
		}
		$data['web_settings']   = $this->common_model->get_all_websettings();
	    $data['menu']           = $this->common_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}
	
	
	function emailssend($msg)
	{
		$this->email->from('info@bracedeal.com', 'bracedeal');
		$this->email->to($this->input->post('email'));
		$this->email->set_mailtype("html");
		$this->email->subject("FORGOT PASSWORD");
		$this->email->message($msg);
		return	$result=$this->email->send();
	}
	
	public function configure_mypassword($id,$code)
	{
		$emp_data       = $this->my_model->get_single_data($id);
		$data['record'] = $this->my_model->get_single_data($id);
		/*echo "<pre>";print_r($data['record']);exit;*/
		if($emp_data['v_code']==$code)
		{
			if($this->input->post('submit')!='')
			{
				if ($this->form_validation->run('new_password') == TRUE):
				$changepass=$this->my_model->change_password_change($id);
					if($changepass)
					{
						$code = md5(uniqid(rand(), true));
						$this->my_model->update_verification_code_id($id,$code);
						$this->session->set_flashdata('msg_succ', 'Password Changed Successfully, Login with your new password...');
						redirect("login");
					}
					else
					{
						$this->session->set_flashdata('msg_fail', 'Sorry! Try Again');
						redirect("forgotpassword/configure_mypassword/".$id."/".$code);
					}
				endif;
			}
			$data['web_settings']   = $this->common_model->get_all_websettings();
		    $data['menu']           = $this->common_model->get_all_menu();
			$this->load->view("newpassword",$data);
		}
		else
		{
			$data['web_settings']   = $this->common_model->get_all_websettings();
		    $data['menu']           = $this->common_model->get_all_menu();
			$this->load->view("newpassword",$data);

		}
	}

}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */