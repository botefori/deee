<?php

namespace Hacco\DeeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company')
            ->add('contact')
            ->add('address')
            ->add('city')
            ->add('postalCode')
            ->add('phone')
            ->add('email')
            ->add('message')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hacco\DeeeBundle\Entity\Customers'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hacco_deeebundle_customers';
    }
}
