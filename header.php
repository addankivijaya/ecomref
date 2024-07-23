<style>

.stylish-input-group .input-group-addon{
    background: white !important; 
}
.stylish-input-group .form-control{
	border-right:0; 
	box-shadow:0 0 0; 
	border-color:#ccc;
}
.stylish-input-group button{
    border:0;
    background:transparent;
}


.dropdown:hover > .dropdown-menu,
.dropdown-submenu:hover > .dropdown-menu {
  display: block;
}
.col-sm-4
{
    float:right;
}
</style>


<div class="header">
		<div class="container-fluid">
			<div class="header-grid" style="background-color:#174b8c">
				<div class="col-md-12">
                    <div class="col-md-2">
                   <div class="logo-nav-left visible-md-block col-md-2 text-right text-muted" data-wow-delay=".5s">

					<a href="<?php echo site_url();?>home"><img src="<?php echo site_url();?>images/small.png" style="float:left;width:44%"/></a>

				</div>
                    </div>
					<div class="col-md-5" >
                        <form method="post" action="<?php echo site_url();?>products/searchproperty/">
				<div id="imaginary_container" class="ser"> 
                <div class="input-group stylish-input-group" style="margin-bottom: 0px !important">
                <input type="text" name="keyword" class="form-control" placeholder="Search" >
                <span class="input-group-addon">
                    <button type="submit" name="submit" value="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>  
                </span>
                </div>
                </div>
            </form>
				<div class="header-grid-left  slideInLeft" data-wow-delay=".5s">
					<ul style="margin-top:5px">
						<!--<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:<?php echo stripcslashes($web_settings['admin_email']);?>"></a><?php echo stripcslashes($web_settings['admin_email']);?></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php echo stripcslashes($web_settings['admin_mobile']);?></li>-->
					</ul>
				</div>
			
		</div>
		<div class="col-md-2 " style="padding-left:38px">
		    <div class="col-sm-4">
               <a href="http://www.drknee.in/" target="_blank"> <button type="button" class="btn btn-warning">Consult Orthopaedic Doctor</button></a>
                </div></div>
		<div class="col-md-3 col-md-offset-2 len">
			<div class="header-grid-right  slideInRight" data-wow-delay=".5s" style="margin-top:5px">
				<ul class="social-icons">
					<?php if($this->uri->segment(2) != "trackorder"):?>
					<li><a href="<?php echo site_url();?>home/trackorder">&nbsp;<i class="fas fa-map-marker" title="Track"aria-hidden="true"></i></a></li>
				    <?php endif;?>

                        <?php if($this->session->userdata('user_id')==''){?>
						

          <li><a href="<?php echo site_url();?>login">&nbsp;<i class="fas fa-sign-in-alt" title="Login"aria-hidden="true"></i></a></li>

		  <li><a href="<?php echo site_url();?>register">&nbsp;<i class="fas fa-user-plus" title="Register"aria-hidden="true"></i></a></li>

        <?php } ?>

        <?php if($this->session->userdata('user_id')!=''){?>
        <?php if($this->session->userdata('user_name')!=''):?>
        <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>&nbsp;Welcome to <?php echo $this->session->userdata('user_name');?></li>
        <?php else:?>
        <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>&nbsp;Welcome to Guest!</li>
        <?php endif;?>
		<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="<?php echo site_url(); ?>login/logout">&nbsp;logout</a></li>
        <?php } ?>
					<!--	<li><a href="#" class="facebook"></a></li>
						<li><a href="#" class="twitter"></a></li>
						<li><a href="#" class="google"></a></li>
						<li><a href="#" class="instagram"></a></li>-->
					</ul>
				</div>
						</div>
					</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav" style="background-color:#FAFAFA;" >
				<div class="logo-nav-left  visible-lg visible-md" data-wow-delay=".5s">

				<a href="<?php echo site_url();?>home"><img src="<?php echo site_url();?>images/logo.png" style="padding-top: 10px"/></a>

				</div>

				<div class="logo-nav-left1">

					<nav class="navbar navbar-default">

					<!-- Brand and toggle get grouped for better mobile display -->

					<div class="navbar-header nav_2">

						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">

							<span class="sr-only">Toggle navigation</span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

						</button>

					</div>

		  <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
			 <ul class="nav navbar-nav">
							<!--<li  class="<?php if($this->uri->segment(2) =="home"):?>active<?php endif;?>"><a href="<?php echo site_url();?>home">Braces and Splints</a></li>
                            <li class="<?php if($this->uri->segment(2) =="about-us"):?>active<?php endif;?>"><a href="<?php echo site_url();?>pages/about-us">Taping and Strapping</a></li>-->
							<!-- Mega Menu -->

		<?php /* foreach($menu as $key => $value):?>
			 <li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo stripslashes($value['categoryname']); ?><b class="caret"></b></a>
				   <ul class="dropdown-menu multi-column columns-3">
					  <div class="row">
						 <?php foreach($value['smenu'] as $skey => $svalue):?>
						    <div class="col-sm-3"><h5 ><a href="" style="color:#337AB7"><u><?php echo stripslashes($svalue['sub_cat_name']);?></u></a></h5>
						     <?php foreach (array_chunk($svalue['cmenu'], 5, true) as $cvalue)
						     {
								    foreach($cvalue as $ssub) {?>
									<li><a href="<?php echo site_url();?>products/prouct_by_subcategory/<?php echo $value['categoryid'];?>/<?php echo $ssub['childcat_id'];?>"><?php echo stripslashes($ssub['child_cat_name']);?></a></li>
					      <?php }echo '</div>';}?>
						<?php endforeach;?>
						
					   </div>
				    </ul>
			   </li>
		<?php endforeach; */?>
                 
                 
           <?php foreach($menu as $key => $value):?>
			 <li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo stripslashes($value['categoryname']); ?><b class="caret"></b></a>
				   <ul class="dropdown-menu multi-column columns-3" style="overflow-y:scroll;max-height: 300px;">		
					 <div class="col-sm-12">
						<?php foreach($value['smenu'] as $skey => $svalue):?>
						<h4><a href="<?php echo site_url();?>products/prouct_by_subcategory/<?php echo $value['categoryid'];?>/<?php echo $svalue['sub_cat_id'];?>" style="color:#337AB7"><?php echo stripslashes($svalue['sub_cat_name']);?></a></h4>
						<ul class="multi-column-dropdown " >
							<?php foreach($svalue['cmenu'] as $ckey => $cvalue):?>
							  <li><a href="<?php echo site_url();?>products/prouct_by_childcategory/<?php echo $value['categoryid'];?>/<?php echo $svalue['sub_cat_id'];?>/<?php echo $cvalue['childcat_id'];?>"><?php echo stripslashes($cvalue['child_cat_name']);?></a></li>
							<?php endforeach;?>
						</ul>
						<?php endforeach;?>
					 </div>
				   </ul>
			   </li>
		    <?php endforeach;?>
                <?php /*foreach($menu as $key => $value):?>
				    <li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo stripslashes($value['categoryname']); ?><b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<?php
										foreach (array_chunk($value['smenu'], 5, true) as $svalue)
										{
										    echo '<div class="col-sm-4">';
										    foreach($svalue as $ssub) {?>
										        <li><a href="<?php echo site_url();?>products/prouct_by_subcategory/<?php echo $value['categoryid'];?>/<?php echo $ssub['sub_cat_id'];?>"><?php echo stripslashes($ssub['sub_cat_name']);?></a></li>
										    <?php }
										    echo '</div>';
										}?>
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
				<?php endforeach;*/?>	    
			</ul>
		</div>
					</nav>
				</div>
				 <div class="logo-nav-right">
					<!-- search-scripts -->
					<script src="<?php echo site_url();?>js/classie.js"></script>
					<script src="<?php echo site_url();?>js/uisearch.js"></script>
					<script>
						new UISearch( document.getElementById('sb-search'));
					</script>
					<!-- //search-scripts -->
				</div>
	   <?php if($this->uri->segment(1) != "cart"):?>
	  
			<div class="header-right">
				<div class="cart box_1" id="ccr">
					<a href="<?php echo site_url('cart');?>">
					  <h3>
					    <div class="total" id="cartdivid">
						  <span>Rs <?php echo ceil($this->cart->total());?></span> (<span><?php echo $this->cart->total_items();?></span> item(s))
						</div>
						<i class="fas fa-cart-arrow-down"></i>
					  </h3>
					</a>
					<div class="clearfix"></div>
				</div>
			</div>
       
      <?php endif;?>
      
				<div class="clearfix"> </div>
                </div>
		</div>
	</div>