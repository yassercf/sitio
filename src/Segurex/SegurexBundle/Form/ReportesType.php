<?php

namespace Segurex\SegurexBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReportesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('inventario', 'number')
            ->add('telefono')
            ->add('correo', 'email', array(
                'required' => true,
                'label' => 'Correo'))
            ->add('equipo')
            ->add('detalles', 'textarea')
            // ->add('fecha', 'date', array(
            //     'widget' => 'single_text',Esto hace que se vea como un solo campo
            //     'format' => 'dd/MM/yyyy', 
            //     'required' => true
            //     ))
            ->add('area', 'entity', array(
                'class' => 'SegurexBundle:Areas',             
                'property' => 'denominacion'
                ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Segurex\SegurexBundle\Entity\Reportes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'segurex_segurexbundle_reportes';
    }
}
