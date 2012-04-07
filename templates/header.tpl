<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex,nofollow"/>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="external.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    {if $jquery}
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script type="text/javascript" src="js/jsDatePick.jquery.min.1.3.js"></script>


    {/if}

{if $socialmedia}
{literal}
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
stLight.options(
    {
        {publisher: "ur-e8a0fa02-cfcb-5919-d547-808797cc699"}
    }
    );
</script>
{/literal}
{/if}

    {if $filter}    
    <script type="text/javascript">
    
    var categoryList = new Array();
    {foreach $categoryList as $category}
    categoryList["{$category}"] = true;
    {/foreach}

    function filter( categoryName )
    {
        if ( categoryList[categoryName] )
        {
            $('.'+categoryName).hide(200);
            categoryList[categoryName]= false;
        }   
        else
        {
            $('.'+categoryName).show(200);
            categoryList[categoryName]= true;
        }
    }
    </script>
    {/if}
    {if $loadmore}
    <script type="text/javascript">

    var isLoading = false;

  

    function loadMore( latestDate )
    {
        if ( ! isLoading )
        $.ajax({  
            type: "POST",
            url: 'loadMore.php', 
            async: "true",
            data: "latestDate="+latestDate,  
            complete: function(data){  
                    //print results as appended   
                    //alert (data.responseText);  
                    //print result in targetDiv  
                    //targetDiv.html(data.responseText);
                    target = document.getElementById('add-event')

                    result = data.responseText.split('#');

                    document.getElementById('latestDate').value= result[0];
                    //alert (data.responseText);
                    target.innerHTML = target.innerHTML+ result[1];
                    
                    isLoading = false;
                }  
            }); 
    }
    </script>
    {/if}
    <title>{$title|default:"Klikevent.com"}</title>
</head>
<body> 

<!--FACEBOOK SCRIPT BEGIN-->
{literal}
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=186996938017645";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
{/literal}
<!--FACEBOOK SCRIPT END-->

<!-- NAVBAR ELEMENTS -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
      <a class="brand" href="index.php">KlikEvent</a>
      <span class="divider"></span>
      
      <div class="nav-collapse">
        <ul class="nav">
          <li class="add-border-left {if $index} active {/if}"><a href="hot-event.php" title="View the Hottest Event around!"><i class="icon-home icon-white "></i>Hot Event</a></li>
          <li class="add-border-left {if $todayEvent} active {/if}"><a href="todays-event.php" >Today's Event</a></li>
          <!--
          <li class="add-border-left {if $event} active{/if}"><a href="events.php">Event Calendar</a></li>-->
          <li class="add-border-left  {if $tips} active {/if}"><a id="nav" href="tips.php" title="Got information regarding events? Contact Us!" >Tips</a></li>
          <li class="add-border-left add-border-right {if $subscribe} active {/if}"><a id="nav" href="subscribe.php" title="Subscribe to Us!" >Subscribe</a></li>
        </ul>
        <ul class="nav pull-right">
        <li class="dropdown ">
            <a href="#"
                class="dropdown-toggle"
                data-toggle="dropdown">
                Jakarta
            <b class=" caret caret-custom"></b>
            </a>
            <ul class="dropdown-menu">
                <li class="active"><a href="#">Jakarta</a></li>
                <li><a href="#">Kota Lain</a></li>
            </ul>
        </li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
  </div><!-- /.navbar-inner -->
</div><!-- /.navbar -->

<!-- STARTING CONTAINER -->
<div class="container main-container">
