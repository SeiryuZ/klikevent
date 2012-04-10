<?php /* Smarty version Smarty-3.1.8, created on 2012-04-08 09:35:43
         compiled from "templates/filter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10578561904f7f217ba0bb03-89429864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86f7ff9ec1355a8596d7adb4bb2d7625c4186b27' => 
    array (
      0 => 'templates/filter.tpl',
      1 => 1333877440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10578561904f7f217ba0bb03-89429864',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f7f217c412c30_42791832',
  'variables' => 
  array (
    'filter' => 0,
    'isFound' => 0,
    'eventItems' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7f217c412c30_42791832')) {function content_4f7f217c412c30_42791832($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/Applications/XAMPP/xamppfiles/htdocs/klikevent/smarty/plugins/modifier.capitalize.php';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'filter'=>"true",'todayEvent'=>true), 0);?>



<div class="section page-header">
    <h1> Events Dengan Kategori <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['filter']->value);?>
 </h1>
    <div class="row">
    </div>
</div>
 
 <div class="row add-bottom">
    <div class="span12">
    <div class="alert alert-info">
        <a href="#" onClick="filter('paid')">Paid</a>&nbsp;&nbsp;&nbsp;
        <a href="#" onClick="filter('day')">Day</a>&nbsp;&nbsp;&nbsp;
        <a href="#" onClick="filter('night')">Night</a>&nbsp;&nbsp;&nbsp;
        <a href="#" onClick="filter('artandhobby')">Art and Hobby</a>&nbsp;&nbsp;&nbsp;
        <a href="#" onClick="filter('exhibition')">Exhibition</a>&nbsp;&nbsp;&nbsp;
        <a href="#" onClick="filter('education')">Education</a>&nbsp;&nbsp;&nbsp;
        <a href="#" onClick="filter('others')">Others</a>&nbsp;&nbsp;&nbsp;
    </div>
    </div>
</div> 
<?php if ($_smarty_tpl->tpl_vars['isFound']->value){?>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<div class="row <?php echo $_smarty_tpl->tpl_vars['item']->value['category'];?>
">
    <div class="span12">
        <span class="page-header left">
            <a href="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="no-style-link">
            <h1 class=" add-bottom "><?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
</h1></span>
            </a>
        <div class="row">
            <div class="span6">
                <div class="row"><img class="image"
                    src="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventCoverImage'];?>
"></div>
                <div class="row"></div>
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
                <div class="row add-top text-right">
                <div class="span6">
                <a href="event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                     <button class="btn btn-large btn-primary">See Details</button></a>
                    </div>
                </div>
                <div class="clear-float"></div>

             
            </div>
        </div>
        
    </div>
    <div class="clear-float"></div>
    <hr/> 
</div> 

                      

<?php } ?>

<?php }else{ ?>

<div class="section add-min-height">
        <h1>Tidak ada event, Kalau ada informasi beri kami <a href="tips.php">tip</a>.</h1>
    </div>
    <hr/>
<?php }?>



<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>