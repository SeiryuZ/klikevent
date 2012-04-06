{* Smarty *}

{include file="header.tpl" title="Klikevent.com" jquery="true" filter="true" todayEvent=true }


<div class="section page-header">
    <h1> Events Dengan Kategori {$filter} </h1>
    <div class="row">
    </div>
</div>
 
 <div class="row add-bottom">
    <div class="span12">
    <div class="alert alert-info">
        {foreach $categoryList as $category}
        <a href="#" onClick="filter('{$category}')">{$category}</a>&nbsp;&nbsp;&nbsp;
        {/foreach}
    </div>
    </div>
</div> 
{if $isFound}
{foreach from=$eventItems item=item name=events}
<div class="row {$item.category}">
    <div class="span12">
        <span class="page-header left">
            <a href="http://www.klikevent.com/event-details.php?id={$item.id}" class="no-style-link">
            <h1 class=" add-bottom ">{$item.eventTitle}</h1></span>
            </a>
        <div class="row">
            <div class="span6">
                <div class="row"><img class="image"
                    src="{$item.eventCoverImage}"></div>
                <div class="row"></div>
            </div>
            <div class="span6">
                <div class="row">
                    <h3 class="description">{literal}[{/literal} {$item.eventDate} {literal}] {/literal}{$item.eventShortDescription}</h3>
                </div>
                <div class="row text-center add-top">
            
<div class="span6" style="">
<span class='st_facebook_hcount' st_url="http://www.klikevent.com/event-details.php?id={$item.id}" st_title="{$item.eventTitle}" displayText='Facebook'></span>
<span class='st_twitter_hcount' st_url="http://www.klikevent.com/event-details.php?id={$item.id}" st_title="{$item.eventTitle} via @StvnOnly #KlikEvent" displayText='Tweet'></span>
<span class='st_pinterest_hcount' st_url="http://www.klikevent.com/event-details.php?id={$item.id}" st_title="{$item.eventTitle}" displayText='Pinterest'></span>
</div>
                </div>
                <div class="row add-top text-right">
                <div class="span6">
                <a href="event-details.php?id={$item.id}">
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

                      

{/foreach}

{else}

<div class="section add-min-height">
        <h1>Tidak ada event, Kalau ada informasi beri kami <a href="tips.php">tip</a>.</h1>
    </div>
    <hr/>
{/if}



{include file="footer.tpl"}
