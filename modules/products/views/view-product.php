<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>
	<style>
	
/* carousel */
.media-carousel 
{
  margin-bottom: 0;
  padding: 0 40px 30px 40px;
  margin-top: 30px;
}
/* Previous button  */
.media-carousel .carousel-control.left 
{
  left: -12px;
  background-image: none;
  background: none repeat scroll 0 0 #222222;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 30px
}
/* Next button  */
.media-carousel .carousel-control.right 
{
  right: -12px !important;
  background-image: none;
  background: none repeat scroll 0 0 #222222;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 30px
}
/* Changes the position of the indicators */
.media-carousel .carousel-indicators 
{
  right: 50%;
  top: auto;
  bottom: 0px;
  margin-right: -19px;
}
/* Changes the colour of the indicators */
.media-carousel .carousel-indicators li 
{
  background: #c0c0c0;
}
.media-carousel .carousel-indicators .active 
{
  background: #333333;
}
.media-carousel img
{
  width: 250px;
  height: 100px
}
/* End carousel */	
</style>
<body>
<!-- header -->
<?php echo $this->load->view('header');?>
<!-- //header -->
<!-- breadcrumbs -->
 <?php echo $this->load->view('breadcrumbs');?>
<!-- //breadcrumbs -->

  <div class="single">
    <div style="padding-left:0px !important;padding-right:0px !important;"class="container">
        
      <!--<div class="col-md-3 products-left">
        <div class="categories  slideInUp" data-wow-delay=".5s">
      <?php /*<div class="panel-group" id="accordion">
                
        <?php foreach($sub_menu as $key1 => $value1):?>
        <h3 style="font-size:18px;"><?php echo stripslashes($value1['cname']); ?></h3>
        <?php foreach($value1['s1menu'] as $key2 => $value2):?>
        <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $key2;?>"><span class="glyphicon glyphicon-plus">
                            </span><?php echo stripslashes($value2['sname']); ?></a>
                        </h4>
                    </div>
                    <div id="collapseOne<?php echo $key2;?>" class="panel-collapse collapse <?php if($key2 == 0):?> in <?php endif;?>">
                        <div class="panel-body">
                            <table class="table">
              <?php foreach($value2['c1menu'] as $key3 => $value3):?> 
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-ok text-primary" style="color:#4CAF50"></span>
                                        <a href="<?php echo site_url();?>products/prouct_by_childcategory/<?php echo $value1['cid'];?>/<?php echo $value2['sid'];?>/<?php echo $value3['chid'];?>" style="color:#303030"><?php echo stripcslashes($value3['chname']);?></a>
                                    </td>
                                </tr>
              <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
        <?php endforeach;?>
        <?php endforeach;?>
        
            </div>*/?>
            <div>
            
            </div>
        </div>
        <div class="men-position  slideInUp" data-wow-delay=".5s">
          <!--<a href="single.html"><img src="<?php echo site_url();?>images/27.jpg" alt=" " class="img-responsive" /></a>
          <div class="men-position-pos">
            <h4>New collection</h4>
            <h5><span>55%</span> Flat Discount</h5>
          </div>
        </div>-->
      </div>


      <div class="col-md-8 single-right" style="padding-left:50px">
        <div class="col-md-5 single-right-left  slideInUp" data-wow-delay=".5s">
          <div class="flexslider">
            <ul class="slides">
              <?php if($product_view['image1']=="0" || $product_view['image1']==""):?>
                <li data-thumb="<?php echo site_url();?>images/noimage.jpg">
                  <div class="thumb-image"> <img src="<?php echo site_url();?>images/noimage.jpg" data-imagezoom="true" class="img-responsive"> </div>
                </li>
              <?php else:?> 
              <li data-thumb="<?php echo site_url();?>images/products/<?php echo $product_view['image1'];?>">
                <div class="thumb-image"> <img src="<?php echo site_url();?>images/products/<?php echo $product_view['image1'];?>" data-imagezoom="true" class="img-responsive"> </div>
              </li>
              <?php endif;?>


              <?php if($product_view['image3']=="0" || $product_view['image3']==""):?>
                <li data-thumb="<?php echo site_url();?>images/noimage.jpg">
                  <div class="thumb-image"> <img src="<?php echo site_url();?>images/noimage.jpg" data-imagezoom="true" class="img-responsive"> </div>
                </li>
              <?php else:?> 
              <li data-thumb="<?php echo site_url();?>images/products/<?php echo $product_view['image3'];?>">
                <div class="thumb-image"> <img src="<?php echo site_url();?>images/products/<?php echo $product_view['image3'];?>" data-imagezoom="true" class="img-responsive"> </div>
              </li>
              <?php endif;?>
            </ul>
          </div>

          <!-- flixslider -->
            <script defer src="<?php echo site_url();?>js/jquery.flexslider.js"></script>
            <link rel="stylesheet" href="<?php echo site_url();?>css/flexslider.css" type="text/css" media="screen" />
            <script>
            $(window).load(function() {
              $('.flexslider').flexslider({
              animation: "slide",
              controlNav: "thumbnails"
              });
            });
            </script>
        </div>


        <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s" style="padding-left:12px;">
          <h3><?php echo stripcslashes($product_view['title']);?></h3>
          
          <h4><strike><i style="color:#d4d4d6">₹<?php echo stripcslashes($product_view['price']);?></i></strike> 
            <span class="item_price">₹<?php echo stripcslashes($product_view['dprice']);?></span>

                          <?php 
                            /** Discount Amount= Marked Price - Selling Price
                            Discount% = Discount Amount/Marked Price × 100%.**/
                            $diff       = ceil($product_view['price'] - $product_view['dprice']);
                            $percentage = ceil(($diff/$product_view['price'])* 100);
                          ?>
                            <?php if(($product_view['price'] !="" && $product_view['price'] !="0") && ($product_view['dprice'] !="" && $product_view['dprice'] !="0")):?>
                                  (<?php echo $percentage;?>% OFF)
                            <?php endif;?>
            <?php if($product_view['shipping'] == "" || $product_view['shipping'] == "0"):?>
              <p style="font-size:14px;color:red;border-radius:10px;padding:5px 5px 5px 4px;"><b>Shipping:Free</b></p>
              <?php else:?>
              <p style="font-size:14px;color:red;border-radius:10px;padding:5px 5px 5px 4px;"><b>Shipping:₹<?php echo $product_view['shipping'];?></b></p>
            <?php endif;?>

            <?php if($product_view['stock_left'] == "" || $product_view['stock_left'] == "0"):?>
              <?php else:?>
              <p style="font-size:14px;color:green;border-radius:10px;padding:5px 5px 5px 4px;"><b>Only <?php echo $product_view['stock_left'];?> left hurry!</b></p>
            <?php endif;?>

          </h4>

			<div class="col-md-12">
				<p id="iidu<?php echo $product_view['id']; ?>"></p>
				<div class="col-md-6">
					 
				<p style="font-size:11px;">Select Size</p>
        <?php $sz = explode(',',$product_view['sizes']);?>
          <select style="width:50%!important;" name="size" id="idszu<?php echo $product_view['id']; ?>" class="form-control" required>  
                  <option value="0">----</option>
              <?php foreach($sz as $s):?>
                  <option value="<?php echo $s;?>"><?php echo $s;?></option>
              <?php endforeach;?>
            </select><br><br>
				</div>


				<div class="col-md-6">
					<p style="font-size:11px;">Select Quantity</p>
          <div class="quantity">
                <div class="quantity-select">
                  <div class="entry value-minus1">&nbsp;</div>
                  <div class="entry value1" id="qty<?php echo $product_view['id']; ?>"><span>1</span></div>
                  <div class="entry value-plus1">&nbsp;</div>				  
                </div>
          </div>
			  </div>
    </div>
			<?php if($product_view['available']=="In Stock"):?>
              <div class="col-md-12" style="padding-bottom:20px">
                <div class="col-md-5 col-md-offset-2">
					        <div class="occasion-cart">
						        <a class="item_add" href="#" id="changemeu<?php echo $product_view['id'];?>" onclick="addtocart('<?php echo $product_view['id'];?>')">add to cart </a> 
					        </div>
                </div>
              </div>
            <?php endif;?>
			
          <?php /*<div class="description" >
            <h5><i>Description</i></h5>
            <p><?php echo stripcslashes($product_view['content']);?></p>
          </div>*/?>
						
          <div class="color-quality">
            <!--quantity-->
            <script>
            $('.value-plus1').on('click', function(){
              var divUpd = $(this).parent().find('.value1'),
              newVal = parseInt(divUpd.text(), 10)+1;
              divUpd.text(newVal);
            });

            $('.value-minus1').on('click', function(){
              var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
              if(newVal>=1) divUpd.text(newVal);
            });
            </script>
          <!--quantity-->
            <div class="clearfix"> </div>
          </div>
          
        </div>
        <div class="clearfix"> </div>
        <div class="bootstrap-tab  slideInUp" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Check Size</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<?php echo stripcslashes($product_view['content']);?>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
                  <?php if($product_view['image2']!="0" && $product_view['image2']!=""):?>
										<img style="width: 400px;height: 250px;" src="<?php echo site_url();?>images/products/<?php echo $product_view['image2'];?>"/>
                  <?php endif;?>

                  <?php if($product_view['image2']=="0" || $product_view['image2']==""):?>
										<img src="<?php echo site_url();?>images/noimage.jpg"/>
                  <?php endif;?>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
								<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
								<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
							</div>
						</div>
					</div>
				</div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div><br>
