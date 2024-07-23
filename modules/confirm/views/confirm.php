<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>
<body>
<?php echo $this->load->view('header');?>
<!-- //header -->
<!-- breadcrumbs -->
  <?php echo $this->load->view('breadcrumbs');?>
<!-- //breadcrumbs -->
<!-- register -->
  <div class="register">
	  <h3>Order Details</h3>
    <div class="container">
      <div class="login-form-grids" style="background-color: #cccccc;text-align: center;">
        <ul  class="paid" style="list-style-type: none;color:#337AB7">
          <li>Order Id <span style="padding-left: 30px">:</span><span style="padding-left: 30px"><?php echo stripslashes($record['order_id']); ?></span></li>
          <li>Amount<span style="padding-left: 30px">:</span><span style="padding-left: 30px">Rs.&nbsp;<?php echo stripslashes($record['total']); ?>/-</span></li>
          <li>Name<span style="padding-left: 30px">:</span><span style="padding-left: 30px"><?php echo stripslashes($record['dname']); ?></span></li>
          <li>Email<span style="padding-left: 30px">:</span><span style="padding-left: 30px"><?php echo stripslashes($record['demail']); ?></span></li>
          <li>Mobile<span style="padding-left: 30px">:</span><span style="padding-left: 30px"><?php echo stripslashes($record['dmobile']); ?></span></li>
          <li>Address<span style="padding-left: 30px">:</span><span style="padding-left: 30px"><?php echo stripslashes($record['dlocality']).',<br>'.stripslashes($record['dcity']).',<br>'.stripslashes($record['dstate']).',<br>'.stripslashes($record['dzipcode']).'<br>'.$record['daddress']; ?></span></li>

            <?php $addr  =  preg_replace('/[^a-zA-Z0-9\s]/','',$record['daddress']);
			?>
		  
		    <form method="post" action="<?php echo site_url();?>confirm/ebsPay">
			    <input name="channel"      type="hidden" size="60" value="0"/>
				<input name="account_id"   type="hidden" value="27014">
				<input name="reference_no" type="hidden" value="<?php echo stripslashes($record['order_id']); ?>"/>
				<input name="amount" type="hidden" value="<?php echo stripslashes($record['total']); ?>"/>
				<input name="currency" type="hidden" size="60" value="INR"/>
				<input name="description" type="hidden" value="bracedeal product information" />
				<input name="return_url" type="hidden" size="60" value="<?php echo site_url();?>confirm/success" />
				<input name="mode" type="hidden" size="60" value="LIVE"/>
				 
				<input name="name" type="hidden" maxlength="255" value="<?php echo stripslashes($record['dname']); ?>" />
				<input name="address" type="hidden" maxlength="255" value="<?php echo $addr;?>" />
				<input name="city" type="hidden" maxlength="255" value="<?php echo stripslashes($record['dcity']); ?>" />
				<input name="state" type="hidden" maxlength="255" value="<?php echo stripslashes($record['dstate']); ?>" />
				<input name="postal_code" type="hidden" maxlength="255" value="<?php echo stripslashes($record['dzipcode']); ?>" />
				<input name="country" type="hidden" maxlength="255" value="IND" />
				<input name="email"   type="hidden" size="60" value="<?php echo stripslashes($record['demail']); ?>" />
				<input name="phone" type="hidden" maxlength="255" value="<?php echo stripslashes($record['dmobile']); ?>" />
                <input name="submitted" value="Pay Now" class="btn btn-primary btn-md" type="submit">
		    </form>
			<a href="<?php echo site_url();?>confirm/cancelorder/<?php echo $record['id'];?>" class="btn btn-primary btn-md">Cancel</a>
        </ul>
      </div>
    </div>
  </div><br>
<!-- //register -->
<!-- footer -->
  <?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>