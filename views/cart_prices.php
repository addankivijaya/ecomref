<li>Total <i>-</i> <span>₹<?php echo number_format($this->cart->total(),2);?>/-</span></li>
<?php if($this->cart->total()!='' && $this->session->userdata('vat')!=0):?>
<li>Estimated Tax <i>-</i> <span>₹<?php echo $vat= number_format(ceil(($this->session->userdata('vat')/100)*$this->cart->total()),2);?>/-</span></li>
<?php else:?>
<li>Estimated Tax <i>-</i> <span>₹0.00</span></li>
<?php endif;?>

<?php if($this->cart->total()!='' && $this->session->userdata('ship')!=0):?>
<li>Shipping <i>-</i> <span>₹<?php echo $shipping =  number_format($this->session->userdata('ship'),2);?>/- </span></li>
<?php else:?>
<li>Shipping <i>-</i> <span>Free</span></li>
<?php endif;?>
<li>Grang Total <i>-</i> <span>₹<?php echo $total = number_format(($this->cart->total()+$shipping + $vat),2);?>/-</span></li>