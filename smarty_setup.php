<?php

//load smarty library 
require('smarty/Smarty.class.php');


class MySmarty extends Smarty {

    function __construct()
    {
        /*to avoid
        Fatal error: Call to a member function createTemplate() on a non-object in smarty_internal
        Need to call the parent construct
        */
        parent::__construct();        

        //construct some default variable
        $this->setTemplateDir ('templates/');
        $this->setCompileDir  ('templates_c/');
        $this->setConfigDir   ('configs/');
        $this->setCacheDir    ('cache/');

        /*set cache true in production, off for development
        comment this for specific display caching only
        kalo ini nge construct cache ke smua object smarty
        */
        $this->caching = Smarty::CACHING_OFF;
    }

}
?>
