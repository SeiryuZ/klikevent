<?php /* Smarty version Smarty-3.1.8, created on 2012-04-08 08:39:35
         compiled from "templates/events-date.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8005869864f7f0233c2cd16-54181097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8dc2f2989f1261f3306cff969e5503ef09e95d5' => 
    array (
      0 => 'templates/events-date.tpl',
      1 => 1333874374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8005869864f7f0233c2cd16-54181097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f7f0233da7a35_28587464',
  'variables' => 
  array (
    'date' => 0,
    'prevDate' => 0,
    'nextDate' => 0,
    'isFound' => 0,
    'eventItems' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f7f0233da7a35_28587464')) {function content_4f7f0233da7a35_28587464($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'filter'=>"true",'todayEvent'=>true,'socialmedia'=>true), 0);?>



<div class="section page-header">
    <h1> Events Pada Tanggal <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 </h1>
    <div class="row">
        <div class="span2">
            <a href="events-date.php?date=<?php echo $_smarty_tpl->tpl_vars['prevDate']->value;?>
"><i class="icon-chevron-left"></i>Previous Date</a>
        </div>
        <div class="span2 offset8">
            <a href="events-date.php?date=<?php echo $_smarty_tpl->tpl_vars['nextDate']->value;?>
">Next Date<i class="icon-chevron-right"></i></a>
        </div>
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
                    <h3 class="description">[<?php echo $_smarty_tpl->tpl_vars['item']->value['eventDate'];?>
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