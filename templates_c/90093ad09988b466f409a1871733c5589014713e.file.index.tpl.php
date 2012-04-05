<?php /* Smarty version Smarty-3.1.8, created on 2012-04-03 08:44:12
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19857182024f65cbadd0a210-92010664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1333418943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19857182024f65cbadd0a210-92010664',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f65cbadd7f586_10505799',
  'variables' => 
  array (
    'hotItems' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f65cbadd7f586_10505799')) {function content_4f65cbadd7f586_10505799($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/meetpoint2/smarty/plugins/function.cycle.php';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'index'=>true,'socialmedia'=>true), 0);?>




<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<div class="row">
    <div class="span12">
        <span class="page-header <?php echo smarty_function_cycle(array('values'=>"left, aaa"),$_smarty_tpl);?>
">
            <a href="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="no-style-link">
            <h1 class=" add-bottom "><?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
</h1></span>
            </a>
        <div class="row">
            <div class="span6">
                <div class="row"><img class="image"
                    src="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventCoverImage'];?>
" >
                </div>
                
            </div>
            <div class="span6">
                <div class="row">
                    <h3 class="description">[ <?php echo $_smarty_tpl->tpl_vars['item']->value['eventDate'];?>
 ] <?php echo $_smarty_tpl->tpl_vars['item']->value['eventShortDescription'];?>
</h3>
                </div>
                <div class="row text-center add-top">
            
<div class="span6" style="">
<span class='st_facebook_hcount' st_url="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" st_title="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
" displayText='Facebook'></span>
<span class='st_twitter_hcount' st_url="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" st_title="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
 via @StvnOnly #KlikEvent" displayText='Tweet'></span>
<span class='st_pinterest_hcount' st_url="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" st_title="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
" displayText='Pinterest'></span>
</div>
                </div>
                <div class="row add-top">
              
                    <div class="span6  text-right">
                <a href="event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                     <button class="btn btn-xxlarge btn-primary">See Details</button></a>
                    </div>
                </div>
                <div class="clear-float"></div>

                <div class="row add-top">
                    
                </div>
            </div>
        </div>
        
    </div>
</div> 

<hr/>                       
<?php } ?>




<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>