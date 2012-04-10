<?php /* Smarty version Smarty-3.1.8, created on 2012-04-10 04:16:37
         compiled from "templates/event-details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3383246254f804f117e35f7-85850209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '350271c220cf61d163898a4bd017d5183da9bd19' => 
    array (
      0 => 'templates/event-details.tpl',
      1 => 1334031394,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3383246254f804f117e35f7-85850209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f804f11931404_40506755',
  'variables' => 
  array (
    'isFound' => 0,
    'eventDetails' => 0,
    'details' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f804f11931404_40506755')) {function content_4f804f11931404_40506755($_smarty_tpl) {?>

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
                <li class="active other "><a href="#overview" data-toggle="tab">Overview</a></li>
                <!--<li class="map "><a href="#map" data-toggle="tab">Map</a></li>-->
                <li class="other "><a href="#images" data-toggle="tab">Gallery</a></li>
            </ul>
        </div>
    </div>
</div>

<!--  SCRIPT HACK FOR SEE MAP TAB CHANGE  -->
<script type="text/javascript">
function changeTab()
{
    $('.other').removeClass('active');
    $('.map').addClass ('active');
}

</script>
<!-- END  SCRIPT HACK FOR SEE MAP TAB CHANGE -->


<div class="row add-min-height add-bottom text-left">
    <div class="span4">
        <div class="row add-bottom ">
            <div class="span4">
            <a data-toggle="modal" href="#windowTitleDialog">
            <img src="<?php echo $_smarty_tpl->tpl_vars['details']->value['eventCoverImage'];?>
" class="image">
            </a>
            </div>
        </div>
        <div class="row">
            <div class="span4 text-center">
                <span class='st_facebook_hcount' st_url="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" st_title="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
" displayText='Facebook'></span>
                <span class='st_twitter_hcount' st_url="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" st_title="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
 via @KlikEventID #KlikEvent" displayText='Tweet'></span>
                <span class='st_pinterest_hcount' st_url="http://www.klikevent.com/event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" st_title="<?php echo $_smarty_tpl->tpl_vars['item']->value['eventTitle'];?>
" displayText='Pinterest'></span>
            </div>
        </div>
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
                <hr/>
                <div class="row">
                    <div class="span8">
                        <strong><p>Location</p></strong>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['location1'];?>
</p>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['location2'];?>
</p>
                        <p></p>
                        <!--
                        <a href="#map" data-toggle="tab" onClick="changeTab();"><p>See Map</p></a>-->
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="span8">
                        <strong><p>Description</p></strong>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['eventDescription'];?>
</p>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="span8">
                        <strong><p>Further Info</p></strong>
                        <p><?php echo $_smarty_tpl->tpl_vars['details']->value['info'];?>
</p>
                    </div>
                </div>
                
                
            </div>
            <!--
            <div class="tab-pane" id="map">
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
        -->
            <div class="tab-pane" id="images">
                <?php if (count($_smarty_tpl->tpl_vars['details']->value['gallery'])<1){?>
                <p>Tidak ada Gallery</p>
                <?php }?>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <img class="image"
                    src="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" >
                <?php } ?>
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







    <div class="clear-float"></div>




	
<?php } ?>

<?php }else{ ?>
	<div class="section">
        <h1>Event tidak dapat ditemukan</h1>
    </div>
<?php }?>

<hr/>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>