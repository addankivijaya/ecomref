
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
        <li class="active">Forget Password</li>
      </ol>
    </div>
  </div>
<!-- //breadcrumbs -->
<!---728x90--->
<!-- login -->
  <div class="login">
    <div class="container">
      <h3 class="animated wow zoomIn" data-wow-delay=".5s">Forget Password</h3>
      <?php /*<<p class="est animated wow zoomIn" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum.</p>*/?>

      <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
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
        <form method="post" action="<?php echo site_url('forgotpassword/reset_password');?>">
          <input type="text" placeholder="Email" name="remail" value="<?php echo $this->input->post('remail');?>" ><?php echo form_error('remail');?>
          <input type="submit" name="fp" value="Submit">
        </form>
      </div>
    </div>
  </div>
  <?php echo $this->load->view('footer');?>
</body>
</html>