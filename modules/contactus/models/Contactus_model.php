<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus_model extends CI_Model {

	public $table_contact  = 'tbl_contact'; 
	public function __construct() 
	{
        parent::__construct();
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