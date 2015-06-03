<?php

namespace Segurex\SegurexBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DescargasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            // ->add('fecha')
            ->add('ruta', 'file')
            // ->add('contador')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Segurex\SegurexBundle\Entity\Descargas'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'segurex_segurexbundle_descargas';
    }
}
