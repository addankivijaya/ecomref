<?php 
ini_set('display_errors',0);
error_reporting(E_ALL);
$da = $this->session->userdata('paysess');
/*echo "<pre>";print_r($da);exit;*/
$hashData = "754e60a98627002733e77f5c6aa5ce0c"; //Pass your Registered Secret Key
unset($da['submitted']);
ksort($da);
foreach ($da as $key => $value){
	if (strlen($value) > 0) {
		$hashData .= '|'.$value;
	}
}
if (strlen($hashData) > 0) {
	$secure_hash = strtoupper(hash("sha512",$hashData));//for SHA512
 	//$secure_hash = strtoupper(hash("sha1",$hashData));//for SHA1
	//$secure_hash = strtoupper(md5($hashData));//for MD5
}
/*echo "<b>This is hashdata:</b>".$hashData.'<br><br>';
echo "<b>This is Secure data:</b>".$secure_hash.'<br>';
print_r($secure_hash_md5); 
if(isset($_POST) && $_POST['submit'] == "Send"):
   echo "<pre>";print_r($_POST);
endif;*/
?>
<!DOCTYPE html>
<html>
<?php echo $this->load->view('head');?>
<body>
<?php echo $this->load->view('header');?>
<!-- //header -->
<!-- breadcrumbs -->
<?php echo $this->load->view('breadcrumbs');?>
<div align="center" style="background-color:#FAFAFA;padding:10px 0"> 
   <h3 style="color:green">Payment is Processing</h3>
   <p>Total Amount: Rs.<?php echo $da['amount'];?>/-</p><br>
   <form action="https://secure.ebs.in/pg/ma/payment/request" name="payment" method="POST">
<!--<form method="post">-->
			    <input name="account_id" type="hidden" value="<?php echo $da['account_id'];?>">
				<input name="return_url" type="hidden" value="<?php echo site_url();?>confirm/success" />
				<input name="mode"     type="hidden"  value="<?php echo $da['mode'];?>"/>
				<input name="channel"  type="hidden"  value="<?php echo $da['channel'];?>"/>
				<input name="currency" type="hidden"  value="<?php echo $da['currency'];?>"/>
				<input name="reference_no" type="hidden" value="<?php echo $da['reference_no']; ?>" />
				<input name="amount" type="hidden" value="<?php echo $da['amount'];?>"/>
				<input name="description" type="hidden" value="bracedeal product information" /> 
				<input name="name" type="hidden"    value="<?php echo $da['name']; ?>" />
				<input name="address" type="hidden" value="<?php echo $da['address']; ?>" />
				<input name="city" type="hidden"    value="<?php echo $da['city']; ?>" />
				<input name="state" type="hidden"   value="<?php echo $da['state']; ?>" />
				<input name="postal_code" type="hidden" value="<?php echo $da['postal_code']; ?>" />
				<input name="country" type="hidden"  value="<?php echo $da['country']; ?>" />
				<input name="phone" type="hidden"   value="<?php echo $da['phone']; ?>" />
				<input name="email" type="hidden"  value="<?php echo $da['email']; ?>" />
                <input type="hidden" value="<?php echo $secure_hash; ?>" name="secure_hash"/>
                <button class="btn btn-primary btn-md" onclick="document.payment.submit();"> SUBMIT </button>
				<!--<input type="submit" name="submit" value="Send"/>-->
		    </form>
</div><br><br>

<?php echo $this->load->view('footer');?>
<!-- //footer -->
</body>
</html>