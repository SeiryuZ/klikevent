<?php

namespace KlikEvent\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EventType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('eventTitle')
            ->add('eventLocation1')
            ->add('eventLocation2')
            ->add('eventShortDescription')
            ->add('eventDescription')
            ->add('eventFurtherDescription')
            ->add('eventDateTimeBegin')
            ->add('eventDateTimeEnd')
            ->add('eventCoverImage')
            ->add('eventImages')
            ->add('eventVideos')
            ->add('isHot')
            ->add('isPublished')
            ->add('viewCount')
            ->add('timestamp')
            ->add('eventCategories')
        ;
    }

    public function getName()
    {
        return 'klikevent_eventbundle_eventtype';
    }
}
