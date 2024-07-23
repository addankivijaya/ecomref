<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>
<body>
<!-- header -->
  <?php echo $this->load->view('header');?>
<!-- //header -->
<!-- breadcrumbs -->
  <?php echo $this->load->view('breadcrumbs');?>
<!-- //breadcrumbs-->
<!---728x90-->
<!-- checkout -->
  <div class="checkout">
    <div class="container" id="cartid">
      <div class="checkout-right  slideInUp" data-wow-delay=".5s">
	   <?php if($this->cart->total_items() > 0):?>
        <table class="timetable_sub">
          <thead>
            <tr>
              <th>SL No.</th> 
              <th>Product</th>
              <th>Quantity</th>
              <th>Product Name</th>
              <th>Size</th>
              <th>Unit Price</th>
              <th>Cart Total</th>
              <th>Remove</th>
            </tr>
          </thead>
          
        <?php $i=1; $gtotal = 0; $gshipping = 0; foreach ($this->cart->contents() as $items):?>
          <tr class="rem<?php echo $i;?>">
            <td class="invert"><?php echo $i;?></td>

            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
              <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                <?php if($option_name=='image'):?>
                     <td class="invert-image"><a href="<?php echo site_url();?>products/product_view/<?php echo $items['id'];?>"><img src="<?php echo site_url();?>images/products/<?php echo $option_value; ?>" alt=" " style="width:100px;height: 100px;"/></a></td>
                <?php endif;?>
              <?php endforeach;?>
            <?php endif;?>

            <td class="invert">
               <div class="quantity">
                <div class="quantity-select">
                  <div class="entry value-minus3">&nbsp;</div>
                  <div class="entry value3" id="qty<?php echo $i; ?>"><span><?php echo $items['qty']; ?></span></div>
                  <div class="entry value-plus3">&nbsp;</div>
                  <a class="btn btn-info btn-xs clkk" href="#" onclick="changeqty('<?php echo $items['rowid']; ?>','<?php echo $i; ?>');">update</a>				  
                </div>
               </div>
            </td>

            <td class="invert"><?php echo stripcslashes($items['name']); ?></td>
            
            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
              <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?> 
                  <?php if($option_name=='size'){ ?>
                      <td class="invert"><?php echo $option_value;?></td>
                  <?php }?>
              <?php endforeach; ?>
            <?php endif; ?>


            <td class="invert">₹<?php echo number_format(ceil($items['price']),2); ?></td>
            <td class="invert">
                <?php if($this->cart->has_options($items['rowid']) == TRUE):?>
                  <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value):?> 
                    <?php if($option_name=='shipping'):?>
                        <?php $shipping =  ceil($option_value * $items['qty']);?>
                    <?php else:?>
                       <?php $shipping  = 0; ?>
                    <?php endif;
                 endforeach;
              endif;?>
              <?php $tot =  ceil($items['subtotal'] + $shipping);?>
              ₹<?php echo number_format($tot,2); ?><br>
              <?php if($shipping != 0 || $shipping != ""):?>
              <span style="color: green; font-size: 10px;"><b>(Including Shipping)<b></span><br>
              <span style="color: red; font-size: 10px;"><b>(Shipping per product: ₹<?php echo $option_value;?>)<b></span>
              <?php else:?>
              <span style="color: green; font-size: 10px;"><b>(Shipping : Free)<b></span><br>
              <?php endif;?>
            </td>

            <td class="invert">
              <div class="rem">
                <div id="ccr1" class="close<?php echo $i;?>"> </div>
              </div>
              <script>
                $(document).ready(function(c)
                {
                  $('.close<?php echo $i;?>').on('click', function(c)
                  {
                    var valu = '<?php echo $items['rowid'];?>';
                    jQuery.ajax({
                       type: "POST", url: '<?php echo site_url();?>cart/deletecart', data: "valu="+valu,
                       complete: function(data)
                       {
                         var op = data.responseText.trim();
                         $("#pricee").html(op);
                         $('.rem<?php echo $i;?>').fadeOut('slow', function(c)
                          {
                            $('.rem<?php echo $i;?>').remove();
							              $("#ccr1").notify("Deleted","error", { position:"right" });
                          });
                       }
                   });
                  });
                });
               </script>
            </td>
          </tr>
          <?php $gtotal = $gtotal + $tot;?><?php $gshipping = $gshipping + $shipping;?>
        <?php $i++;endforeach;?>
          <!--quantity-->
            <script>
            $('.value-plus3').on('click', function(){
              var divUpd = $(this).parent().find('.value3'),
              newVal = parseInt(divUpd.text(), 10)+1;
              divUpd.text(newVal);
            });

            $('.value-minus3').on('click', function(){
              var divUpd = $(this).parent().find('.value3'), newVal = parseInt(divUpd.text(), 10)-1;
              if(newVal>=1) divUpd.text(newVal);
            });
            </script>
          <!--quantity-->
        </table>
		<?php else:?>
		    <div style="margin-top:20px;" class="alert-danger">Cart is empty.Add products to cart.<a class="btn btn-info btn-xs" href="<?php echo site_url();?>products">Add</a></div>
		<?php endif;?>
      </div>
      <div class="checkout-left">
        <div class="checkout-left-basket  slideInLeft" data-wow-delay=".5s">
          <h4 style="font-size:22px"><a href="<?php echo site_url();?>checkout/payment">Make Payment</a></h4>
          <ul id="pricee">
            <li>Total <i>-</i><span>₹<?php echo number_format(($gtotal - $gshipping),2);?>/-</span></li>
            <li>Total Shipping <i>-</i><span>₹<?php echo number_format($gshipping,2);?>/-</span></li>
            <li>Grand Total <i>-</i> <span>&nbsp;&nbsp;&nbsp;₹<?php echo number_format($gtotal,2);?>/-<br><span style="color:green; font-size: 8px;">(Inclusive of all taxes)</span></span></li>
          </ul>
        </div>
        <div class="checkout-right-basket  slideInRight" data-wow-delay=".5s">
          <a href="<?php echo site_url();?>products"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <?php
      $newdata = array(
          'gtotal'        => $gtotal,
          'gshipping'     => $gshipping
        );
      $this->session->set_userdata($newdata);
  ?>
<!-- //checkout -->
<!-- footer -->
  <?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>