<?php

namespace MyappBundle\Controller;

use MyappBundle\Form\Type\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyappBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    public function indexAction(Request $request)
    {
        $user = new Users();

        $form = $this->createForm(new RegisterType($user), array(
                'action' => $this->generateUrl('myapp_register'),
                'method' => 'POST'
            ));

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('myapp_homepage'));
        }

        return $this->render('MyappBundle:Default:register.html.twig', array('form' => $form->createView(),));
    }
}
