<?php

namespace Hacco\DeeeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DevisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customer', new CustomersType())
            ->add('materiels', 'entity',
                  array('class'=>'HaccoDeeeBundle:Materiels',
                        'property'=>'Desingation',
                        'multiple'=>true,
                        'expanded'=>true))
            ->add('devismaterielsDevis', 'entity',
                  array('class'=>'HaccoDeeeBundle:devisMateriels',
                        'property'=>'$amount',
                        'multiple'=>true,
                        'expanded'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Hacco\DeeeBundle\Entity\Devis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hacco_deeebundle_devis';
    }
}
