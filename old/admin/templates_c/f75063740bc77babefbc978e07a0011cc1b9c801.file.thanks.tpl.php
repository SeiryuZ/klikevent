<?php /* Smarty version Smarty-3.1.8, created on 2012-04-08 05:46:05
         compiled from "templates/thanks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16738746304f81261d632ee7-36480502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f75063740bc77babefbc978e07a0011cc1b9c801' => 
    array (
      0 => 'templates/thanks.tpl',
      1 => 1333863961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16738746304f81261d632ee7-36480502',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f81261d6b4984_79608758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f81261d6b4984_79608758')) {function content_4f81261d6b4984_79608758($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'subscribe'=>true), 0);?>


<div class="hero-unit">
	<h1>Thank You!</h1>
</div>

<hr/>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>