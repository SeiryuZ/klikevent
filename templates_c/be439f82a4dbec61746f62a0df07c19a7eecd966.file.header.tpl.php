<?php /* Smarty version Smarty-3.1.8, created on 2012-04-03 09:13:25
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6500191794f65e4eaacc8e2-48896163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1333444402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6500191794f65e4eaacc8e2-48896163',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4f65e4eaae3371_36675463',
  'variables' => 
  array (
    'jquery' => 0,
    'socialmedia' => 0,
    'filter' => 0,
    'categoryList' => 0,
    'category' => 0,
    'loadmore' => 0,
    'title' => 0,
    'index' => 0,
    'todayEvent' => 0,
    'event' => 0,
    'tips' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f65e4eaae3371_36675463')) {function content_4f65e4eaae3371_36675463($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="robots" content="noindex,nofollow"/>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="external.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <?php if ($_smarty_tpl->tpl_vars['jquery']->value){?>
    <script type="text/javascript" src="js/jquery.js"></script>
    
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script type="text/javascript" src="js/jsDatePick.jquery.min.1.3.js"></script>


    <?php }?>

<?php if ($_smarty_tpl->tpl_vars['socialmedia']->value){?>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
stLight.options(
    {
        {publisher: "ur-e8a0fa02-cfcb-5919-d547-808797cc699"}
    }
    );
</script>

<?php }?>

    <?php if ($_smarty_tpl->tpl_vars['filter']->value){?>    
    <script type="text/javascript">
    
    var categoryList = new Array();
    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
    categoryList["<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
"] = true;
    <?php } ?>

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
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['loadmore']->value){?>
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
    <?php }?>
    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "Klikevent.com" : $tmp);?>
</title>
</head>
<body> 

<!--FACEBOOK SCRIPT BEGIN-->

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=186996938017645";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
          <li class="add-border-left <?php if ($_smarty_tpl->tpl_vars['index']->value){?> class=active <?php }?>"><a href="hot-event.php" title="View the Hottest Event around!"><i class="icon-home icon-white "></i>Hot Event</a></li>
          <li class="add-border-left <?php if ($_smarty_tpl->tpl_vars['todayEvent']->value){?> active <?php }?>"><a href="todays-event.php" >Today's Event</a></li>
          <!--
          <li class="add-border-left <?php if ($_smarty_tpl->tpl_vars['event']->value){?> active<?php }?>"><a href="events.php">Event Calendar</a></li>-->
          <li class="add-border-left  <?php if ($_smarty_tpl->tpl_vars['tips']->value){?> active <?php }?>"><a id="nav" href="tips.php" title="Got information regarding events? Contact Us!" >Tips</a></li>
          <li class="add-border-left add-border-right <?php if ($_smarty_tpl->tpl_vars['tips']->value){?> active <?php }?>"><a id="nav" href="subscribe.php" title="Subscribe to Us!" >Subscribe</a></li>
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
<div class="container">
<?php }} ?>