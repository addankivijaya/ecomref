<div class="timer">
	<div class="container-fluid">
		<div class="timer-grids">
			<div class="col-md-6 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s" style="background-color:#337AB7;padding: 40px 40px 10px 40px">
				<div class="mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
				<form method="post" action="<?php echo site_url('contactus');?>">
						<input type="text" name="name"    value="<?php echo set_value("name");?>" placeholder="Enter Name"><?php echo form_error("name");?><br><br>
						<input type="text" name="email"  value="<?php echo set_value("email");?>"  placeholder="Enter Email"><?php echo form_error("email");?><br><br>
						<input type="text" name="subject"  value="<?php echo set_value("subject");?>"  placeholder="Enter Subject"><?php echo form_error("subject");?><br><br>
						<textarea name="message" placeholder="Enter some text"><?php echo set_value("message");?> </textarea><?php echo form_error("message");?>
						<input type="submit" name="contactme" value="Submit Now" >
					</form>
			</div>
			</div>
			<div class="col-md-6 timer-grid-right animated wow slideInRight" data-wow-delay=".5s" style="padding-left:9px">
				<div class="timer-grid-right1">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15220.847291945014!2d78.39127719999999!3d17.497399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1510054804669" width="100%" height="517" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>