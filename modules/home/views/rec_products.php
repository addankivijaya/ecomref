<style>
.box {
   width:200px;height:300px;
   position:relative;
   border:1px solid #BBB;
   background:#eee;
   float:left;
   margin:20px
}
.ribbon {
   position: absolute;
   right:50px; 
    top: -340px;
   z-index: 1;
   
   width: 75px; height: 75px; 
   text-align: right;
}
.ribbon span {
   font-size: 12px;
   color: #fff; 
   text-transform: uppercase; 
   text-align: center;
   font-weight: bold; line-height: 20px;
   
   width: 51px; display: block;
   background: #79A70A;
   background: linear-gradient(#9BC90D 0%, #79A70A 100%);
   
   position: absolute;
   top: 7px; right: -30px;
     border-radius: 105px;
    height: 50px;
    
    padding: 5px;
}
.red span {background: linear-gradient(#F70505 0%, #8F0808 100%);}
.red span::before {border-left-color: #8F0808; border-top-color: #8F0808;}
.red span::after {border-right-color: #8F0808; border-top-color: #8F0808;}

.blue span {background: linear-gradient(#2989d8 0%, #1e5799 100%);}
.blue span::before {border-left-color: #1e5799; border-top-color: #1e5799;}
.blue span::after {border-right-color: #1e5799; border-top-color: #1e5799;}


</style>

<br>
<div class="new-collections">
		<div style="padding-left:0px !important;padding-right:0px !important;"class="container">
			<h3 class="">Latest Products</h3>
			<div class="new-collections-grids">
				<?php if(count($products) > 0):foreach($products as $key => $value):?>
				<div class="col-md-3 col-xs-3 new-collections-grid">
					<div class="new-collections-grid1  slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>" class="product-image"><img class="img-responsive"src="<?php echo site_url();?>images/products/<?php echo $value['image1'];?>" alt="bracedeal" style="width:230px;height:320px;border:1px solid #D1CFCF;"  /></a>
                            <div class="col-md-3">
                            <?php 
                            /** Discount Amount= Marked Price - Selling Price
                            Discount% = Discount Amount/Marked Price × 100%.**/
					        $diff       = ceil($value['price'] - $value['dprice']);
                            $percentage = ceil(($diff/$value['price'])* 100);
						    ?>
                            	<div class="ribbon"><span ><?php echo $percentage;?>&nbsp;% OFF</span></div>
                            </div>
							<!--<div class="new-collections-grid1-image-pos">
							    
								<a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>">Quick View</a>
							</div>-->
						</div>
						<div class="col-md-12"><h5 style="font-size:16px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; "><a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>"><?php echo stripcslashes($value['title']);?></a></h5></div>
                    <div class="col-md-12" >
						
					    <?php if($value['shipping'] == "" || $value['shipping'] == "0"):?>
					    <p style="font-size:13px;background-color:#9FB811;color:#fff;border-radius:10px;padding:5px 5px 5px 4px;text-align:center">Shipping:Free</p>
					    <?php else:?>
					    <p style="font-size:13px;background-color:#9FB811;color:#fff;border-radius:10px;padding:5px 5px 5px 4px;text-align:center" >Shipping:₹<?php echo $value['shipping'];?></p>
					    <?php endif;?>

						
						
						
						</div>
                             
						<?php 
                            /** Discount Amount= Marked Price - Selling Price
                            Discount% = Discount Amount/Marked Price × 100%.**/
					        $diff       = ceil($value['price'] - $value['dprice']);
                            $percentage = ceil(($diff/$value['price'])* 100);
						?>
                        <div class="col-md-12">
                            <p id="iid<?php echo $value['id']; ?>"></p>
                        	<!--<span style="font-size:14.5px;color:red;">
                        		<?php if(($value['price'] !="" && $value['price'] !="0") && ($value['dprice'] !="" && $value['dprice'] !="0")):?>
                        	        (<?php echo $percentage;?>% OFF)
                        	    <?php endif;?>
                            </span>-->
                        </div><br>
						<?php if($value['available']=="In Stock"):?>
						<div class="col-md-8 new-collections-grid1-left">
							<p><i>₹<?php echo stripcslashes($value['price']);?></i> <span id="original_price_id<?php echo $value['id']; ?>">₹<?php echo stripcslashes($value['dprice']);?></span><br>
							<a href="" id="changeme<?php echo $value['id'];?>" onclick="addcart('<?php echo $value['id']; ?>')">add to cart </a></p>
					    </div>
				        <p style="margin-top:70px;font-size:11px;">Select Size</p>
						<?php $sz = explode(',',$value['sizes']);?>
							<select style="width:28%!important;" name="size" id="idsz<?php echo $value['id']; ?>" class="form-control" required onchange = remove_effect('<?php echo $value["id"];?>')>  
                                <option value="0">----</option>
								<?php foreach($sz as $s):?>
								    <option value="<?php echo $s;?>"><?php echo $s;?></option>
								<?php endforeach;?>
  				            </select>
						<?php endif;?>
						<?php if($value['available']=="Out Stock"):?>
						
						<div class="new-collections-grid1-left">
							
							<p style="padding-bottom:8px"> <span id="original_price_id<?php echo $value['id']; ?>"><i>₹<?php echo stripcslashes($value['price']);?></i>&nbsp;&nbsp;₹<?php echo stripcslashes($value['dprice']);?></span><br><a style="background-color:#4b8c80;" href="javascript:;">Out of Stock</a></p>
						</div>
						<?php endif;?>
                    </div>
				</div>
			    <?php endforeach;endif;?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>