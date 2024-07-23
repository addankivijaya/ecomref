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
			<ol class="breadcrumb breadcrumb1  slideInLeft" data-wow-delay=".5s">
				<li><a href="<?php echo site_url();?>home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!---728x90--->
<!-- register -->
	<div class="register">
		<div class="container">
			<h3 class=" zoomIn" data-wow-delay=".5s">Register Here</h3>
			<!--<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->

			<div class="login-form-grids">
			<?php if($this->session->flashdata('msg_succ') != ''){ ?>
                <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="ace-icon fa fa-times"></i>
                    </button>
                    <p><b><?php echo $this->session->flashdata('msg_succ')?$this->session->flashdata('msg_succ'):'';?></b></p>
                </div>
            <?php } ?>

            <?php if($this->session->flashdata('msg_fail_order') != ''){ ?>
                <div class="alert alert-block alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="ace-icon fa fa-times"></i>
                    </button>
                    <p><b><?php echo $this->session->flashdata('msg_fail_order')?$this->session->flashdata('msg_fail_order'):'';?></b></p>
                </div>
            <?php } ?>
			<h5 class="slideInUp" data-wow-delay=".5s">profile information</h5>

		<?php /*if($this->uri->segment(2) != "guest"):?>
			<h4 class=" slideInUp" data-wow-delay=".5s">For Guest User &nbsp;&nbsp;<a class="btn btn-info btn-xs" href="<?php echo site_url();?>register/guest">SignUp</a></h4>
		<?php endif; */?>

			<?php if($this->uri->segment(2) == "guest"):?>
			<form class=" slideInUp" data-wow-delay=".5s" method="post" action="<?php echo site_url('register/guest');?>">
			<?php endif;?>
			<?php if($this->uri->segment(1) == "register"):?>
				<form class=" slideInUp" data-wow-delay=".5s" method="post" action="<?php echo site_url('register');?>">
			<?php endif;?>
				<?php if($this->uri->segment(2) != "guest"):?>
				<input type="text" name="rfname"    value="<?php echo set_value("rfname");?>"  placeholder="First Name..."><?php echo form_error('rfname');?>
				<input type="text" name="rlname"     value="<?php echo set_value("rlname");?>" placeholder="Last Name..." ><?php echo form_error('rlname');?>
				<?php endif;?>
				<input type="text" name="remail" value="<?php echo set_value("remail");?>" placeholder="Email..." ><?php echo form_error('remail');?><br>
				<input type="text" name="rmobile"    value="<?php echo set_value("rmobile");?>" placeholder="Mobile..." ><?php echo form_error('rmobile');?><br>
				<input type="password" name="rpassword"  value="<?php echo set_value("rpassword");?>" placeholder="Password..." ><?php echo form_error('rpassword');?><br>
				<?php if($this->uri->segment(2) != "guest"):?> 
				<input type="password" name="rcpassword" value="<?php echo set_value("rcpassword");?>" placeholder="Confirm Password..." ><?php echo form_error('rcpassword');?><br>
				<div class="register-check-box animated wow slideInUp" data-wow-delay=".5s">
					<div class="check">
						<label class="checkbox"><input type="checkbox" value="1" <?php echo set_checkbox('checkbox','1');?> name="checkbox"><i> </i>I accept the terms and conditions</label>
						<?php echo form_error('checkbox');?>
					</div>
				</div>
				<?php endif;?>
				<input type="submit" name="submit" value="Register">
			</form>
		
				<?php /*<h6 class="animated wow slideInUp" data-wow-delay=".5s">Login information</h6>
				<form class="animated wow slideInUp" data-wow-delay=".5s">
					<input type="email" placeholder="Email Address" required=" " >
					<input type="password" placeholder="Password" required=" " >
					<input type="password" placeholder="Password Confirmation" required=" " >
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>
					<input type="submit" value="Register">
				</form>*/?>
			</div>
		</div>
	</div><br>
<!-- //register -->
<!-- footer -->
	<?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>