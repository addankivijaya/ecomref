
<!-- PRODUCT-OFFER -->
<div class="product_wrap">
  <div class="container">
    <div class="row">
    <div class="span3"></div>
      <div class="span6">
        <div id="check-accordion">
          <h1>Reset Password</h1>
          <div class="clearfix">
            
            <div class="span6 cheakout cheakout-box clearfix register">
              <?php if($this->session->flashdata('msg_succ') != ''){ ?>
                        <div class="alert alert-block alert-success">
                          <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                          </button>
                          <p><?php echo $this->session->flashdata('msg_succ')?$this->session->flashdata('msg_succ'):'';?></p>
                        </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('msg_fail') != ''){ ?>
                        <div class="alert alert-block alert-danger">
                        <button type="button" class="close" data-dismiss="alert">
                          <i class="ace-icon fa fa-times"></i>
                        </button>
                            <p><?php echo $this->session->flashdata('msg_fail')?$this->session->flashdata('msg_fail'):'';?></p>
                        </div>
                    <?php } ?>

              <form class="clearfix" method="post" name="new_password" id="login">
                  <div class="col-md-12">
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password" value="<?php echo $this->input->post('password');?>" />
                  </div><?php echo form_error('password');?>
                  <div class="col-md-12">
                    <label>Confirm Password </label>
                    <input type="password" name="confirm_password" value="<?php echo $this->input->post('confirm_password');?>" placeholder="confirm password" />
                  </div><?php echo form_error('confirm_password');?>
                  <input type="submit" name="submit" value="submit">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="span3"></div>
    </div>
  </div>
</div>
<!-- PRODUCT-OFFER -->
