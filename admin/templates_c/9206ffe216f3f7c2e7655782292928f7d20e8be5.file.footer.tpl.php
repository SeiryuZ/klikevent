<?php /* Smarty version Smarty-3.1.8, created on 2012-04-10 04:07:07
         compiled from "templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14758841224f7efd573593b6-04599341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9206ffe216f3f7c2e7655782292928f7d20e8be5' => 
    array (
      0 => 'templates/footer.tpl',
      1 => 1333948578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14758841224f7efd573593b6-04599341',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f7efd57361619_60607190',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7efd57361619_60607190')) {function content_4f7efd57361619_60607190($_smarty_tpl) {?>

	<!-- FOOTER SECTION -->

	<div class="section add-top add-bottom">
    	<p><!--This website and its content is &copy; copyright of KlikEvent - -->&copy; KlikEvent 2012. All rights reserved.</p>
<!--
<p>Any redistribution or reproduction of part or all of the contents in any form is prohibited without our express written permission</p>
-->

	</div>
	<hr/>
	<div class="row text-left">
		<div class="span3">
			<p><strong>Categories</strong><p>
			<a href="filter.php?filter=paid"><p>Paid</p></a>
			<a href="filter.php?filter=free"><p>Free</p></a>
			<a href="filter.php?filter=day"><p>Day</p></a>
			<a href="filter.php?filter=night"><p>Night</p></a>
			<a href="filter.php?filter=artandhobby"><p>Art &amp; Hobbies</p></a>
			<a href="filter.php?filter=exhibition"><p>Exhibition</p></a>
			<a href="filter.php?filter=education"><p>Education</p></a>
			<a href="filter.php?filter=others"><p>Others</p></a>
		</div>
		<div class="span3">
			<p><strong>About</strong><p>
			<a href="about.php"><p>About</p></a>
			<a href="tips.php"><p>Contact Us</p></a>
			<p>Terms and Condition</p>
		</div>
		<div class="span3">
			<p><strong>Newsletter</strong><p>
				<form method="POST" action="process-subscribe.php">
				<p><input type="text" name="email" placeholder="Your Email here" class=""></p>
				<p><a class="btn-small btn-primary">Subscribe</a></p>
				</form>
		</div>
		<div class="span3 ">
			<p><strong>Follow Us!</strong><p>
			<p class="">
				<a href="https://twitter.com/KlikeventID" class="twitter-follow-button" data-show-count="true" data-size="large">Follow @KlikEventID</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</p>

			<p class="">
				<div class="fb-like" data-href="http://www.facebook.com/KlikEvent" data-send="true" data-width="220" data-show-faces="false"></div>
			</p>
		</div>
	</div>
	<hr/>
	<div class="section partners">
		<strong>Partners</strong>
	</div>
<!-- CLOSING CONTAINER -->
</div>
</body>
</html>
<?php }} ?>