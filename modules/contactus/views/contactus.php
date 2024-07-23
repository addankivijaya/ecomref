<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>
<body>
<!-- header -->
	<?php echo $this->load->view('header');?>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo site_url();?>home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Mail Us</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!---728x90--->
<!-- mail -->
	<div class="mail animated wow zoomIn" data-wow-delay=".5s">
		<div class="container">
			<h3>Mail Us</h3>
			<!--<p class="est">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>-->
			<div class="mail-grids">

				<?php if($this->session->flashdata('msg_succ') != ''){ ?>
		                <div class="alert alert-block alert-success col-md-7">
		                    <button type="button" class="close" data-dismiss="alert">
		                      <i class="ace-icon fa fa-times"></i>
		                    </button>
		                    <p><b><?php echo $this->session->flashdata('msg_succ')?$this->session->flashdata('msg_succ'):'';?></b></p>
		                </div>
		            <?php } ?>

		            <?php if($this->session->flashdata('msg_fail_order') != ''){ ?>
		                <div class="alert alert-block alert-danger col-md-7">
		                    <button type="button" class="close" data-dismiss="alert">
		                      <i class="ace-icon fa fa-times"></i>
		                    </button>
		                    <p><b><?php echo $this->session->flashdata('msg_fail_order')?$this->session->flashdata('msg_fail_order'):'';?></b></p>
		                </div>
		            <?php } ?>
				<div class="col-md-7 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s" style="padding-right: 20px">

					<form method="post" action="<?php echo site_url('contactus');?>">
						<input type="text" name="name"    value="<?php echo set_value("name");?>" placeholder="Enter Name"><?php echo form_error("name");?><br><br>
						<input type="text" name="email"  value="<?php echo set_value("email");?>"  placeholder="Enter Email"><?php echo form_error("email");?><br><br>
						<input type="text" name="subject"  value="<?php echo set_value("subject");?>"  placeholder="Enter Subject"><?php echo form_error("subject");?><br><br>
						<textarea name="message" placeholder="Enter some text"><?php echo set_value("message");?> </textarea><?php echo form_error("message");?>
						<input type="submit" name="contactme" value="Submit Now" >
					</form>
				</div>
				 <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="mail-grid-right1">
						<!--<h4 style="color: white"><?php echo stripcslashes($web_settings['admin_email']);?></h4>-->
						<ul class="phone-mail">
						<!--	<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone: <?php echo stripcslashes($web_settings['admin_mobile']);?></li>-->
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a href="mailto:<?php echo stripcslashes($web_settings['admin_email']);?>"><?php echo stripcslashes($web_settings['admin_email']);?></a></li>
						</ul>
					</div>
				</div>
			<div class="clearfix"> </div>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1902.7738857399495!2d78.42519114535862!3d17.48134600840983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91ad98431d8f%3A0xb880c8d6d9596ffe!2sPrashanth+Nagar%2C+Mythri+Nagar%2C+Kukatpally%2C+Hyderabad%2C+Telangana+500072!5e0!3m2!1sen!2sin!4v1518766728557"  frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div><br>
<!-- //mail -->
<!-- footer -->
	<?php echo $this->load->view('footer');?>
<!-- //footer -->
     <?php echo $this->load->view('scripts');?>
</body>
</html>