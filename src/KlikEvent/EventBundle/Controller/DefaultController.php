<?php

namespace KlikEvent\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use KlikEvent\EventBundle\Entity\Subscriber;

use KlikEvent\EventBundle\Form\SubscribeType;

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


/***SUBSCRIBE START***/
    public function subscribeAction( Request $request )
    {
        $subscriber = new Subscriber();

        $form = $this->createForm(new SubscribeType(), $subscriber);

         if ($request->getMethod() == 'POST') {
            
            $form->bindRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($subscriber);
                $em->flush();

                $this->get('session')->setFlash('subscribe-notice-ok', 'Email anda sudah dimasukan ke database kami. Terima Kasih');

                $subscriber = new Subscriber();

                $form = $this->createForm(new SubscribeType(), $subscriber);

                return $this->render ('KlikEventEventBundle:Default:subscribe.html.twig', array('form' => $form->createView()) );
            }
            else
            {
                $this->get('session')->setFlash('subscribe-notice-error', 'Email anda tidak valid. Coba sekali lagi');


                return $this->render ('KlikEventEventBundle:Default:subscribe.html.twig', array('form' => $form->createView()) );
            }
        }
        return $this->render ('KlikEventEventBundle:Default:subscribe.html.twig', array('form' => $form->createView()) );
    }

/***SUBSCRIBE END***/
}
