{* Smarty *}

{include file="header.tpl" title="Klikevent.com" jquery="true" index=true socialmedia=true}
<div class="add-min-height">


{* Iterate each hot item to be shown *}
{foreach from=$hotItems item=item name=events}
<div class="row">
    <div class="span12">
        <span class="page-header {cycle values="left, aaa"}">
            <a href="http://www.klikevent.com/event-details.php?id={$item.id}" class="no-style-link">
            <h1 class=" add-bottom ">{$item.eventTitle}</h1></a></span>
            
        <div class="row">
            <div class="span6">
                <img class="image"
                    src="{$item.eventCoverImage}" >
                
                
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
                <div class="row add-top">
              
                    <div class="span6  text-right">
                <a href="event-details.php?id={$item.id}">
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
{/foreach}




{include file="footer.tpl"}
