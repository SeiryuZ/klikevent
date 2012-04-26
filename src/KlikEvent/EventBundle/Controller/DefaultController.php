<?php

namespace KlikEvent\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Query\ResultSetMapping;

use KlikEvent\EventBundle\Entity\Subscriber;
use KlikEvent\EventBundle\Entity\Event;
use KlikEvent\EventBundle\Entity\Category;
use KlikEvent\EventBundle\Entity\Feedback;
use KlikEvent\EventBundle\Entity\Time;

use KlikEvent\EventBundle\Form\SubscribeType;
use KlikEvent\EventBundle\Form\FeedbackType;
use KlikEvent\EventBundle\Form\EventType;
use KlikEvent\EventBundle\Form\TimeType;

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
//TODO checking if given date and month is incorrect
    public function showEventByDateAction( Request $request,  $date = 0 , $month = 0 , $year = 0 )
    {

        $today = date ('Y-m-d ');


        if ( $date != 0 && $month != 0 && $year != 0 )
            $today = date( 'Y-m-d', strtotime( $year."-".$month."-".$date ) );


        //get the unix representation of time for next and prev date
        $next = strtotime ( $this->addIntervalToDate( $today ,"Y-m-d", 1) );
        $prev = strtotime ( $this->addIntervalToDate( $today ,"Y-m-d", -1) );


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
                'nextDate'=> date('d', $next),
                'nextMonth'=> date('m', $next),
                'nextYear'=>date('Y', $next),
                'prevDate'=>date('d', $prev),
                'prevMonth'=>date('m', $prev),
                'prevYear'=>date('Y', $prev)
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

                $this->get('session')->setFlash('notice-ok', 'Email anda sudah dimasukan ke database kami. Terima Kasih');

                $subscriber = new Subscriber();

                $form = $this->createForm(new SubscribeType(), $subscriber);

                return $this->render ('KlikEventEventBundle:Default:subscribe.html.twig', array('form' => $form->createView()) );
            }
            else
            {
                $this->get('session')->setFlash('notice-error', 'Email anda tidak valid. Coba sekali lagi');


                return $this->render ('KlikEventEventBundle:Default:subscribe.html.twig', array('form' => $form->createView()) );
            }
        }
        return $this->render ('KlikEventEventBundle:Default:subscribe.html.twig', array('form' => $form->createView()) );
    }

/***SUBSCRIBE END***/

/***tips START***/
    public function defaultFeedbackAction( Request $request )
    {
        $feedback_web = new Feedback();
        $feedback_event_anon = new Feedback();
        $feedback_event_owner = new Event();

        $form_web = $this->createForm(new FeedbackType(), $feedback_web);
        $form_event_anon = $this->createForm(new FeedbackType(), $feedback_event_anon);
        $form_event_owner = $this->createForm(new EventType(), $feedback_event_owner);


        if ($request->getMethod() == 'POST') {
            
            $form_web->bindRequest($request);

            if ($form_web->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($feedback_web);
                $em->flush();
                
                $this->get('session')->setFlash('notice-ok', 'Terima kasih untuk feedback');

                $feedback_web = new Feedback();
                $form_web = $this->createForm(new FeedbackType(), $feedback_web);
        
                return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
                array(
                    'form_web' => $form_web->createView(),
                    'form_event_anon' => $form_event_anon->createView(),
                    'form_event_owner' => $form_event_owner->createView(),
                    'feedback' => true
                    ) 

                );
            }
            else
            {
                $this->get('session')->setFlash('notice-error', 'Maaf, Ada error. Coba lagi');
                return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
                array(
                    'form_web' => $form_web->createView(),
                    'form_event_anon' => $form_event_anon->createView(),
                    'form_event_owner' => $form_event_owner->createView(),
                    'feedback' => true
                    ) 

            );
            }

        }
        return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
        array(
            'form_web' => $form_web->createView(),
            'form_event_anon' => $form_event_anon->createView(),
            'form_event_owner' => $form_event_owner->createView(),
            'feedback' => true
            ) 
        );
    }

    public function defaultTipsAction( Request $request )
    {
        $feedback_web = new Feedback();
        $feedback_event_anon = new Feedback();
        $feedback_event_owner = new Event();

        $form_web = $this->createForm(new FeedbackType(), $feedback_web);
        $form_event_anon = $this->createForm(new FeedbackType(), $feedback_event_anon);
        $form_event_owner = $this->createForm(new EventType(), $feedback_event_owner);



        if ($request->getMethod() == 'POST') {
            
            $form_event_anon->bindRequest($request);

            if ($form_event_anon->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($feedback_event_anon);
                $em->flush();

                $this->get('session')->setFlash('tips-notice-ok', 'Terima kasih untuk tips');

                $feedback_event_anon = new Feedback();
                $form_event_anon = $this->createForm(new FeedbackType(), $feedback_web);
        
                return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
                array(
                    'form_web' => $form_web->createView(),
                    'form_event_anon' => $form_event_anon->createView(),
                    'form_event_owner' => $form_event_owner->createView(),
                    'tips_anon' => true
                    ) 

                );
            }
            else
            {
                $this->get('session')->setFlash('tips-notice-error', 'Maaf, Ada error. Coba lagi');
                return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
                array(
                    'form_web' => $form_web->createView(),
                    'form_event_anon' => $form_event_anon->createView(),
                    'form_event_owner' => $form_event_owner->createView(),
                    'tips_anon' => true
                    ) 

            );
            }

        }
        return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
        array(
            'form_web' => $form_web->createView(),
            'form_event_anon' => $form_event_anon->createView(),
            'form_event_owner' => $form_event_owner->createView(),
            'tips_anon' => true
            )
        ); 


    }

    // public function defaultTipsEventOwnerAction( Request $request )
    // {
    //     $feedback_event_owner = new Event();

    //     $form_event_owner = $this->createForm(new FeedbackType(), $feedback_event_owner);

    //     return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
    //     array(
    //         'form_web' => $form_web->createView(),
    //         'form_event_owner' => $form_event_owner->createView(),
    //         'tips_anon' => true
    //         )
    //     );    
    // }

/***tips END***/




/* Utility Functions */
    private function addIntervalToDate ($d ="", $format="Y-m-d", $interval )
    {
        if ($d =="") 
            $d=date("Y-m-d");
        return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))+$interval, date('Y',strtotime($d)) ));
    }


}
