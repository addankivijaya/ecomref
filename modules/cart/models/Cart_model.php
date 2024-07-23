<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart_model extends CI_Model {
	
	
	public function __construct() 
	{
        parent::__construct();
		
    }
		
		public function get_contactus_address($id)
		{
			$this->db->select("*");
			$this->db->from("tbl_common");
			$this->db->where('id',$id);
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}
		
		public function add_contact()
		{
			$set_data = array
			(
				'name' => mysql_real_escape_string(ucwords($this->input->post('name',TRUE))),
				'email' => mysql_real_escape_string($this->input->post('email',TRUE)),
				'phone' => mysql_real_escape_string($this->input->post('name',TRUE)),
				'msg' => mysql_real_escape_string(ucfirst($this->input->post('msg',TRUE))),
				'create_date_time' => date('Y-m-d H:i:s')
			);
			$result = $this->db->insert("tbl_contact",$set_data);
			return $result;
		}

		public function getshippingvat() 
	   {
			$this->db->select("*");
			$this->db->from("tbl_shippingandvat");
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}


		public function getitemdetail($id)
		 {
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->where('id', $id);
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}
}