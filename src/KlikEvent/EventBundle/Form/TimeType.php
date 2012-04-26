<?php

namespace KlikEvent\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TimeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('begin')
            ->add('end')
        ;
    }

    public function getDefaultOptions ( array $options )
    {
        return array (
            'data_class'=>'KlikEvent\EventBundle\Entity\Time',
            );
    }

    public function getName()
    {
        return 'klikevent_eventbundle_timetype';
    }
}
