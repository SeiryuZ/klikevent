<?php

namespace KlikEvent\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Query\ResultSetMapping;

use KlikEvent\EventBundle\Entity\Subscriber;
use KlikEvent\EventBundle\Entity\Event;
use KlikEvent\EventBundle\Entity\Category;

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

/***HOT START***/
    public function showHotAction( Request $request )
    {
        $repository = $this->getDoctrine()->getRepository('KlikEventEventBundle:Event');
        
        $events = $repository->findBy(
            array('isHot' => '1'),
            array('viewCount' => 'DESC')
        );

    return $this->render('KlikEventEventBundle:Default:hot_event.html.twig', array('events' => $events, 'pageTitle'=>'Hot Events'));
    }
/***HOT START***/


/***Today START***/

//TODO Optimization of getting next and previous dates
//TODO checking if given date and month is incorrect
    public function showEventByDateAction( Request $request,  $date = 0 , $month = 0 , $year = 0 )
    {



        $today = date ('Y-m-d ');


        if ( $date != 0 && $month != 0 && $year != 0 )
            $today = date( 'Y-m-d', strtotime( $year."-".$month."-".$date ) );

        //$next = $this->addIntervalToDate( $today ,"Y-m-d", 1);
        //$prev = $this->addIntervalToDate( $today ,"Y-m-d", -1);

        $repository = $this->getDoctrine()->getRepository('KlikEventEventBundle:Event');
        $qb = $repository->createQueryBuilder('e');

        $qb
            ->innerJoin('e.eventTimes' , 't', 'WITH', 'e.id =  t.event' )
            ->where($qb->expr()->like('t.begin' , '?1' ))
            ->orderBy('e.viewCount')
            ->setParameter( 1, $today."%" );
        $events = $qb->getQuery()->getResult();

        return $this->render('KlikEventEventBundle:Default:list_event.html.twig', 
            array(
                'events' => $events, 
                'pageTitle'=>'Events ', 
                'date'=> $today,
                'nextDate'=> $this->addIntervalToDate( $today ,"d", 1),
                'nextMonth'=> $this->addIntervalToDate( $today ,"m", 1),
                'nextYear'=> $this->addIntervalToDate( $today ,"Y", 1),
                'prevDate'=>$this->addIntervalToDate( $today ,"d", -1),
                'prevMonth'=>$this->addIntervalToDate( $today ,"m", -1),
                'prevYear'=>$this->addIntervalToDate( $today ,"Y", -1)
                ));
    }
/***Today START***/


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



    private function addIntervalToDate ($d ="", $format="Y-m-d", $interval )
    {
        if ($d =="") 
            $d=date("Y-m-d");
        return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))+$interval, date('Y',strtotime($d)) ));
    }


}
