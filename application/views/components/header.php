<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
 
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?php echo base_url() ?>assets/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?php echo base_url() ?>assets/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?php echo base_url() ?>assets/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?php echo base_url() ?>assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?php echo base_url() ?>assets/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>assets/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> 
	<?php 
	if($this->session->userdata('uname')!=""){
	echo $this->session->userdata('uname');
	}else
	{
		echo "User";
	}
	?>
	</strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="product_summary.html"><span class="">Fr</span></a>
		<a href="product_summary.html"><span class="">Es</span></a>
		<span class="btn btn-mini">En</span>
		<a href="product_summary.html"><span>&pound;</span></a>
		<span class="btn btn-mini">$155.00</span>
		<a href="product_summary.html"><span class="">$</span></a>
		<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?php echo base_url()?>"><img src="<?php echo base_url() ?>assets/themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>CLOTHES </option>
			<option>FOOD AND BEVERAGES </option>
			<option>HEALTH & BEAUTY </option>
			<option>SPORTS & LEISURE </option>
			<option>BOOKS & ENTERTAINMENTS </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.html">Specials Offer</a></li>
	 <li class=""><a href="normal.html">Delivery</a></li>
	 <li class=""><a href="contact.html">Contact</a></li>
	 <li class="">
	<?php 
	if($this->session->userdata('uname')=="") { ?>
	 <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
	<?php }else{?>
			 <a href="<?php echo base_url('login/logout')?>"  style="padding-right:0"><span class="btn btn-large btn-success">Logout</span></a>

		<?php }?>
	
	 <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Login Block</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal loginFrm">
			  <div class="control-group">								
				<input type="text" id="loginemail" placeholder="Email">
			  </div>
			  <div class="control-group">
				<input type="password" id="loginpassword" placeholder="Password">
			  </div>
			  <div class="control-group">
				<label class="checkbox">
				<input type="checkbox"> Remember me
				</label>
			  </div>
			</form>		
			<button type="submit" id="ulogin" class="btn btn-success">Sign in</button>
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		  </div>
	</div>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
$(document).ready(function(){
	$("#ulogin").click(function(event){
		console.log("sadsadsa");
		event.preventDefault();
		var user_name=$("#loginemail").val();
		var user_password=$("#loginpassword").val();
		var csrfHash="<?php echo $this->security->get_csrf_hash()?>";
		

		jQuery.ajax({
			type:"POST",
			url:"<?php echo base_url()?>" + "login/userLogin",
			datatype:'json',
			data:{
				csrf_test_name:"<?php echo $this->security->get_csrf_hash()?>",
				uname:user_name,
				pwd:user_password
			},
			success:function(res){
				console.log(URL);
				if(res=="success"){
					window.location.href="<?php echo base_url()?>";
				}else if(res=="fail"){
					console.log("wrong password")
				}else{
					console.log("fail___")
				}
			}
		});

	});
});

</script>
