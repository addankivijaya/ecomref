
<div class="footer">

		<div class="container">

			<div class="footer-grids" >

				<div class="col-md-4 footer-grid  slideInLeft" data-wow-delay=".5s" style="padding-top:20px">
					<h3>About Us</h3>
					<p align="justify" style="padding-right:60px">BraceDeal is an E-commerce portal which is established for providing quality products in Health(Braces and splints) and Fitness.We have authentic products which are verified and selected from each brand based on the Quality<!--.....<a class="btn btn-xs btn-info" href="<?php echo site_url();?>pages/about-us">more</a>--></p>

				</div>

				<div class="col-md-2  footer-grid  slideInLeft" data-wow-delay=".6s" style="padding-top:20px">
					<h3>Categories</h3>
					<?php
                     $query = $this->db->select('id,name')->where('status',1)->get('tbl_category')->result_array();
                     //echo "<pre>";print_r($query);exit;
					?>
					<ul>
						<?php foreach($query as $key => $value):?>
						    <li><a href="<?php echo site_url();?>products/prouct_by_category/<?php echo $value['id'];?>"> <i class="fas fa-angle-right"></i> &nbsp;<?php echo $value['name'];?></a></li>
					    <?php endforeach;?>
					</ul>

				</div>

				<div class="col-md-2 col-md-offset-1 footer-grid  slideInLeft" data-wow-delay=".6s" style="padding-top:20px">

					<h3>Quick Links</h3>

					<ul>

						<li><a href="<?php echo site_url();?>pages/about-us"><i class="fas fa-angle-right"></i> &nbsp;About Us</a></li>

						
						
						<li><a href="<?php echo site_url();?>pages/returns-and-refunds"><i class="fas fa-angle-right"></i> &nbsp;Returns and refunds</a></li>
						
						<li><a href="<?php echo site_url();?>pages/shipping-policy"><i class="fas fa-angle-right"></i> &nbsp;Shipping policy</a></li>
						
						<li><a href="<?php echo site_url();?>pages/privacy-policy"><i class="fas fa-angle-right"></i> &nbsp;Privacy policy</a></li>
						

                        <li><a href="<?php echo site_url();?>pages/faqs"><i class="fas fa-angle-right"></i> &nbsp;Faqs</a></li>

                        <li><a href="<?php echo site_url();?>pages/terms-and-conditions"><i class="fas fa-angle-right"></i> &nbsp;Terms & Conditions</a></li>
                        
                        <li><a href="<?php echo site_url();?>contactus"><i class="fas fa-angle-right"></i> &nbsp;Contact Us</a></li>

					</ul>

				</div>

				<div class="col-md-2 col-md-offset-1 footer-grid  slideInLeft" data-wow-delay=".6s" style="padding-top:20px">

					<h3>Contact Info</h3>

					<ul>

						<li><!--<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>--><?php echo stripcslashes($web_settings['admin_address']);?></li>

						<li><!--<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>--><a href="mailto:<?php echo stripcslashes($web_settings['admin_email']);?>"><?php echo stripcslashes($web_settings['admin_email']);?></a></li>

						<li><!--<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>--><?php echo stripcslashes($web_settings['admin_mobile']);?></li>

					</ul>

				</div>

				<div class="clearfix"> </div>

			</div>

			<div class="footer-logo  slideInUp" data-wow-delay=".5s">

				<h2><a href="<?php echo site_url();?>home">Brace Deal <span>shop anywhere</span></a></h2>

			</div>

			<div class="copy-right  slideInUp" data-wow-delay=".5s">
                <div class="col-md-12">
                    <div class="col-md-6">

				<p>&copy <?php echo date('Y');?>  All rights reserved  by <a href="#">Brace Deal</a></p>
                    </div>
                     <div class="col-md-3">

				<!--<p class="pull-right">Powered By <strong><b><a href="https://www.royalitpark.in/"  target="_blank" style="font-size: 18px;font-family: sans-serif;letter-spacing: 0.5px">R<span style="font-size: 16px">oya</span>L&nbsp;IT&nbsp;P<span style="font-size: 16px">ar</span>K</a></b></strong> </p>-->
                    </div>
                   
                    <div class="col-md-2 col-md-offset-1">

				<!-- hitwebcounter Code START -->
<a href="#" target="_blank"><img src="http://www.reliablecounter.com/count.php?page=117811192&digit=style/plain/5/&reloads=0" alt="" title="" border="0"></a><br /><a href="http://www.corriereserale.com/orzaiolo-rimedi-naturali/ " target="_blank" style="font-family: Geneva, Arial; font-size: 9px; color: #330010; text-decoration: none;"></a>
                    </div>
                    
                     </div>
                    </div>

			</div>

		</div>

	</div>
	<?php $this->load->view('scripts');?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a6f319ed7591465c7072ec6/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script>
$('.dropdown').on('mouseenter mouseleave click tap', function() {
  $(this).toggleClass("open");
});

</script>