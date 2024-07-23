<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public $headerPage = '../../../views/header';
	public $footerPage = '../../../views/footer';
	public $listPage = 'blog';
	public $viewPage = 'blog-detail';

	public function __construct()
	{
        parent::__construct();
	    $this->load->model('Common_model','common_model');
	    $this->load->model('Blog_model','my_model');
    }
	public function index()
	{
		$header['web_settings'] = $this->common_model->get_all_websettings();
		$header['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->headerPage,$header);

		$data['cat'] = $this->my_model->get_all_categories();
		$data['datas'] = $this->my_model->get_all_records();
		//echo "<pre>";print_r($data['datas']);exit;
		$this->load->view($this->listPage,$data);
        $footer['web_settings'] = $this->common_model->get_all_websettings();
		$this->load->view($this->footerPage,$footer);
	}

	public function view($id)
	{
		$header['web_settings'] = $this->common_model->get_all_websettings();
		$header['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->headerPage,$header);

		$data['cat'] = $this->my_model->get_all_categories();
		$data['datas']  = $this->my_model->get_all_records();
		$data['record'] = $this->my_model->get_record($id);
		//echo "<pre>";print_r($data['datas']);exit;
		$this->load->view($this->viewPage,$data);
        $footer['web_settings'] = $this->common_model->get_all_websettings();
		$this->load->view($this->footerPage,$footer);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
