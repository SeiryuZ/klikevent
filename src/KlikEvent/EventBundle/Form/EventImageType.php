<?php

namespace KlikEvent\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EventImageType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('file', 'file')
        ;
    }

    // public function getDefaultOptions ( array $options )
    // {
    //     $options [ "validation_constraint"] = new \Symfony\Component\Validator\Constraints\Image();
    //     return $options;
    // }

    public function getName()
    {
        return 'klikevent_eventbundle_eventimagetype';
    }
}
