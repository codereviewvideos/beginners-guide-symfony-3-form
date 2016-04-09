<?php

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormExampleController extends Controller
{
    /**
     * @Route("/", name="list")
     */
    public function listAction()
    {
    }
}