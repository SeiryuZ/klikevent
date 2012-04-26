<?php

namespace KlikEvent\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class FeedbackType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fromName')
            ->add('fromEmail')
            ->add('content')
        ;
    }

    public function getDefaultOptions ( array $options )
    {
        return array (
            'data_class'=>'KlikEvent\EventBundle\Entity\Feedback',
            );
    }

    public function getName()
    {
        return 'klikevent_eventbundle_categorytype';
    }
}
