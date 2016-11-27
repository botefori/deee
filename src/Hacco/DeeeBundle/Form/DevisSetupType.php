<?php

namespace Hacco\DeeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DevisSetupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uc')
            ->add('ecran15a17pouces')
            ->add('ecran19a21pouces')
            ->add('ordinateurportable')
            ->add('phoneportable')
            ->add('photocopieurmoins70kg')
            ->add('photocopieurplus70kg')
            ->add('imprimante')
            ->add('serveurs')
            ->add('onduleurs')
            ->add('peripheriques')
            ->add('piecesdetacheespoids')
            ->add('autresproduitsapreciser')
            ->add('customer', new CustomersType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hacco\DeeeBundle\Entity\DevisSetup'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hacco_deeebundle_devissetup';
    }
}
