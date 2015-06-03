<?php

namespace Segurex\SegurexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Segurex\SegurexBundle\Entity\Descargas;


class DefaultController extends Controller
{
    public function indexAction()
    {       
        /**
            $titulares: Contiene los 6 ultimos titulares marcados como ESPECIAL en la Base de Datos de articulos.
        */
        $titulares = array(
            't1' => "Las bases estratégicas de la informatización cubana", 
            't2' => "Vulnerabilidad en Drupal deja a millones de sitios web en peligro",
            't3' => "GHOST: Grave vulnerabilidad en sistemas Linux",
            't4' => "Circula por la Red Nacional el programa maligno Win32.Onion.",
            't5' => "Vulnerabilidad SuperFish en portátiles Lenovo",
            't6' => "Graves vulnerabilidades en WordPress",);
        /**
            $entitiesD: Lista de archivos de Descargas.
        */
        $em = $this->getDoctrine()->getManager();
        $entitiesD = $em->getRepository('SegurexBundle:Descargas')->findAll();


            return $this->render('SegurexBundle:Default:index.html.twig', array(
                'titulares' => $titulares, 
                'entitiesD' => $entitiesD
                ));
        }

    public function errorAction()
    {    	    	   	
        return $this->render('SegurexBundle:Default:404.html.twig');
    }


}
