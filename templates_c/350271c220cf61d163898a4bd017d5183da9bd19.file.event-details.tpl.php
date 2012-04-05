<?php /* Smarty version Smarty-3.1.8, created on 2012-04-02 10:33:59
         compiled from "templates/event-details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2038999534f6da3c646c861-60089283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '350271c220cf61d163898a4bd017d5183da9bd19' => 
    array (
      0 => 'templates/event-details.tpl',
      1 => 1333360038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2038999534f6da3c646c861-60089283',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f6da3c659c962_29158065',
  'variables' => 
  array (
    'isFound' => 0,
    'eventDetails' => 0,
    'details' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f6da3c659c962_29158065')) {function content_4f6da3c659c962_29158065($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'socialmedia'=>true,'jquery'=>true), 0);?>


<?php if ($_smarty_tpl->tpl_vars['isFound']->value){?>

<?php  $_smarty_tpl->tpl_vars['details'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['details']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['details']->key => $_smarty_tpl->tpl_vars['details']->value){
$_smarty_tpl->tpl_vars['details']->_loop = true;
?>

<div class="row">
    <div class="span12">
        <h1><?php echo $_smarty_tpl->tpl_vars['details']->value['eventTitle'];?>
</h1>
    </div>
</div>


<div class="row ">
    <div class="span12 ">
        <div class="tabbable ">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
                <li class=""><a href="#location" data-toggle="tab">Location</a></li>
                <li class=""><a href="#images" data-toggle="tab">Images</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row add-min-height add-bottom text-left">
    <div class="span4">
        <a data-toggle="modal" href="#windowTitleDialog">
        <img src="<?php echo $_smarty_tpl->tpl_vars['details']->value['eventCoverImage'];?>
" width="280">
        </a>
    </div>
    <div class="span8 ">
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="row">
                    <div class="span8">
                        <strong><p>Tanggal: </p></strong>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['eventDate'];?>
</p>
                    </div>
                </div>
                <div class="row">
                    <div class="span8">
                        <strong><p>Short Description</p></strong>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['eventShortDescription'];?>
</p>
                    </div>
                </div>
                <div class="row">
                    <div class="span8">
                        <strong><p>Description</p></strong>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['eventDescription'];?>
</p>
                    </div>
                </div>
                
                
            </div>
            <div class="tab-pane" id="location">
                <div class="row">
                    <div class="span8">
                        <strong><p>Location</p></strong>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="span8">
                        <strong><p>Map</p></strong>
                        <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=Universitas+Bina+Nusantara+Pascasarjana&amp;aq=&amp;g=Jalan+Hang+Lekir+1,+12220,+Indonesia&amp;ie=UTF8&amp;ll=-6.228996,106.797412&amp;spn=0.039762,0.076904&amp;t=m&amp;z=14&amp;vpsrc=0&amp;iwloc=A&amp;cid=13729169839825149634&amp;output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="620" height="620"></iframe>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="images">
                <p>No gallery</p>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="windowTitleDialog" style="display: none; ">
                <div class="modal-header">
                    <a href="#" class="close" data-dismiss="modal">x</a>
                    
                    </div>
                <div class="modal-body">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['details']->value['eventCoverImage'];?>
">
                    </div>
</div>




<div class="row">
    <div class="span12">
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


    <div class="clear-float"></div>
</div>



	
<?php } ?>

<?php }else{ ?>
	<div class="section">
        <h1>Event tidak dapat ditemukan</h1>
    </div>
<?php }?>

<hr/>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>