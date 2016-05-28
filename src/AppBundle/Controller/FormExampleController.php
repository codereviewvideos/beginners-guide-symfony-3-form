<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DataFeed;
use AppBundle\Entity\Timetable;
use AppBundle\Form\Type\DataFeedType;
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
        $dataFeed = new DataFeed();
        $dataFeed->setAnotherTimetable((new Timetable())->setPresetChoice(30));

        $form = $this->createForm(DataFeedType::class, $dataFeed);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            /**
             * @var $dataFeed \AppBundle\Entity\DataFeed
             */
            $dataFeed = $form->getData();

            $em->persist($dataFeed);
            $em->flush();

            $this->addFlash('success', 'We saved a data feed with id ' . $dataFeed->getId());
        }
        
        return $this->render(':form-example:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{dataFeed}", name="form_edit_example")
     */
    public function formEditExampleAction(Request $request, DataFeed $dataFeed)
    {
        $form = $this->createForm(DataFeedType::class, $dataFeed);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('info', 'We edited a data feed with id ' . $dataFeed->getId());

            return $this->redirectToRoute('form_add_example');
        }

        return $this->render(':form-example:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }
}