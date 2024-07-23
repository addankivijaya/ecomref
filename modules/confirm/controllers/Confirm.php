<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Confirm extends MX_Controller {
	public $listPage   = 'confirm';
	public $payuPage   = 'payu';
	
	// Autoloading a system library using constructor method
	public function __construct() 
	{
        parent::__construct();
		$this->load->model('Confirm_model','my_model'); 
		$this->load->model('Common_model','common_model'); 
 		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(1);
		ini_set('display_errors','on'); 
    }
    
    
    public function index()
    {
        //$last_invoice_number = $this->my_model->get_max_invoice_number();
        //echo "<pre>";print_r($last_invoice_number);exit;
		
    }
    
        function generate_invoice($d)
		{
    		if(count($d) > 0)
    		{
    		    $last_invoice_number = $d[0]['max_invoice'];
    		    $new_invoice_number  = $last_invoice_number + 1;
    		    return $new_invoice_number;
    		}else
    		{
    		    $new_invoice_number  = "0001";
    		    return $new_invoice_number;
    		}
		}
    

	 
	public function pay($id)
	{
		//echo $id;exit;
		$data['web_settings']      = $this->common_model->get_all_websettings();
		$data['menu']              = $this->common_model->get_all_menu();
        $data['record']            = $this->my_model->get_single_product_data($id);
		$data['detailed']          = $this->my_model->get_data_products($id);
		//$data['coverted_currency'] = $data['record']['total'];
		$this->load->view($this->listPage,$data);
	}
	
	public function ebsPay()
	{
		if($this->input->post('submitted')=="Pay Now")
		{
	       $this->session->set_userdata('paysess', $_POST);  
		}
		$data['web_settings']      = $this->common_model->get_all_websettings();
		$data['menu']              = $this->common_model->get_all_menu();
		$this->load->view("ebsPay",$data);
	}
	
	public function success()
	{
		if(isset($_REQUEST))
		{
			//echo "<pre>";print_r($_REQUEST);exit;
			//$response = $_REQUEST;
			if($_REQUEST['ResponseMessage'] == "Transaction Successful")
			{
                //echo "success";exit;
                $record   =  $this->my_model->get_item_data($_REQUEST['MerchantRefNo']);
		        $products =  $this->my_model->get_data_products($record['id']);
		        
		        $last_invoice_number = $this->my_model->get_max_invoice_number();
		        $d                   = $this->my_model->get_max_invoice_number();
                $invoice_number      = $this->generate_invoice($d);
                $inumber             = sprintf("%04d",$invoice_number);
		        $x                   = $this->my_model->pay_s($_REQUEST['MerchantRefNo'],$inumber);
                if($x):
               
  $temp = "<div class='col-sm-12 col-md-8 col-lg-12 no-padding-both'>
  <div style='height:7px; background-color:#F7B11D'>&nbsp;</div>
  <div style='background-color:#337AB7; margin:0px; padding:10px; font-family:Helvetica, sans-serif; font-size:13px; color:#337AB7;'>
  <div style='width:100%; text-align:center; margin:auto;'>
  <div style='float:left; margin:0 0 0 10px;'><img  src='".site_url()."images/small.png' style='height:60px;width:80px;'></div>
  </div>
    <div style='clear:both;'></div>
    <div style='border-radius: 5px 5px 5px 5px; padding:20px; margin-top:25px; background-color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-size:13px;'><span style='font-weight:bold;'></span>
      <div class='row'> <div class='col-md-12' ><span style='text-align:center; font-size:20px; font-weight:bold;margin: 30px 0 0 30px; color:#F7B11D;' >ORDER DETAILS</span></div> </div>
	 <div class='row'> <div class='col-md-3' >Order ID:<b> ".stripslashes($record['order_id'])." </b></div> <div class='col-md-3'  >Date Time: ".date('F j, Y, g:i a')."</div><div class='col-md-3' >Gst Registration Number:<b>36CJOPB9417KIZS</b></div></div>

    
      <table style='width:80%; margin:0 0 0 0; border: 1px solid black; border-collapse: collapse;'>
  <tr>
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >Quantity</th>
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;'>Item Name</th> 
 <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;'>Image</th> 	
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >Rate</th>
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >Total</th>    
  </tr>";
  
 foreach($products as $keys => $items):
  $prd .="<tr>
    <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >".$items['qty']."</td>
    <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >".$items['name']."</td>
	 <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' ><img src='".site_url()."images/products/".$items['image']."' height='50' width='100'></td>
   <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$items['price']."</td>    
    <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$items['subtotal']."</td>    
  </tr>";
 endforeach;
  $last .= "<tr>
    <td  colspan='4' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >Subtotal</td>
    <td colspan='1' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$record['cart_total']."</td>
  </tr>
  
   <tr>
    <td  colspan='4' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >Shipping</td>
    <td colspan='1' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$record['shipping']."</td>
  </tr>
  <tr>
    <td  colspan='4' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >Payable Amount</td>
    <td colspan='1' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$record['total']."</td>
  </tr>
  <tr>
    <td  colspan='5' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' ><b>Shipping Address</b></td>
  </tr>
   <tr>
    <td  colspan='5' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >".$record['dname']."<br>".$record['demail']."<br>".$record['dmobile']."<br>".$record['daddress']."&nbsp; ,&nbsp;".$record['dlocality']."&nbsp; ,&nbsp;".$record['dcity']."&nbsp; ,&nbsp;".$record['dstate']."&nbsp; ,&nbsp;".$record['dzipcode']."</td>
  </tr>
</table>
<p>Thank You.</p>
<p>For any query or assistance, feel free to <a target='_blank' href='".site_url()."contactus'>Contact Us.</a></p>
    </div>
  </div>
</div>";
						
						$config = Array(
						    'protocol'  => 'smtp.gmail',
						    'mailtype'  => 'html',
						    'smtp_host' => 'ssl://smtp.googlemail.com',
                                                    'smtp_port' => 465,
						    'smtp_user' => 'info@bracedeal.com', 
						    'smtp_pass' => 'royal@123', 
						    'charset'   => 'iso-8859-1',
						    'priority'  => '1',
						    'wordwrap'  => TRUE
						);
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
						$this->email->from('info@bracedeal.com', 'bracedeal.com');
						$this->email->to($record['demail']);
						//$this->email->bcc('info@greenfreshshop.com');
						$this->email->subject("Bracedeal New Order Details");
						$this->email->message($temp.$prd.$last);
						$this->email->send();

                       //$assigned_message = "Hi, ".$record['dfname'].". Your Order For ".$items['name']." Is Conformed . Your Order Id Is ".$record['order_id']." . Rest Assured it Will be Shipped Soon  . Thank You ...!";
						//$this->sms($record['dmobile'],$assigned_message);


               $this->session->set_flashdata( 'msg_succ', '<h3>Payment Success.Continue Shopping.</H3>' );
				redirect(site_url().'products');
			   endif;
			}else
			{
               $this->session->set_flashdata( 'msg_fail_order', '<h3>Payment Failure.Continue Shopping.</H3>' );
				redirect(site_url().'products');
			}
		}
		
	}

	
		
	
    
	public function cancelorder($id)
	{
		
		$record   =  $this->my_model->get_single_product_data($id);
		$products =  $this->my_model->get_data_products($record['id']);
                //echo "<pre>";print_r($products);exit;
		$temp = "<div class='col-sm-12 col-md-8 col-lg-12 no-padding-both'>
  <div style='height:7px; background-color:#F7B11D'>&nbsp;</div>
  <div style='background-color:#337AB7; margin:0px; padding:10px; font-family:Helvetica, sans-serif; font-size:13px; color:#337AB7;'>
  <div style='width:100%; text-align:center; margin:auto;'>
  <div style='float:left; margin:0 0 0 10px;'><img  src='".site_url()."images/small.png' style='height:60px;width:80px;'></div>
  </div>
    <div style='clear:both;'></div>
    <div style='border-radius: 5px 5px 5px 5px; padding:20px; margin-top:25px; background-color:#FFFFFF; font-family:Arial, Helvetica, sans-serif; font-size:13px;'><span style='font-weight:bold;'></span>
      <div class='row'> <div class='col-md-12' ><span style='text-align:center; font-size:20px; font-weight:bold;margin: 30px 0 0 30px; color:#F7B11D;' >ORDER DETAILS</span></div> </div>
	 <div class='row'> <div class='col-md-3' >Order ID:<b> ".stripslashes($record['order_id'])." </b></div> <div class='col-md-3'  >Date Time: ".date('F j, Y, g:i a')."</div><div class='col-md-3' >Gst Registration Number:<b>36CJOPB9417KIZS</b></div></div>

    
      <table style='width:80%; margin:0 0 0 0; border: 1px solid black; border-collapse: collapse;'>
  <tr>
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >Quantity</th>
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;'>Item Name</th> 
 <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;'>Image</th> 	
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >Rate</th>
    <th style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >Total</th>    
  </tr>";
  
 foreach($products as $keys => $items):
  $prd .="<tr>
    <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: center;' >".$items['qty']."</td>
    <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >".$items['name']."</td>
	 <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' ><img src='".site_url()."images/products/".$items['image']."' height='50' width='100'></td>
   <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$items['price']."</td>    
    <td style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$items['subtotal']."</td>    
  </tr>";
 endforeach;
  $last .= "<tr>
    <td  colspan='4' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >Subtotal</td>
    <td colspan='1' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$record['cart_total']."</td>
  </tr>
  
   <tr>
    <td  colspan='4' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >Shipping</td>
    <td colspan='1' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$record['shipping']."</td>
  </tr>
  <tr>
    <td  colspan='4' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >Payable Amount</td>
    <td colspan='1' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: right;' >Rs.".$record['total']."</td>
  </tr>
  <tr>
    <td  colspan='5' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' ><b>Shipping Address</b></td>
  </tr>
   <tr>
    <td  colspan='5' style='border: 1px solid black; border-collapse: collapse; padding: 5px;  text-align: left;' >".$record['dname']."<br>".$record['demail']."<br>".$record['dmobile']."<br>".$record['daddress']."&nbsp; ,&nbsp;".$record['dlocality']."&nbsp; ,&nbsp;".$record['dcity']."&nbsp; ,&nbsp;".$record['dstate']."&nbsp; ,&nbsp;".$record['dzipcode']."</td>
  </tr>
</table>
<p>Thank You.</p>
<p>For any query or assistance, feel free to <a target='_blank' href='".site_url()."contactus'>Contact Us.</a></p>
    </div>
  </div>
</div>";
						
						$config = Array(
						    'protocol'  => 'smtp.gmail',
						    'mailtype'  => 'html',
						    'smtp_host' => 'ssl://smtp.googlemail.com',
                                                    'smtp_port' => 465,
						    'smtp_user' => 'info@bracedeal.com', 
						    'smtp_pass' => 'royal@123', 
						    'charset'   => 'iso-8859-1',
						    'priority'  => '1',
						    'wordwrap'  => TRUE
						);
						$this->load->library('email', $config);
						$this->email->set_newline("\r\n");
						$this->email->from('info@bracedeal.com', 'bracedeal.com');
						$this->email->to($record['demail']);
						//$this->email->bcc('info@greenfreshshop.com');
						$this->email->subject("Bracedeal Order Cancellation Details");
						$this->email->message($temp.$prd.$last);
						$this->email->send();
				                $result = $this->my_model->cancel_order($id);
						if($result)
						{
							
							//echo "success";exit;
							$this->session->set_flashdata( 'msg_fail_order','Your Order was Cancelled');
							redirect(site_url().'products');
						}
						else
						{
							$this->session->set_flashdata( 'msg_succ', "Not cancelled" );
							redirect(site_url().'products');
						}
	}

    /*function sms($num,$msg)
	{
		//echo $num;exit;
		$url ="http://sms.royalitpark.com/spanelv2/api.php?username=amerison&password=royal123&to=".urlencode($num)."&from=ameris&message=".urlencode($msg);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 4); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close')); 
		$start = array_sum(explode(' ', microtime())); 
		$result = curl_exec($ch); 
		//echo $result;exit;
		return $result;
	}*/
}
/* End of file Home.php */
/* Location: ./application/controllers/Home.php */