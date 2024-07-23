<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller 
{
	public $headerPage        = '../../views/header';
	public $footerPage        = '../../views/footer';
	public $listPage          = 'products';
	public $product_viewPage  = 'view-product';
	public $cartPageajax      = '../../views/cart-ajax';
	
	public function __construct()
	{
        parent::__construct();
        $this->load->library('shoppingcart');
		$this->load->model('Products_model','my_model');
		$this->load->model('Common_model','common_model');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
    }
	
	public function index()
	{
		$data['web_settings']        = $this->common_model->get_all_websettings();
		$data['products']            = $this->my_model->get_all_products();
		$data['menu']                = $this->common_model->get_all_menu();
		$data['sub_menu']            = $this->my_model->get_sub_menu($cat_id);
		//echo "<pre>";print_r($data['sub_menu']);exit;
		$this->load->view($this->listPage,$data);
	}
	
	
	public function todayDeals()
	{
		$data['web_settings']        = $this->common_model->get_all_websettings();
		$data['products']            = $this->my_model->get_today_deals_products();
		$data['menu']                = $this->common_model->get_all_menu();
		$data['sub_menu']            = $this->my_model->get_sub_menu($cat_id);
		//echo "<pre>";print_r($data['sub_menu']);exit;
		$this->load->view($this->listPage,$data);
	}

	public function searchproperty()
	{	
		if(isset($_POST) && $_POST['submit'] == "submit")
		{
			$text                 = substr($this->input->post('keyword'), 0,7);
		$data['web_settings']     = $this->common_model->get_all_websettings();
		$data['menu']             = $this->common_model->get_all_menu();
		$data['products']         = $this->common_model->get_search($text);
		$data['sub_menu']         = $this->my_model->get_sub_menu($cat_id);		
		$this->load->view($this->listPage,$data);
		}
	}

	/*public function feature_products()
	{
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$this->load->library('pagination');
		$config['base_url'] = site_url().'products/feature_products/';
		$config['total_rows'] = $this->db->where('hstatus',1)->get('tbl_products')->num_rows();
		$config['per_page'] = 12;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
		$data['products']            = $this->my_model->get_f_products($config['per_page'],$this->uri->segment(3));
		$data['feature_products']    = $this->my_model->get_feature_products();
		$data['menu']        = $this->my_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}

	public function prouct_by_discount($id)
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url().'products/prouct_by_discount/'.$id.'/';
		$config['total_rows'] = $this->db->where('cat_id',$id)->get('tbl_products')->num_rows();
		$config['per_page'] = 12;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
		$data['products']            = $this->my_model->get_discount_products($id,$config['per_page'],$this->uri->segment(4));
		$data['feature_products']    = $this->my_model->get_feature_products();
		$data['web_settings']   = $this->common_model->get_all_websettings();
		$data['menu']           = $this->my_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}


	public function prouct_by_category($id)
	{
		$data['web_settings'] = $this->common_model->get_all_websettings();

		$this->load->library('pagination');
		$config['base_url'] = site_url().'products/prouct_by_category/'.$id.'/';
		$config['total_rows'] = $this->db->where('cat_id',$id)->get('tbl_products')->num_rows();
		$config['per_page'] = 12;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['uri_segment'] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
		$data['products']            = $this->my_model->get_category_products($id,$config['per_page'],$this->uri->segment(4));
		$data['feature_products']    = $this->my_model->get_feature_products();
		$data['products']    = $this->my_model->get_category_products($id);
		$data['sub_menu']    = $this->my_model->get_sub_menu($id);
		$this->load->view($this->listPage,$data);
	}*/

	public function prouct_by_category($id)
	{
		$data['web_settings']      = $this->common_model->get_all_websettings();
		$data['menu']              = $this->common_model->get_all_menu();
		$data['products']          = $this->my_model->get_category_products($id);
		$data['sub_menu']          = $this->my_model->get_sub_menu($id);
		$data['cat_name']           = $this->my_model->get_ccname($id);
		//echo "<pre>";print_r($data['cat_name']);exit;
		$this->load->view($this->listPage,$data);
	}

	public function prouct_by_subcategory($cat_id,$id)
	{
		$data['web_settings']      = $this->common_model->get_all_websettings();
		$data['menu']              = $this->common_model->get_all_menu();
		$data['products']          = $this->my_model->get_subcategory_products($cat_id,$id);
		$data['sub_menu']          = $this->my_model->get_sub_menu($cat_id);
		$data['catname']           = $this->my_model->get_cname($id);
		//echo "<pre>";print_r($data['catname']);exit;
		$this->load->view($this->listPage,$data);
	}

	public function prouct_by_childcategory($cat_id,$subcat_id,$id)
	{
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$data['menu']         = $this->common_model->get_all_menu();
		$data['products']     = $this->my_model->get_childcategory_products($cat_id,$subcat_id,$id);
		$data['sub_menu']     = $this->my_model->get_sub_menu($cat_id);
		$data['subcatname']   = $this->my_model->get_sname($id);
		/*echo "<pre>";print_r($data['subcatname']);exit;*/
		$this->load->view($this->listPage,$data);
	}

	public function product_view($id)
	{
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$datap                = $this->my_model->get_product($id);
		$data['product_view'] = $datap[0];
		/*echo "<pre>";print_r($data['product_view']);exit;*/
		$data['related_products']    = $this->my_model->get_recent_ads($id,$datap[0]['cat_id']);
		$data['menu']                = $this->common_model->get_all_menu();
		$data['sub_menu']     = $this->my_model->get_sub_menu($data['product_view']['cat_id']);
		$data['childcatname']   = $this->my_model->get_sname($data['product_view']['childcat_id']);
		$this->load->view($this->product_viewPage,$data);
	}

	public function deletecart()
	{
		$id = $this->input->post('valu');
		$data = array(
               'rowid'   => $id,
                'qty'     => 0
            );
		$this->shoppingcart->update($data);
		$this->load->view('cart-ajax');
	}
}
