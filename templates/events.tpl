{* Smarty *}

{include file="header.tpl" title="Klikevent.com" jquery="true" filter="true" loadmore="true" event=true}

<input type="hidden" name="latestDate" id="latestDate" value="{$latestDate}">

<div class="page-header">
	<h1>Events on <a href="javascript:openCalendar();">{$todayFriendlyDate}</a></h1>
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
        {foreach $categoryList as $category}
        <a href="#" onClick="filter('{$category}')">{$category}</a>&nbsp;&nbsp;&nbsp;
        {/foreach}
    </div>
    </div>
</div> 

<div class="row add-bottom">
	<div class="span12" id="add-event">
		<div class="row add-bottom event-timetable">
			<div class="event-row-span12">

				{for $foo=1 to 7}
				<div class="event-timetable-header-individual well text-center">
					<p>{cycle values="Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu"}</p>
				</div>
				{/for}
				
			</div>
		</div>
		<div class="row event-timetable add-bottom" >
			<div class="event-row-span span12 ">
		{foreach from=$dateList item=date name=dates}
			
			<div class="event-timetable-individual well text-left">
				<p><a class="btn-small btn-info" href="events-date.php?date={$date}">{$date}</a></p>
				<br/>
				{foreach $eventList[$date] as $event}
				<p class="smaller-font"><a href="event-details.php?id={$event.id}" class="{$event.category}">{$event.eventTitle}</a></p>
				<br/>
				{/foreach}
			</div>

			
		{/foreach}
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

{include file="footer.tpl"}
