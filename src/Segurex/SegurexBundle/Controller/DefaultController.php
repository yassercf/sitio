<?php

namespace Segurex\SegurexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SegurexBundle:Default:index.html.twig');
    }
}
