<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Battle;
use AppBundle\Form\Type\BattleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormExampleController extends Controller
{
    /**
     * @Route("/", name="form_add_example")
     */
    public function formAddExampleAction(Request $request)
    {
        $form = $this->createForm(BattleType::class);

        $form->handleRequest($request);

        dump($form->createView());

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $battle = $form->getData();

            $em->persist($battle);
            $em->flush();

            $this->addFlash('success', 'We saved a battle with id ' . $battle->getId());

        }
        
        return $this->render(':form-example:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{battle}", name="form_edit_example")
     */
    public function formEditExampleAction(Request $request, Battle $battle)
    {
        $form = $this->createForm(BattleType::class, $battle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('info', 'We edited a battle with id ' . $battle->getId());

            return $this->redirectToRoute('form_add_example');

        }

        return $this->render(':form-example:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }
}