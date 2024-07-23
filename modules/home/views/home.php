<!DOCTYPE html>
<html>
<!--// head starts -->
    <?php echo $this->load->view('head');?>
<!-- // head ends-->
  
<body>
<!-- header -->
  <?php echo $this->load->view('header');?>
<!-- //header -->

<!-- banner -->
<?php echo $this->load->view('sliders');?>
<!-- //End banner -->

<!---728x90--->
<!-- banner-bottom -->
  <?php// echo $this->load->view('banners');?>
<!-- //banner-bottom -->
<!-- Recommended collections -->
   <?php echo $this->load->view('rec_products');?>
<!-- //End Recommendedcollections -->

<div class="col-md-12" style="border-bottom:5px solid #fff">
   
  <img src="<?php echo site_url();?>images/ad.jpg" class="img-responsive"/>
</div>

<!-- //Quick Enquiry -->
<?php// echo $this->load->view('quick_enquiry');?>
<!--//end Quick Enquiry -->

<!-- //clients -->
  <?php //echo $this->load->view('clients');?>
<!--//end clients -->
<!-- footer -->
  <?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
<script src="<?php echo site_url();?>js/script.js"></script>
<script>
  $(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});
</script>
</html>