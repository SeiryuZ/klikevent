<?php

namespace KlikEvent\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use KlikEvent\EventBundle\Form\FeedbackType;
use KlikEvent\EventBundle\Form\CategoryType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('feedback' , new FeedbackType() )
            ->add('eventTitle')
            ->add('eventLocation1')
            ->add('eventLocation2')
            ->add('eventShortDescription')
            ->add('eventDescription')
            ->add('eventFurtherDescription')
            ->add('eventCoverImage')
            ->add('eventImages')
            ->add('eventVideos')
            ->add('eventCategories', new CategoryType())


        ;
    }

    public function getName()
    {
        return 'klikevent_eventbundle_eventtype';
    }
}
