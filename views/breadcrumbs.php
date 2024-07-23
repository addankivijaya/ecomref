<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="<?php echo site_url();?>home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
			<?php if($this->uri->segment(2) == "prouct_by_category"):?>
			    <li><a href="<?php echo site_url();?>products">Products</a></li>
			    <li><?php echo $cat_name['cname'];?></li>
			

			<?php elseif($this->uri->segment(2) == "prouct_by_subcategory"):?>
			    
			    <li><a href="<?php echo site_url();?>products">Products</a></li>
			    <li><a href="<?php echo site_url();?>products/prouct_by_subcategory/<?php echo $catname['cid'];?>/<?php echo $catname['sid'];?>"><?php echo $catname['cname'];?></li><li class="active"><?php echo $catname['sname'];?></a></li>
			

			<?php elseif($this->uri->segment(2) == "prouct_by_childcategory"):?>

				<li><a href="<?php echo site_url();?>products">Products</a></li>
				<li><a href="<?php echo site_url();?>products/prouct_by_category/<?php echo $subcatname['cid'];?>"><?php echo $subcatname['cname'];?></a></li>
				<li><a href="<?php echo site_url();?>products/prouct_by_subcategory/<?php echo $catname['cid'];?>/<?php echo $catname['sid'];?>"><?php echo $subcatname['sname'];?></a></li>
				<li><a href="<?php echo site_url();?>products/prouct_by_childcategory/<?php echo $subcatname['cid'];?>/<?php echo $subcatname['sid'];?>/<?php echo $subcatname['ccid'];?>"><?php echo $subcatname['chname'];?></a></li>


			<?php elseif($this->uri->segment(2) == "product_view"):?>
				<li><a href="<?php echo site_url();?>products">Products</a></li>
				<li><a href="<?php echo site_url();?>products/prouct_by_category/<?php echo $childcatname['cid'];?>"><?php echo $childcatname['cname'];?></a></li>
				<li><a href="<?php echo site_url();?>products/prouct_by_subcategory/<?php echo $childcatname['cid'];?>/<?php echo $childcatname['sid'];?>"><?php echo $childcatname['sname'];?></a></li>
				<li><a href="<?php echo site_url();?>products/prouct_by_childcategory/<?php echo $childcatname['cid'];?>/<?php echo $childcatname['sid'];?>/<?php echo $childcatname['ccid'];?>"><?php echo $childcatname['chname'];?></a></li>
				<li class="active">Product Page</li>

			<?php elseif($this->uri->segment(1) == "products" && $this->uri->segment(2) == ""):?>
				<li><a href="<?php echo site_url();?>products">Products</a></li><li class="active">All Products</li>

			<?php elseif($this->uri->segment(1) == "cart"):?>
				<li class="active"><a href="<?php echo site_url();?>cart">View cart</a></li>
				
			<?php elseif($this->uri->segment(1) == "checkout"):?>
				<li class="active"><a href="<?php echo site_url();?>checkout">Checkout</a></li>
				
				<?php elseif($this->uri->segment(1) == "confirm" && $this->uri->segment(2) == "pay"):?>
				<li class="active"><a href="">Order details</a></li>
				
				<?php elseif($this->uri->segment(1) == "confirm" && $this->uri->segment(2) == "ebsPay"):?>
				<li class="active"><a href="">Payment</a></li>
				
				<?php elseif($this->uri->segment(1) == "products" && $this->uri->segment(2) == "todayDeals"):?>
				<li><a href="<?php echo site_url();?>products">Products</a></li>
				<li class="active"><a href="<?php echo site_url();?>products/todayDeals">Today Deals</a></li>

			<?php elseif($this->uri->segment(2) == "searchproperty"):?>
				<li><a href="<?php echo site_url();?>products">Products</a></li>
				<li class="active">Search Products</li>
			<?php endif;?>
		</ol>
	</div>
</div>