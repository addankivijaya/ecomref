<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {
	
	public $table_category              = "tbl_category";
	public $table_sliders               = "tbl_sliders";
	public $table_partners              = "tbl_partners";
	public $table_discounts             = "tbl_discount";
	public $table_products              = "tbl_products";
	public $table_products_details      = "tbl_product_details";
	public $table_contact               = 'tbl_contact'; 


	public function __construct() 
	{
        parent::__construct();
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
    }
		
		public function get_sliders()
		{
			$this->db->select("id,image");
			$this->db->from($this->table_sliders);
			$this->db->order_by('id','desc');
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function get_partners()
		{
			$this->db->select("id,image");
			$this->db->from($this->table_partners);
			$this->db->order_by('id','desc');
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		public function get_discounts()
		{
			$this->db->select("*");
			$this->db->from($this->table_discounts);
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		public function get_categories()
		{
			$this->db->select("*");
			$this->db->from($this->table_category);
			$this->db->order_by('id','desc');
			$this->db->where('status', 1);
			$this->db->where('top_rated', 1);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}

		public function get_cat()
		{
			$this->db->select("*");
			$this->db->from($this->table_category);
			$this->db->order_by('id','RANDOM');
			$this->db->where('status', 1);
			$this->db->limit(6);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		public function add_contact()
		{
			$set_data = array
			(
				'name' => mysqli_real_escape_string($this->get_mysqli(),ucwords($this->input->post('name'))),
				'email' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('email')),
				'subject' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('subject')),
				'msg' => mysqli_real_escape_string($this->get_mysqli(),ucfirst($this->input->post('message'))),
				'create_date_time' => date('Y-m-d H:i:s')
			);
			/*echo "<pre>";print_r($set_data);exit;*/
			$result = $this->db->insert($this->table_contact,$set_data);
			return $result;
		}

	    public function get_mysqli()
		{
	       $db = (array)get_instance()->db;
	       return mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
	    }
}