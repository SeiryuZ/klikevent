<?php /* Smarty version Smarty-3.1.8, created on 2012-04-03 11:36:03
         compiled from "templates/events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2974408984f65eef0b88594-87840037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf25f041fa82f32d8ecd18cc5ec4e71054b8400d' => 
    array (
      0 => 'templates/events.tpl',
      1 => 1333423814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2974408984f65eef0b88594-87840037',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f65eef0c33308_38138700',
  'variables' => 
  array (
    'latestDate' => 0,
    'todayFriendlyDate' => 0,
    'categoryList' => 0,
    'category' => 0,
    'dateList' => 0,
    'date' => 0,
    'eventList' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f65eef0c33308_38138700')) {function content_4f65eef0c33308_38138700($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include '/Applications/XAMPP/xamppfiles/htdocs/meetpoint2/smarty/plugins/function.cycle.php';
?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Klikevent.com",'jquery'=>"true",'filter'=>"true",'loadmore'=>"true",'event'=>true), 0);?>


<input type="hidden" name="latestDate" id="latestDate" value="<?php echo $_smarty_tpl->tpl_vars['latestDate']->value;?>
">

<div class="page-header">
	<h1>Events on <a href="javascript:openCalendar();"><?php echo $_smarty_tpl->tpl_vars['todayFriendlyDate']->value;?>
</a></h1>
	<div class="row">
	<div  class="span4 offset4">
	<div id="calendar-div">
		<a class="close" href="javascript:closeCalendar();" >x</a>
	<div id="calendar" style="margin:10px auto 30px auto;  width:205px; height:230px; text-align: center">
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
function openCalendar()
{
	$('#calendar-div').show(100);
}

function closeCalendar()
{
	$('#calendar-div').hide(100);
}
closeCalendar();
g_globalObject = new JsDatePick({
			useMode:1,
			isStripped:true,
			target:"calendar",
			imgPath:"js/img/",
			

		});


g_globalObject.setOnSelectedDelegate(function(){
			var obj = g_globalObject.getSelectedDay();
			window.location="events.php?date="+obj.year+"-"+obj.month+"-"+obj.day;
		});

</script>

<div class="row add-bottom">
    <div class="span12">
    <div class="alert alert-info">
        <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
        <a href="#" onClick="filter('<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</a>&nbsp;&nbsp;&nbsp;
        <?php } ?>
    </div>
    </div>
</div> 

<div class="row add-bottom">
	<div class="span12" id="add-event">
		<div class="row add-bottom event-timetable">
			<div class="event-row-span12">

				<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 7+1 - (1) : 1-(7)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
				<div class="event-timetable-header-individual well text-center">
					<p><?php echo smarty_function_cycle(array('values'=>"Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu"),$_smarty_tpl);?>
</p>
				</div>
				<?php }} ?>
				
			</div>
		</div>
		<div class="row event-timetable add-bottom" >
			<div class="event-row-span span12 ">
		<?php  $_smarty_tpl->tpl_vars['date'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['date']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dateList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['date']->key => $_smarty_tpl->tpl_vars['date']->value){
$_smarty_tpl->tpl_vars['date']->_loop = true;
?>
			
			<div class="event-timetable-individual well text-left">
				<p><a class="btn-small btn-info" href="events-date.php?date=<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</a></p>
				<br/>
				<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventList']->value[$_smarty_tpl->tpl_vars['date']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
				<p class="smaller-font"><a href="event-details.php?id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
" class="<?php echo $_smarty_tpl->tpl_vars['event']->value['category'];?>
"><?php echo $_smarty_tpl->tpl_vars['event']->value['eventTitle'];?>
</a></p>
				<br/>
				<?php } ?>
			</div>

			
		<?php } ?>
			</div>
		<div class="clear-float"></div>
		</div>
	</div>
</div>

<div class="row add-bottom">
	<div class="span12">
		<button class="button large blue center" onClick="loadMore(document.getElementById('latestDate').value);"><span>Load More</span></button>
	</div>
</div>



<hr/>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>