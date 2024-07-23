<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products_model extends CI_Model {

		public function __construct()
		{
	        parent::__construct();
			error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		    error_reporting(0);
		    ini_set('display_errors','off');
	    }

	    public function get_ccname($id)
	    {
			$this->db->select("tbl_category.name as cname,tbl_category.id as cid");
			$this->db->from("tbl_category");
			$this->db->where('tbl_category.id', $id);
			$query  = $this->db->get();
			$result = $query->row_array();
			return $result;
	    }

	    public function get_cname($sid)
	    {
			$this->db->select("tbl_subcategory.id as sid,tbl_category.id as cid,tbl_subcategory.name as sname,tbl_category.name as cname");
			$this->db->from("tbl_subcategory");
			$this->db->where('tbl_subcategory.id', $sid);
			$this->db->join('tbl_category','tbl_category.id = tbl_subcategory.cat_id');
			$query  = $this->db->get();
			$result = $query->row_array();
			return $result;
	    }

	    public function get_sname($cid)
	    {
	        $this->db->select("tbl_category_child.id as ccid,tbl_subcategory.id as sid,tbl_category.id as cid,tbl_category_child.child_category_name as chname,tbl_subcategory.name as sname,tbl_category.name as cname");
			$this->db->from("tbl_category_child");
			$this->db->where('tbl_category_child.id', $cid);
			$this->db->join('tbl_category','tbl_category.id = tbl_category_child.category_id');
			$this->db->join('tbl_subcategory','tbl_subcategory.id = tbl_category_child.sub_category_id');
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
	    }

		public function get_discount_products($id)
		{
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('discount_id', $id);
			$this->db->where('status', 1);
			$this->db->where('dstatus', 1);
			$this->db->limit($limit,$offset);
			$query = $this->db->get();
			$result = $query->result_array();
			$newarr=array();
		    if(!empty($result)){
			foreach($result as $key => $value){
				$newarr[$key]=array(
				'id'=>$value['id'],
				'image1'=>$value['image1'],
				'title'=>$value['title'],
				'cat_id'=>$value['cat_id'],
				'subcat_id'=>$value['subcat_id'],
				'brand_id'=>$value['brand_id'],
				'available'=>$value['available']
				);
				$this->db->select("*");
				$this->db->from("tbl_product_details");
				$this->db->where('lid',$value['id']);
				$query1 = $this->db->get();
				$result1 = $query1->result_array();
				if(!empty($result1)){
					foreach($result1 as $keys => $values){
				$newarr[$key]['data'][]=$values;
					}
				}
			}
		}
		/*echo'<pre>';print_r($newarr);exit; */
		return $newarr;
		}



		public function get_all_products()
		{
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->result_array();
		    return $result;
		}
		
		
		public function get_today_deals_products()
		{
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->where(array('status'=>1,"dstatus" =>1));
			$query = $this->db->get();
			$result = $query->result_array();
		    return $result;
		}


	    public function get_feature_products()
		{
			$this->db->select("id,image1,title,price,dprice,available,sizes,stock_left,shipping");
			$this->db->from("tbl_products");
			$this->db->order_by('id','random');
			$this->db->limit(16);
			$this->db->where('status', 1);
			$this->db->where('hstatus', 1);
			$query  = $this->db->get();
			$result = $query->result_array();
		    return $result;
		}


		public function get_f_products($limit,$offset)
		{
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('status', 1);
			$this->db->where('hstatus', 1);
			$this->db->limit($limit,$offset);
			$query = $this->db->get();
			$result = $query->result_array();
			$newarr=array();
		    if(!empty($result)){
			foreach($result as $key => $value){
				$newarr[$key]=array(

				'id'          => $value['id'],
				'image1'      => $value['image1'],
				'title'       => $value['title'],
				'cat_id'      => $value['cat_id'],
				'subcat_id'   => $value['subcat_id'],
				'brand_id'    => $value['brand_id'],
				'available'   => $value['available']
				);
				$this->db->select("*");
				$this->db->from("tbl_product_details");
				$this->db->where('lid',$value['id']);
				$query1 = $this->db->get();
				$result1 = $query1->result_array();
				if(!empty($result1)){
					foreach($result1 as $keys => $values){
				$newarr[$key]['data'][]=$values;
					}
				}
			}
		}
		return $newarr;
		}
        public function get_category_products($id)
		{
			$this->db->select("id,cat_id,image1,title,price,dprice,available,sizes,stock_left,shipping");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('cat_id',$id);
			$this->db->where('status', 1);
			$query = $this->db->get();
			/*echo $this->db->last_query();exit;*/
			$result = $query->result_array();
			return $result;
			/*$newarr=array();
		    if(!empty($result)){
			foreach($result as $key => $value)
			{
				$newarr[$key]=array(
				'id'        => $value['id'],
				'image1'    => $value['image1'],
				'title'     => $value['title'],
				'cat_id'    => $value['cat_id'],
				'subcat_id' => $value['subcat_id'],
				'brand_id'  => $value['brand_id'],
				'available' => $value['available'],
				'price'     => $value['price'],
				'dprice'    => $value['dprice']
				);
				$this->db->select("*");
				$this->db->from("tbl_product_details");
				$this->db->where('lid',$value['id']);
				$query1 = $this->db->get();
				$result1 = $query1->result_array();
				if(!empty($result1))
				{
					foreach($result1 as $keys => $values)
					{
				      $newarr[$key]['data'][]=$values;
					}
				}
			}
		}
		//echo'<pre>';print_r($newarr);exit;
		return $newarr;*/
	}



		public function get_subcategory_products($cat_id,$id)
		{
			$this->db->select("id,cat_id,subcat_id,image1,title,price,dprice,available,sizes,stock_left,shipping");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('cat_id',$cat_id);
			$this->db->where('subcat_id',$id);
			$this->db->where('status', 1);
			$query = $this->db->get();
			/*echo $this->db->last_query();exit;*/
			$result = $query->result_array();
			return $result;
			/*$newarr=array();
		    if(!empty($result)){
			foreach($result as $key => $value)
			{
				$newarr[$key]=array(
				'id'        => $value['id'],
				'image1'    => $value['image1'],
				'title'     => $value['title'],
				'cat_id'    => $value['cat_id'],
				'subcat_id' => $value['subcat_id'],
				'brand_id'  => $value['brand_id'],
				'available' => $value['available'],
				'price'     => $value['price'],
				'dprice'    => $value['dprice']
				);
				$this->db->select("*");
				$this->db->from("tbl_product_details");
				$this->db->where('lid',$value['id']);
				$query1 = $this->db->get();
				$result1 = $query1->result_array();
				if(!empty($result1))
				{
					foreach($result1 as $keys => $values)
					{
				      $newarr[$key]['data'][]=$values;
					}
				}
			}
		}
		//echo'<pre>';print_r($newarr);exit;
		return $newarr;*/
	}

		public function get_childcategory_products($cat_id,$subcat_id,$id)
		{
			$this->db->select("id,cat_id,subcat_id,childcat_id,image1,title,price,dprice,available,sizes,stock_left,shipping");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('status', 1);
			$this->db->where('cat_id',$cat_id);
			$this->db->where('subcat_id',$subcat_id);
			$this->db->where('childcat_id',$id);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			return $newarr = $query->result_array();
			/*$newarr=array();
		    if(!empty($result)){
			foreach($result as $key => $value)
			{
				$newarr[$key]=array(
				'id'          => $value['id'],
				'image1'      => $value['image1'],
				'title'       => $value['title'],
				'cat_id'      => $value['cat_id'],
				'subcat_id'   => $value['subcat_id'],
				'brand_id'    => $value['brand_id'],
				'available'   => $value['available'],
				'price'       => $value['price'],
				'dprice'      => $value['dprice']
				);
				$this->db->select("*");
				$this->db->from("tbl_product_details");
				$this->db->where('lid',$value['id']);
				$query1 = $this->db->get();
				$result1 = $query1->result_array();
				if(!empty($result1))
				{
					foreach($result1 as $keys => $values)
					{
				      $newarr[$key]['data'][]=$values;
					}
				}
			}
		}
		return $newarr;*/
		//return $result;
		}

		public function get_product($id)
		{
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('id',$id);
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->result_array();
			/*$newarr=array();
		    if(!empty($result)){
			foreach($result as $key => $value){
				$newarr[$key]=array(

				'id'          => $value['id'],
				'image1'      => $value['image1'],
				'title'       => $value['title'],
				'cat_id'      => $value['cat_id'],
				'subcat_id'   => $value['subcat_id'],
				'brand_id'    => $value['brand_id'],
				'available'   => $value['available'],
				'content'     => $value['content'],
				);
				$this->db->select("*");
				$this->db->from("tbl_product_details");
				$this->db->where('lid',$value['id']);
				$query1 = $this->db->get();
				$result1 = $query1->result_array();
				if(!empty($result1)){
					foreach($result1 as $keys => $values){
				$newarr[$key]['data'][]=$values;
					}
				}
			}
		}
		return $newarr;*/
		return $result;
		}

		public function get_product_details($id)
		{
            $this->db->select("*");
			$this->db->from("tbl_product_details");
			$this->db->order_by('id','asc');
			$this->db->where('lid',$id);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$result = $query->result_array();
			if(count($result) > 0){
				return $result;
			}
		}

	    public function get_category_products_count($id)
	    {
            $this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->order_by('id','asc');
			$this->db->where('cat_id',$id);
			$this->db->where('status', 1);
			$query = $this->db->get();
			$result = $query->num_rows();
			if(count($result) > 0)
			{
				return $result;
		    }
	    }


	    /*public function get_left_menu()
		{
			$this->db->select("*");
			$this->db->from('tbl_category');
			$this->db->where('status',1);
			$query = $this->db->get();  
			$cmain = $query->result_array();
			foreach($cmain as $cmkey => $cmvalue){
				$result[$cmkey] =  array(
										'caid'   => $cmvalue['id'],
										'caname' => $cmvalue['name']
									);
				$this->db->select("*");
				$this->db->from('tbl_subcategory');
				$this->db->where('cat_id',$cmvalue['id']);
				$query = $this->db->get();  			
				$csub = $query->result_array();			
				foreach($csub as $sckey => $scvalue){
					$result[$cmkey]['scmenu'][$sckey] =  array(
					                            'scid'   => $scvalue['id'],
												'scname' => $scvalue['name']
											);
				$this->db->select("*");
				$this->db->from('tbl_category_child');
				$this->db->where('sub_category_id',$scvalue['id']);
				$query = $this->db->get();
				$cchild = $query->result_array();
				foreach($cchild as $cckey => $ccvalue){
					$result[$cmkey]['scmenu'][$sckey]['ccmenu'][$cckey] =  array(
					                            'ccid'     => $ccvalue['id'],
												'ccname'   => $ccvalue['child_category_name']
											);
				}
			}
		}
			return $result;
	}*/

		public function get_sub_menu($cat_id="")
		{
		$this->db->select("*");
		$this->db->from('tbl_category');
		if($cat_id !=""):$this->db->where('id',$cat_id);endif;
		$query = $this->db->get();
		$category_main = $query->result_array();
		foreach($category_main as $m1key => $m1value)
		{
			$result[$m1key] =  array(
									'cid'   => $m1value['id'],
									'cname' => $m1value['name']
								);
			$this->db->select("*");
			$this->db->from('tbl_subcategory');
			$this->db->where('cat_id',$m1value['id']);
			$query = $this->db->get();
			$category_sub = $query->result_array();
			foreach($category_sub as $s1key => $s1value)
			{
				$result[$m1key]['s1menu'][$s1key] =  array(
				                            'sid'   => $s1value['id'],
											'sname' => $s1value['name']
										);
				$this->db->select("*");
				$this->db->from('tbl_category_child');
				$this->db->where('sub_category_id',$s1value['id']);
				$query = $this->db->get();
				$category_child = $query->result_array();
				foreach($category_child as $c1key => $c1value)
				{
					$result[$m1key]['s1menu'][$s1key]['c1menu'][$c1key] =  array(
												'chid'     => $c1value['id'],
												'chname'   => $c1value['child_category_name']
											);
				}
			}
		}
		return $result;
		//echo "<pre>";print_r($result);exit;
      }
       

       public function get_recent_ads($id,$cat_id)
	   {
			$this->db->select("*");
			$this->db->from("tbl_products");
			$this->db->order_by('id','RANDOM');
			$this->db->where('id !=',$id);
			$this->db->where('cat_id',$cat_id);
			$this->db->where('status',1);
			$this->db->limit(4);
			$query = $this->db->get();
			//echo $this->db->last_query();exit;
			$result = $query->result_array();
			if(count($result) > 0){
				return $result;
			}
		}

		public function get_selected_product($id)
		{
			$this->db->select("tbl_products.*,tbl_product_details.lid,tbl_product_details.quantity as qtype,tbl_product_details.price as qprice,tbl_product_details.dprice as dprice");
			$this->db->from("tbl_product_details");
			$this->db->where('tbl_product_details.id', $id);
			$this->db->join('tbl_products','tbl_products.id=tbl_product_details.lid');
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}

		public function get_selected_prices($id)
		{
			$this->db->select("*");
			$this->db->from("tbl_product_details");
			$this->db->where('id',$id);
			$query = $this->db->get();
			$result = $query->row_array();
			return $result;
		}

		/*public function get_sub_menu($cat_id)
		{
			$this->db->select("*");
			$this->db->from("tbl_subcategory");
			$this->db->where('cat_id',$cat_id);
			$query  = $this->db->get();
			$result = $query->result_array();
			return $result;
		}*/
}