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

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

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

/***event Details START***/
    public function showEventDetailsAction( Request $request, $id )
    {



        $repository = $this->getDoctrine()->getRepository('KlikEventEventBundle:Event');
        $event = $repository->find($id);
        
        $imagesPath = $event->getEventImages();

        if ( ! empty ( $imagesPath) )
        {
            
            //split string by separator
            $imagesPathArr = explode(":", $imagesPath );

            //set the paths
            $event->setEventImagesPath ( $imagesPathArr );
        }


        if (!$event) {
        throw $this->createNotFoundException('No event found for id '.$id);
        }

    return $this->render('KlikEventEventBundle:Default:event_details.html.twig', array('event' => $event, 'pageTitle'=>$event->getEventTitle()));
    }
/***event Details START***/


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


/***Categories START***/
    public function showEventByCategoryAction( Request $request, $category )
    {

        $today = new \DateTime("now");
        $repository = $this->getDoctrine()->getRepository('KlikEventEventBundle:Event');
        $qb = $repository->createQueryBuilder('e');

        $qb 
            ->innerJoin('e.eventTimes' , 't', 'WITH', 'e.id =  t.event' )
            ->innerJoin('e.eventCategories', 'c', 'WITH', 'c.categoryName = :category')
            ->where('t.end  >  :today' )
            //->andWhere ('e.eventCategories = :category')
            ->orderBy('e.viewCount')
            ->setParameter( 'today', $today )
            ->setParameter( 'category', $category);
        $events = $qb->getQuery()->getResult();

    return $this->render('KlikEventEventBundle:Default:hot_event.html.twig', array('events' => $events, 'pageTitle'=>'Events'));
    }
/***Categories START***/


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

    public function subscribeFooterAction( Request $request )
    {
        $subscriber = new Subscriber();

        $form = $this->createForm(new SubscribeType(), $subscriber);
        

         if ($request->getMethod() == 'POST') {
            
            //get all request
            $data = $this->get('request')->request->all();

            //get the email
            $email = $data["email"];

            //
            $collectionConstraints = new Collection(
                    array(
                       
                        'email' => array ( new Email (), new NotBlank() )
                        )
                    );

            $errorList = $this->get('validator')->validateValue($data,$collectionConstraints);
                       
                    
            //no error
            if (count ( $errorList ) == 0) {

                $subscriber->setEmail ($email);
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

        $time = new Time();
        $feedback_event_owner->addTime($time);

        $form_web = $this->createForm(new FeedbackType(), $feedback_web);
        $form_event_anon = $this->createForm(new FeedbackType(), $feedback_event_anon);
        $form_event_owner = $this->createForm(new EventType(), $feedback_event_owner);


        if ($request->getMethod() == 'POST') {
            
            $form_web->bindRequest($request);

            if ($form_web->isValid()) {

                foreach ( $feedback_event_owner->getEventTimes() as $times )
                {
                    $times->setEvent($feedback_event_owner);
                }

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
        
        $time = new Time();
        $feedback_event_owner->addTime($time);

        $form_web = $this->createForm(new FeedbackType(), $feedback_web);
        $form_event_anon = $this->createForm(new FeedbackType(), $feedback_event_anon);
        $form_event_owner = $this->createForm(new EventType(), $feedback_event_owner);



        if ($request->getMethod() == 'POST') {
            
            $form_event_anon->bindRequest($request);

            if ($form_event_anon->isValid()) {
                
                foreach ( $feedback_event_owner->getEventTimes() as $times )
                {
                    $times->setEvent($feedback_event_owner);
                }

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($feedback_event_anon);
                $em->flush();

                $this->get('session')->setFlash('notice-ok', 'Terima kasih untuk tips');

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
                $this->get('session')->setFlash('notice-error', 'Maaf, Ada error. Coba lagi');
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
    public function defaultTipsEventOwnerAction( Request $request )
    {
        $feedback_web = new Feedback();
        $feedback_event_anon = new Feedback();
        $feedback_event_owner = new Event();
        

        $time = new Time();
        $feedback_event_owner->addTime($time);

        $form_web = $this->createForm(new FeedbackType(), $feedback_web);
        $form_event_anon = $this->createForm(new FeedbackType(), $feedback_event_anon);
        $form_event_owner = $this->createForm(new EventType(), $feedback_event_owner);


        $imageConstraint = new \Symfony\Component\Validator\Constraints\Image();



        if ($request->getMethod() == 'POST') {
            

            $form_event_owner->bindRequest($request);

            $data = $form_event_owner->getData();


            //get the image
            $eventImages = $form_event_owner->get('eventImages')->getData();


            $errorList = array();

            //validate each image
            foreach ( $eventImages as $image  )
            {
                $errorList = $this->get('validator')->validateValue($image["file"], $imageConstraint);
                
            }
           
      
         
            if ($form_event_owner->isValid() && count ( $errorList ) == 0 ) {
                

                //generate unique identification
                $uid = md5($feedback_event_owner->getEventTitle().date('Y-m-d H:m:s'));

                //move Cover Image
                $feedback_event_owner->setEventCoverImage ( $this->moveFile  ( $feedback_event_owner->getEventCoverImage() , $uid ) );

                // move Each Images uploaded
                $otherImages = "";

                $count = 0;

                
                foreach ( $eventImages as $image  )
                {   
                    //append : if not the first element
                    if ( $count >  0)
                        $otherImages .=":";

                    //append the imagefile name
                    $otherImages .= $this->moveFile( $image ["file"] , $uid);
                    
                    //add counter
                    $count++;
                }

                $feedback_event_owner->setEventImages($otherImages);

                foreach ( $feedback_event_owner->getEventTimes() as $times )
                {
                    $times->setEvent($feedback_event_owner);
                }
    
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($feedback_event_owner);
                $em->flush();

                $this->get('session')->setFlash('notice-ok', 'Terima kasih untuk tips');

                $feedback_event_owner = new Event();
                $form_event_owner = $this->createForm(new EventType(), $feedback_event_owner);
        
                return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
                array(
                    'form_web' => $form_web->createView(),
                    'form_event_anon' => $form_event_anon->createView(),
                    'form_event_owner' => $form_event_owner->createView(),
                    'tips_event_owner' => true
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
                    'tips_event_owner' => true
                    ) 

            );
            }

        }
        return $this->render ('KlikEventEventBundle:Default:tips.html.twig', 
        array(
            'form_web' => $form_web->createView(),
            'form_event_anon' => $form_event_anon->createView(),
            'form_event_owner' => $form_event_owner->createView(),
            'tips_event_owner' => true
            )
        ); 


    }


/***tips END***/




/* Utility Functions */
    private function addIntervalToDate ($d ="", $format="Y-m-d", $interval )
    {
        if ($d =="") 
            $d=date("Y-m-d");
        return date($format, mktime(0,0,0,date('m',strtotime($d)), date('d',strtotime($d))+$interval, date('Y',strtotime($d)) ));
    }




    private function moveFile ( $file, $uid )
    {
        $basePath = __DIR__.'/../../../../web/';
        $uploadDir = "images/";

        //create target path
        $targetPath = $basePath.$uploadDir.$uid;


        ///move file
        $file->move($targetPath, $file->getClientOriginalName());


        //get new File Path
        $newFilePath = $uploadDir.$uid."/".$file->getClientOriginalName();

        //clean file
        $file = null;

        return $newFilePath;
    }


}
