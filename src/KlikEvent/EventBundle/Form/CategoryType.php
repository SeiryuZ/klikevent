<?php

namespace KlikEvent\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('categoryName')
            ->add('categoryDescription')
        ;
    }

    public function getDefaultOptions ( array $options )
    {
        return array (
            'data_class'=>'KlikEvent\EventBundle\Entity\Category',
            );
    }

    public function getName()
    {
        return 'klikevent_eventbundle_categorytype';
    }
}
