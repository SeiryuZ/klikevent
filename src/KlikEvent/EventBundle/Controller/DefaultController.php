<?php

namespace KlikEvent\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('KlikEventEventBundle:Default:index.html.twig', array('name' => $name));
    }

    public function templateAction($name = "default")
    {
        return $this->render('KlikEventEventBundle:Default:template.html.twig', array('name' => $name));
    }
}
