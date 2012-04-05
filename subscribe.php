<?php
	require ('smarty_setup.php');
	$smarty = new MySmarty();

	if ( !$smarty->isCached('subscribe.tpl') )
	{

	}
	$smarty->assign('res',$_GET['res']);
	$smarty->display('subscribe.tpl');
?>
