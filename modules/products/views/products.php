<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>
    <style>
	.glyphicon { margin-right:10px; }
	.panel-body { padding:0px; }
	.panel-body table tr td { padding-left: 15px }
	.panel-body .table {margin-bottom: 0px; }
        
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
   right:31px; 
    top: -239px;
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
<body>
<!-- header -->
	<?php echo $this->load->view('header');?>
<!-- //header -->
<!-- breadcrumbs -->
	<?php echo $this->load->view('breadcrumbs');?>

	<div class="products">
		<?php if($this->session->flashdata('msg_fail_order') != ''){ ?>
			<div class="alert alert-block alert-info  col-md-7" style="margin-left:500px;margin-top:20px;">
				<button type="button" class="close" data-dismiss="alert">
				  <i class="ace-icon fa fa-times"></i>
				</button>
				<p><b><?php echo $this->session->flashdata('msg_fail_order')?$this->session->flashdata('msg_fail_order'):'';?></b></p>
			</div>
         <?php } ?>

         <?php if($this->session->flashdata('msg_succ') != ''){ ?>
			<div class="alert alert-block alert-success  col-md-7" style="margin-left:500px;margin-top:20px;">
				<button type="button" class="close" data-dismiss="alert">
				  <i class="ace-icon fa fa-times"></i>
				</button>
				<p><b><?php echo $this->session->flashdata('msg_succ')?$this->session->flashdata('msg_succ'):'';?></b></p>
			</div>
         <?php } ?>

		<div class="container">
			<div class="col-md-3 products-left">
			<?php /*<div class="categories slideInUp" data-wow-delay=".5s">
			<div class="panel-group" id="accordion">
				<?php foreach($sub_menu as $key1 => $value1):?>
				<h3 style="font-size:18px;"><?php echo stripslashes($value1['cname']);?></h3>
				<?php foreach($value1['s1menu'] as $key2 => $value2):?>
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $value2['sid'];?>"><span class="glyphicon glyphicon-plus"></span><?php echo stripslashes($value2['sname']); ?></a>
                        </h4>
                    </div>

                    <div id="collapseOne<?php echo $value2['sid'];?>" class="panel-collapse collapse <?php if($key2 == 0):?> in <?php endif;?>">
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
            </div>
                    
				</div>*/?>
                <a href="<?php echo site_url();?>products/todayDeals"><img class="img-responsive"src="<?php echo site_url()?>images/change.jpg" class="img-responsive" style="padding-top:80px"></a>
				<div class="men-position slideInUp" data-wow-delay=".5s">
					<!--<a href="single.html"><img src="<?php echo site_url();?>images/27.jpg" alt=" " class="img-responsive" /></a>
					<div class="men-position-pos">
						<h4>New collection</h4>
						<h5><span>55%</span> Flat Discount</h5>
					</div>-->
				</div>
			</div>



			<div class="col-md-9 products-right">
				<div class="products-right-grids-bottom">
                    <div class="">
				<div class="new-collections-grids">
				<?php if(count($products) > 0):foreach($products as $key => $value):?>
				<div class="col-md-3 new-collections-grid">
					<div class="new-collections-grid1  slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>" class="product-image"><img class="img-responsive"src="<?php echo site_url();?>images/products/<?php echo $value['image1'];?>" alt="bracedeal" style="width:158px;height:220px;border:1px solid #D1CFCF;" /></a>
                            <div class="col-md-3">
                            <?php 
                            /** Discount Amount= Marked Price - Selling Price
                            Discount% = Discount Amount/Marked Price × 100%.**/
					        $diff       = ceil($value['price'] - $value['dprice']);
                            $percentage = ceil(($diff/$value['price'])* 100);
						    ?>
                            	<div class="ribbon"><span><?php echo $percentage;?>% OFF</span></div>
                            </div>
							<!--<div class="new-collections-grid1-image-pos">
								<a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>">Quick View</a>
							</div>-->
						</div>
						<div class="col-md-12"><h5 style="font-size:16px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis; "><a href="<?php echo site_url();?>products/product_view/<?php echo stripcslashes($value['id']);?>"><?php echo stripcslashes($value['title']);?></a></h5></div>
                        <div class="col-md-12" >
						    <?php if($value['shipping'] == "" || $value['shipping'] == "0"):?>
						    <p style="font-size:13px;background-color:#9FB811;color:#fff;border-radius:10px;padding:1px 5px 2px 4px;text-align:center">Shipping:Free</p>
						    <?php else:?>
						    <p style="font-size:13px;background-color:#9FB811;color:#fff;border-radius:10px;padding:1px 5px 2px 4px;text-align:center">Shipping:₹<?php echo $value['shipping'];?></p>
						    <?php endif;?>
						</div>
                        
                        <div class="col-md-12">
						</div>
                        <br>
						
                        <div class="col-md-12">
                            
                            <div class="col-md-10">
                        	<p id="iid<?php echo $value['id']; ?>"></p>
                            </div>
                            <div class="col-md-2" style="padding:12px 0">
                        	
                                </div>
                        </div><br>
						<?php if($value['available']=="In Stock"):?>
						<div class="col-md-12 new-collections-grid1-left">
							<p><i>₹<?php echo stripcslashes($value['price']);?></i> <span id="original_price_id<?php echo $value['id']; ?>">₹<?php echo stripcslashes($value['dprice']);?></span><br>
							<a href="" id="changeme<?php echo $value['id'];?>" onclick="addcart('<?php echo $value['id']; ?>')">add to cart </a></p>
					    </div>
				        
                        <p style="margin-top:70px;font-size:11px;">Select Size</p>
						<?php $sz = explode(',',$value['sizes']);?>
							<select style="width:100%!important;" name="size" id="idsz<?php echo $value['id']; ?>" class="form-control" required onchange = remove_effect('<?php echo $value['id'];?>')>  
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
				<div class="clearfix"></div>
			</div>
						
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<?php echo $this->load->view('footer')?>
<!-- //footer -->
</body>
</html>