<!-- single-related-products -->
  <div class="single-related-products">
    <div class="container">
      <h3 >Related Products</h3>
      <!--<p class="est animated wow slideInUp" data-wow-delay=".5s">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
        deserunt mollit anim id est laborum.</p>-->
    <div class="new-collections-grids">

      <?php if(count($related_products) > 0):foreach($related_products as $key => $value):?>
        <div class="col-md-3 new-collections-grid">
          <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
            <div class="new-collections-grid1-image">
              <a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>" class="product-image"><img src="<?php echo site_url();?>images/products/<?php echo $value['image1'];?>" alt="bracedeal" style="width:230px;height:320px;" /></a>
              <div class="new-collections-grid1-image-pos">
                  
              <!--  <a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>">Quick View</a>-->
              </div>
            </div>
            <div class="col-md-12"><h5 style="font-size:16px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; "><a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>"><?php echo stripcslashes($value['title']);?></a></h5></div>
                    <div class="col-md-12" >
            <div class="col-md-6">
              <?php if($value['shipping'] == "" || $value['shipping'] == "0"):?>
              <p style="font-size:11px;background-color:#EAECEA;color:red;border-radius:10px;padding:5px 5px 5px 4px;">Shipping:Free</p>
              <?php else:?>
              <p style="font-size:11px;background-color:#EAECEA;color:red;border-radius:10px;padding:5px 5px 5px 4px;">Shipping:₹<?php echo $value['shipping'];?></p>
              <?php endif;?>
            </div>
            <div class="col-md-6">
              <p id="iid<?php echo $value['id']; ?>"></p>
            </div>
            
            </div><br>
            <?php if($value['available']=="In Stock"):?>
            <div class="col-md-8 new-collections-grid1-left">
              <p><i>₹<?php echo stripcslashes($value['price']);?></i> <span id="original_price_id<?php echo $value['id']; ?>">₹<?php echo stripcslashes($value['dprice']);?></span><br>
              <a href="" id="changeme<?php echo $value['id'];?>" onclick="addcart('<?php echo $value['id']; ?>')">add to cart </a></p>
              </div>
                <p style="margin-top:70px;font-size:11px;">Select Size</p>
            <?php $sz = explode(',',$value['sizes']);?>
              <select style="width:28%!important;" name="size" id="idsz<?php echo $value['id']; ?>" class="form-control" required>  
                                <option value="0">----</option>
                <?php foreach($sz as $s):?>
                    <option value="<?php echo $s;?>"><?php echo $s;?></option>
                <?php endforeach;?>
                      </select>
            <?php endif;?>
            <?php if($value['available']=="Out Stock"):?>
            
            <div class="new-collections-grid1-left">
              <p style="padding-bottom:8px"> <span id="original_price_id<?php echo $value['id']; ?>"><i>₹<?php echo stripcslashes($value['price']);?></i>&nbsp;&nbsp;₹<?php echo stripcslashes($value['dprice']);?></span><br><a style="background-color:#4b8c80;"href="javascript:;">Out of Stock</a></p>
            </div>
            <?php endif;?>
          </div>
        </div>
          <?php endforeach;endif;?>
    </div>
    </div>
  </div>
<!-- //single-related-products -->
<!-- footer -->
<?php echo $this->load->view('footer');?>
<!-- //footer -->
<!-- zooming-effect -->
	<script>
	$(document).ready(function() {
  $('#media').carousel({
    pause: true,
    interval: false,
  });
});
	
	</script>
  <script src="<?php echo site_url();?>js/imagezoom.js"></script>
<!-- //zooming-effect -->
</body>
</html>