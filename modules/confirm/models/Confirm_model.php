<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Confirm_model extends CI_Model {
	// Variable Declaration Here
	//public $content = 'tbl_content';
	// Autoloading a system library usin constructor method
	public function __construct() 
	{
        parent::__construct();
 		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(1);
		ini_set('display_errors','on'); 
    }
  
	   public function get_single_product_data($id) 
	   {
			$this->db->select("*");
			$this->db->from("tbl_orders");
			$this->db->where('id', $id);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$result = $query->row_array();
			return $result;
		}
		
		public function get_item_data($id) 
	   {
			$this->db->select("*");
			$this->db->from("tbl_orders");
			$this->db->where('order_id', $id);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$result = $query->row_array();
			return $result;
		}
		
		public function get_data_products($id) 
	   {
			$this->db->select("*");
			$this->db->from("tbl_order_products");
			$this->db->where('order_table_id', $id);
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		public function status_record($id)
		{
    		$sts = 1;
    		$set_data = array(
    						'status' => $sts
    					);
    		$this->db->where('id',$id);
    		$result = $this->db->update("tbl_orders", $set_data); 
    		return $result;
	   }
	
	public function cancel_order($id)
	{
		$this->cancel_products_order($id);
		$this->db->where('id',$id);
		$result = $this->db->delete("tbl_orders"); 
		return $result;
	}
	
    
	public function pay_s($orderid, $invoice_number)
	{
		$set_data = array(
						'pay_status'     => 1,
						'invoice_number' => $invoice_number
					);
		$this->db->where('order_id',$orderid);
		$result = $this->db->update("tbl_orders", $set_data); 
		return $result;
	}
	
	public function cancel_products_order($id)
	{
		$this->db->where('order_table_id',$id);
		$this->db->delete("tbl_order_products"); 
	}
	
	public function get_max_invoice_number()
	{
		$query = $this->db->query("SELECT max(invoice_number) as max_invoice FROM tbl_orders");
		$result = $query->result_array();
	    return $result;
	}

	public function payment_details($data)
	{
		$result = $this->db->insert("payment_details",$data);
		//echo "<pre>";print_r($result);exit;
	    if(!empty($result))
	    {
	    	 return $result; 
	    }
	}
}
