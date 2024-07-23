<?php /*<div id="cartdivid">
	<div class="header-right" >
		<div class="cart box_1" id="ccr">
			<a href="<?php echo site_url('cart');?>">
			  <h3>
			      <div class="total">
				     <span><?php echo $this->cart->total();?></span> (<span><?php echo $this->cart->total_items();?></span> items)
				  </div>
				  <img src="<?php echo site_url();?>images/bag.png" alt="" />
			  </h3>
			  </a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>*/?>
<span>Rs.<?php echo ceil($this->shoppingcart->total());?></span> (<span><?php echo $this->shoppingcart->total_items();?></span> items)