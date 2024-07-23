<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Checkout_model extends CI_Model {
		
		public function __construct() 
		{
	        parent::__construct();
	        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		    error_reporting(0);
		    ini_set('display_errors','off');
	    }
		
		public function get_user_data()
		{
			$this->db->select("*");
			$this->db->from("tbl_register");
			$this->db->where('id',$this->session->userdata('user_id'));
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}

		public function get_user_agent_data()
		{
			$this->db->select("*");
			$this->db->from("tbl_agent_register");
			$this->db->where('id',$this->session->userdata('user_id'));
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}
		

		public function insert_cod_order($order_id,$carttotal,$shipping,$tot)
		{	   
			$set_data = array(
						'user_id'=>$this->session->userdata('user_id'),
						'order_id' => mysqli_real_escape_string($this->get_mysqli(),$order_id),
						'cart_total'=> mysqli_real_escape_string($this->get_mysqli(),$carttotal),
						'shipping'=> mysqli_real_escape_string($this->get_mysqli(),$shipping),
						'total'=> mysqli_real_escape_string($this->get_mysqli(),$tot),
						'dname' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('dname')),
						'dmobile' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('dmobile')),
						'demail' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('demail')),
						'dstate' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('dstate')),
						'dcity' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('dcity')),
					    'dlocality' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('dlocality')),
						'daddress' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('daddress')),
						'dzipcode' => mysqli_real_escape_string($this->get_mysqli(),$this->input->post('dzipcode')),
						'create_date_time' => date('Y-m-d H:i:s'),
						'status' => 1,
						'pay_status' => 0
					);
	    /*echo "<pre>";print_r($set_data);exit;*/
		$result = $this->db->insert("tbl_orders", $set_data);
		$last_id = $this->db->insert_id();
		if($result)
		{
			$this->insert_order_products($last_id);
		}
		return $last_id;
		}

		
		public function insert_order_products($last_id)
	    {
		foreach ($this->cart->contents() as $items)
		{
			if ($this->cart->has_options($items['rowid']) == TRUE):
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				  if($option_name=='image'):
					$image_name = $option_value;
				  endif; 
				 endforeach;
		    endif;


		    if ($this->cart->has_options($items['rowid']) == TRUE):
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				  if($option_name=='size'):
					$image_size = $option_value;
				  endif; 
				 endforeach;
		    endif;

		    if ($this->cart->has_options($items['rowid']) == TRUE):
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				  if($option_name=='shipping'):
					$image_shipping = $option_value;
				  endif; 
				 endforeach;
		    endif;
		    
		    if ($this->cart->has_options($items['rowid']) == TRUE):
				foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):
				  if($option_name=='gst'):
					$image_gst = $option_value;
				  endif; 
				 endforeach;
		    endif;
				 
			 $set_data= array(
						'order_table_id'=> $last_id,
						'item_id'       => $items['id'],
						'image'         => $image_name,
						'size'          => $image_size,
						'name'          => $items['name'],
						'price'         => $items['price'],
						'shipping'      => $image_shipping,
						'gst'           => $image_gst,
						'qty'           => $items['qty'],
						'subtotal'      => $items['subtotal']
					);
	    /*echo "<pre>";print_r($set_data);exit;*/
		$result =  $this->db->insert("tbl_order_products", $set_data); 
		}
		return $result;
	}
	



	public function get_data($id) 
    {
		$this->db->select("*");
		$this->db->from("tbl_orders");
		$this->db->where('id', $id);
		$query = $this->db->get();
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

	public function get_mysqli()
	{
       $db = (array)get_instance()->db;
       return mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
    }
}
