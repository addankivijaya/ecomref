<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>

<body>
	<!-- header -->
	<?php echo $this->load->view('header');?>
	<!-- //header -->
	<!-- breadcrumbs -->
	<?php echo $this->load->view('breadcrumbs');?>
	<!-- //breadcrumbs -->

	<div class="">
		<div class="">
			<div class="register">
				<?php if($this->session->flashdata('msg_succ') != ''){ ?>
				<div class="alert alert-block alert-success checkout-empty col-md-5" style="margin-left:400px;margin-top:20px;">
					<button type="button" class="close" data-dismiss="alert">
				  <i class="ace-icon fa fa-times"></i>
				</button>
					<p><b><?php echo $this->session->flashdata('msg_succ')?$this->session->flashdata('msg_succ'):'';?></b></p>
				</div>
				<?php } ?>
				<div class="col-md-8">
					<div class="container">
						<div class="login-form-grids" style="margin: 2px 0 0 0; width:70%">
							<h5 class=" slideInUp" data-wow-delay=".5s">profile information</h5>
							<div class="">
								<form method="post" action="<?php echo site_url('checkout/payment');?>" class=" slideInUp" data-wow-delay=".5s" style="width: 100%">
									<div class="col-md-6">
										<input class="form-control" type="text" placeholder="Name" name="dname" value="<?php echo stripcslashes($record['fname']);?>">
										<?php echo form_error('dname');?><br>
										<input class="form-control" type="text" placeholder="State" name="dstate" value="<?php echo set_value('dstate');?>">
										<?php echo form_error('dstate');?><br>
										<input class="form-control" type="text" placeholder="Town/Locality" name="dlocality" value="<?php echo set_value('dlocality');?>">
										<?php echo form_error('dlocality');?><br>
									</div>
									<div class="col-md-5 col-md-offset-1">
										<input class="form-control" type="text" name="dmobile" placeholder="Moblie Number" value="<?php echo stripcslashes($record['mobile']);?>">
										<?php echo form_error('dmobile');?><br>
										<input class="form-control" type="text" name="dcity" placeholder="City/District" value="<?php echo set_value('dcity');?>">
										<?php echo form_error('dcity');?><br>
										<input class="form-control" type="text" name="dzipcode" placeholder="Zip Code" value="<?php echo set_value('dzipcode');?>">
										<?php echo form_error('dzipcode');?><br>
										<br>
									</div>
									<div class="col-md-12">
										<div class="col-md-6">
											<textarea class="form-control" name="daddress" rows="4" placeholder="address" style="width:350px"><?php echo set_value('daddress');?></textarea>
                                            <?php echo form_error('daddress');?>
										</div>
										<div class="col-md-1"></div>
										<div class="col-md-5">
											<input class="form-control" type="text" placeholder="Email" name="demail" value="<?php echo stripcslashes($record['email']);?>">
											<?php echo form_error('demail');?>
											<input type="submit" name="submit" value="Process">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="">
					<div class="container"><br>
						<div class="checkout-left-basket  slideInLeft" data-wow-delay=".5s" style="float: right;padding-top: 20px">
							<h4 style="background-color: #337AB7">
								Cart Summary</h4>
							<ul id="pricee">
					            <li>Total <i>-</i><span>₹<?php echo number_format(($this->session->userdata('gtotal') - $this->session->userdata('gshipping')),2);?>/-</span></li>
					            <li>Total Shipping <i>-</i><span>₹<?php echo number_format($this->session->userdata('gshipping'),2);?>/-</span></li>
					            <li>Grand Total <i>-</i> <span>₹<?php echo number_format($this->session->userdata('gtotal'),2);?>/-</span></li>
					          </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><br>
	<!-- //register -->
	<!-- footer -->
	<?php echo $this->load->view('footer');?>
	<!-- //footer -->
</body>

</html>
