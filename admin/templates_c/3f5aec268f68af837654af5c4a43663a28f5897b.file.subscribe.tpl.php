<?php /* Smarty version Smarty-3.1.8, created on 2012-04-07 12:18:26
         compiled from "templates/subscribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1019876594f7f0232ca7216-53125965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f5aec268f68af837654af5c4a43663a28f5897b' => 
    array (
      0 => 'templates/subscribe.tpl',
      1 => 1333723767,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1019876594f7f0232ca7216-53125965',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f7f0232d69fb7_85606649',
  'variables' => 
  array (
    'res' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7f0232d69fb7_85606649')) {function content_4f7f0232d69fb7_85606649($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'subscribe'=>true), 0);?>


<div class="hero-unit">
	<h1>Subscribe to Us!</h1>
	<p>We will send you all goodness of KlikEvent directly to your email inbox.</p>
	<form action="process-subscribe.php" method="post">
		<div class="control-group">
          	<div class="controls">
            	<input type="text" placeholder="Your Email Here" class="subscribe-input" name="email" id="input01" size="30">
        	</div>
    	</div>
    	<button class="btn-large btn-primary text-center" onClick="javascript: processSubscribe();">Subscribe</button>
    	<div class=" add-top <?php if ($_smarty_tpl->tpl_vars['res']->value=='er'||$_smarty_tpl->tpl_vars['res']->value=='be'){?> alert-error <?php }elseif($_smarty_tpl->tpl_vars['res']->value=='ok'){?> alert-success <?php }?>">
    		<?php if ($_smarty_tpl->tpl_vars['res']->value=='er'){?>
    		<a class="close" data-dismiss="alert">x</a>
    		<h3 class="alert-heading">Error</h3>
    		Mohon Maaf, ada masalah dengan website kami
    		<?php }elseif($_smarty_tpl->tpl_vars['res']->value=='be'){?>
    		<a class="close" data-dismiss="alert">x</a>
    		<h3 class="alert-heading">Email tidak valid</h3>
    		 Coba sekali lagi
    		<?php }elseif($_smarty_tpl->tpl_vars['res']->value=='ok'){?>
    		<a class="close" data-dismiss="alert">x</a>
    		<h3 class="alert-heading">Sukses!</h3>
    		Email anda sudah dimasukan ke database kami
    		<?php }?>
    	</div>
	</form>
</div>

<hr/>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>