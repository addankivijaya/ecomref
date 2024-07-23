<!--<div class="w3-content w3-section" style="max-width:100%">
    <?php foreach($sliders as $key => $value):?>
        <img class="mySlides w3-animate-fading" src="<?php echo site_url();?>images/sliders/<?php echo stripcslashes($value['image']);?>" style="width:100%">
    <?php endforeach;?>
 </div>-->




<div class="container-fluid">
 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php echo $indicators;?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php echo $slides;?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
