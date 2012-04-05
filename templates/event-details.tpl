{* Smarty *}

{include file="header.tpl" title="Klikevent.com" socialmedia=true jquery=true }

{if $isFound}

{foreach $eventDetails as $details}

<div class="row">
    <div class="span12">
        <h1>{$details.eventTitle}</h1>
    </div>
</div>


<div class="row ">
    <div class="span12 ">
        <div class="tabbable ">
            <ul class="nav nav-tabs">
                <li class="active other "><a href="#overview" data-toggle="tab">Overview</a></li>
                <li class="map "><a href="#map" data-toggle="tab">Map</a></li>
                <li class="other "><a href="#images" data-toggle="tab">Images</a></li>
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
            <img src="{$details.eventCoverImage}" class="image">
            </a>
            </div>
        </div>
        <div class="row">
            <div class="span4 text-center">
                <span class='st_facebook_hcount' st_url="http://www.klikevent.com/event-details.php?id={$item.id}" st_title="{$item.eventTitle}" displayText='Facebook'></span>
                <span class='st_twitter_hcount' st_url="http://www.klikevent.com/event-details.php?id={$item.id}" st_title="{$item.eventTitle} via @StvnOnly #KlikEvent" displayText='Tweet'></span>
                <span class='st_pinterest_hcount' st_url="http://www.klikevent.com/event-details.php?id={$item.id}" st_title="{$item.eventTitle}" displayText='Pinterest'></span>
            </div>
        </div>
    </div>
    <div class="span8 ">
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="row">
                    <div class="span8">
                        <strong><p>Tanggal: </p></strong>
                        <p>{$details.eventDate}</p>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="span8">
                        <strong><p>Location</p></strong>
                        <p>{$item.location1}</p>
                        <p>{$item.location2}</p>
                        <p></p>
                        <a href="#map" data-toggle="tab" onClick="changeTab();"><p>See Map</p></a>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="span8">
                        <strong><p>Description</p></strong>
                        <p>{$details.eventDescription}</p>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="span8">
                        <strong><p>Further Info</p></strong>
                        <p></p>
                    </div>
                </div>
                
                
            </div>
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
                    <img src="{$details.eventCoverImage}">
                    </div>
</div>







    <div class="clear-float"></div>




	
{/foreach}

{else}
	<div class="section">
        <h1>Event tidak dapat ditemukan</h1>
    </div>
{/if}

<hr/>
{include file="footer.tpl"}