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
        <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li class="active"><?php echo $bread_data['title'];?></li>
      </ol>
    </div>
  </div>
<!-- //breadcrumbs -->
<!---728x90--->
<!--typography-page -->
  <div class="" style="padding: 20px 0 20px 0">
    <div class="container">
            <h2 class="animated wow zoomIn" data-wow-delay=".5s" align="center"><?php echo (stripslashes(str_replace('\n','',$datas['name']))); ?></h2><br>
            <?php echo (stripcslashes(str_replace('\n','',$datas['content']))); ?>
        </div>
  </div>
<!-- //typography-page -->
<!-- footer -->
  <?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>