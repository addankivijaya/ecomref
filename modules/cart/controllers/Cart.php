<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends MX_Controller {
	public $listPage      = 'cart';
	public $searchPage    = 'search';
	public $cartPageajax  = 'cart-ajax';
	public $cartPriceajax = 'cart_prices';

	public function __construct()
	{
        parent::__construct();
        $this->load->library('shoppingcart');
		$this->load->model('Common_model','common_model');
		$this->load->model('Cart_model','cart_model');
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		error_reporting(0);
		ini_set('display_errors','off');
    }

	public function index()
	{
		/*$shipvat = $this->cart_model->getshippingvat();
		$newdata = array(
					'ship'  => $shipvat['shipping'],
					'vat'   => $shipvat['vat'],
				);
		$this->session->set_userdata($newdata);*/
		$data['web_settings'] = $this->common_model->get_all_websettings();
		$data['menu']         = $this->common_model->get_all_menu();
		$this->load->view($this->listPage,$data);
	}

	public function insertcart()
	{
		$id         = $this->input->post('valu');
		$quantity   = $this->input->post('quantity');
		$size       = $this->input->post('size');
	    $itemdetail = $this->cart_model->getitemdetail($id);
		/*echo "<pre>";print_r($itemdetail);exit;*/
		$data = array(
               'id'      => $itemdetail['id'],
               'qty'     => $quantity,
               'price'   => $itemdetail['dprice'],
               'name'    => $itemdetail['title'],
			   'options' => array('image' => $itemdetail['image1'],'size' => $size,'shipping' => $itemdetail['shipping'],'gst' => $itemdetail['gst'])
               );
	    $this->shoppingcart->insert($data);
		/*echo "<pre>";print_r($this->shoppingcart->contents());exit;*/
		$this->load->view($this->cartPageajax);
		/*echo $this->cart->total_items();exit;*/
	}

	public function updatecart()
	{
		$qty  =  $this->input->post('valu');
		$id   = $this->input->post('id');
		$data = array(
               'rowid'   => $id,
               'qty'     => $qty
            );
		$this->cart->update($data);
		$this->load->view("checkoutcart");
	}

	public function deleteheadcart()
	{
		$id = $this->input->post('valu');
		$data = array(
               'rowid'   => $id,
                'qty'     => 0
            );
		$this->cart->update($data);
		$this->load->view('cart-ajax','refresh');
	}

	public function deletecart()
	{
		$id = $this->input->post('valu');
		$data = array(
               'rowid'   => $id,
                'qty'     => 0
            );
		$this->cart->update($data);
		$this->load->view($this->cartPriceajax);
		//$this->load->view("checkoutcart");
	}
}
