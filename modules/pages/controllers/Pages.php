<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MX_Controller {
	public $listPage   = 'page';

	public function __construct()
	{
        parent::__construct();
		$this->load->model('Common_model','common_model');
    }

	   public function _remap($method)
	   {
		    $this->get_data($method);
	   }

      public function get_data($method)
	  {
	     if($method == "about-us")
            {
               $data['bread_data'] = array('title'=>'about-us');
            }elseif($method == "sell-with-us")
            {
               $data['bread_data'] = array('title'=>'sell-with-us');
            }elseif($method == "shipping-policy")
            {
            	$data['bread_data'] = array('title'=>'shipping-policy');
            }elseif($method == "returns-and-refunds")
            {
            	$data['bread_data'] = array('title'=>'returns-and-refunds');
            }elseif($method == "careers")
            {
            	$data['bread_data'] = array('title'=>'careers');
            }elseif($method == "faqs")
            {
            	$data['bread_data'] = array('title'=>'faqs');
            }elseif($method == "terms-and-conditions")
            {
            	$data['bread_data'] = array('title'=>'terms-and-conditions');
            }elseif($method == "privacy-policy")
            {
            	$data['bread_data'] = array('title'=>'privacy-policy');
            }
	     $data['web_settings']   = $this->common_model->get_all_websettings();
		 $data['menu']           = $this->common_model->get_all_menu();
	     $data['datas'] = $this->common_model->get_record($method);
	     $this->load->view($this->listPage,$data);
	  }
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
