 <div id="cartdivid">
          <div class="mini-cart">
		    
			<?php if($this->cart->total_items()== 0) { ?>
            <div class="basket"> <a href=""><span>0</span></a> </div>
			<?php  } else { ?>
			 <div class="basket"> <a href=""><span><?php echo $this->cart->total_items();?></span></a> </div>
            <div class="fl-mini-cart-content" style="display: none;">
              <div class="block-subtitle">
                <div class="top-subtotal"><?php echo $this->cart->total_items();?> item(s), <span class="price">$<?php echo number_format($this->cart->total()); ?></span> </div>
                <!--top-subtotal-->
                <!--pull-right-->
              </div>
              <!--block-subtitle-->
              <ul class="mini-products-list" id="cart-sidebar">
                
				<?php foreach ($this->cart->contents() as $items){ ?>
                      <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                      <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                       <?php if($option_name=='image'){ ?>
				<li class="item first">
                  <div class="item-inner"><a class="product-image"><img alt="" src="<?php echo site_url(); ?>images/products/<?php echo $option_value; ?>"></a>
                    <div class="product-details">
                      <?php /*<div class="access"><a class="btn-remove1" title="Remove This Item" onClick="deletecart('<?php echo $items['rowid']; ?>');" href="#">Remove</a></div>*/?>
                      <div class="access"><a class="btn-remove1" title="Remove This Item" href="#">Remove</a> <a class="btn-edit" title="Edit item" href="#" onClick="deletecart('<?php echo $items['rowid']; ?>');"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                      <!--access-->
                      <strong><?php echo $items['qty'];?></strong> x <span class="price"><?php echo $items['name'];?></span>
                      <p class="product-name"><a href=""><?php echo $items['name'];?></a></p>
                    </div>
                  </div>
                </li>
                <?php }?>
				<?php endforeach; ?> 
				<?php endif; ?>
				<?php }?>
              </ul>
              <div class="actions">
                <div class="col-md-6">
				    <a href="<?php echo site_url();?>cart"> <button class="btn-checkout" title="Checkout" type="button"><span>Cart</span></button></a>
				</div>

                <div class="col-md-6">
				    <a href="<?php echo site_url();?>checkout/payment"><button class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
				</div>
              </div>
            </div>
			<?php } ?> 
          </div>