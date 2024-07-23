
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
				<li class="active">Login</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!---728x90--->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="" data-wow-delay=".5s">Login Form</h3>
			<!--<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.</p>-->
			<div class="login-form-grids  slideInUp" data-wow-delay=".5s">
		    <?php if($this->session->flashdata('msg_succ') != ''){ ?>
                <div class="alert alert-block alert-success checkout-empty">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="ace-icon fa fa-times"></i>
                    </button>
                    <p><b><?php echo $this->session->flashdata('msg_succ')?$this->session->flashdata('msg_succ'):'';?></b></p>
                </div>
            <?php } ?>

            <?php if($this->session->flashdata('msg_fail_order') != ''){ ?>
                <div class="alert alert-block alert-danger checkout-empty">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="ace-icon fa fa-times"></i>
                    </button>
                    <p><b><?php echo $this->session->flashdata('msg_fail_order')?$this->session->flashdata('msg_fail_order'):'';?></b></p>
                </div>
            <?php } ?>
            <h4>For Guest User &nbsp;&nbsp;<a class="btn btn-info btn-xs" href="<?php echo site_url();?>login/guest">Click Here</a></h4>

				<form method="post" action="<?php echo site_url('login');?>">
					<input type="text" placeholder="Email" name="remail" value="<?php echo $this->input->post('remail');?>" ><?php echo form_error('remail');?>
					<input type="password" name="rpassword" value="<?php echo $this->input->post('rpassword');?>" placeholder="password"><?php echo form_error('rpassword');?>
					<div class="forgot">
						<a href="<?php echo site_url();?>forgotpassword/reset_password">Forgot Password?</a>
					</div>
					<input type="submit" name="submit" value="Login">
				</form>
			</div>
			<h4 class="" data-wow-delay=".5s">For New People</h4>
			<p class=" slideInUp" data-wow-delay=".5s"><a href="<?php echo site_url();?>register">Register Here</a> (Or) go back to <a href="<?php echo site_url();?>home">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
<!-- footer -->
	<?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>