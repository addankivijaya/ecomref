
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
        <li class="active">Track Order</li>
      </ol>
    </div>
  </div>
<!-- //breadcrumbs -->
<?php if(count($orderstatus) == 0):?>
  <div class="login">
    <div class="container">
      <h3 class="animated wow zoomIn" data-wow-delay=".5s">Track Your Order</h3>
      <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
        <form method="post" action="<?php echo site_url('home/trackorder');?>">
          <input type="text" placeholder="Entter Order Id" name="orderid" value="<?php echo $this->input->post('remail');?>" >
          <input type="submit" name="submit" value="submit">
        </form>
      </div>
    </div>
  </div>
<?php endif;?>

  <?php if(count($orderstatus) != 0):?>
  <div style="margin-left: 250px;margin-top: 100px;">
    <?php if($orderstatus['status'] == 1) { ?>
        <div><h2>Hi <?php echo $orderstatus['dname'];?>, Your order has been confirmed. Thank you...!</h2></div>
            <?php } else if($orderstatus['status'] == 2){ ?>
        <div><h2>Hi <?php echo $orderstatus['dname'];?>, Your order is under process and ready to dispatch. Thank you...!</h2></div>
            <?php } else if($orderstatus['status'] == 3){ ?>
        <div><h2>Hi <?php echo $orderstatus['dname'];?>, Your order has been dispatched successfully.Thank you...!</h2></div>
            <?php } else if($orderstatus['status'] == 4){ ?>
        <div><h2>Hi <?php echo $orderstatus['dname'];?>, Your order has been delivered successfully.If it not delivered then write email to info@bracedeal.com .Thank you...!</h2></div>
            <?php } else{?> 
        <div><h2>No Records Found...Please Try Again..</h2></div>
    <?php } ?>
  </div><br><br><br><br><br><br><br>
  <?php endif;?>
<!-- footer -->
  <?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>