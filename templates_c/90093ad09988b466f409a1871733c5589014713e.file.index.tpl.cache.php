<?php /* Smarty version Smarty-3.1.8, created on 2012-03-18 13:15:54
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3760269844f65e00ad421e0-17890221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1332071218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3760269844f65e00ad421e0-17890221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f65e00adba307_83605859',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f65e00adba307_83605859')) {function content_4f65e00adba307_83605859($_smarty_tpl) {?>

Hello <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
, Welcome to Smarty!
<?php }} ?>