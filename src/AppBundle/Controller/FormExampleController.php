<?php

namespace AppBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormExampleController extends Controller
{
    /**
     * @Route("/", name="form_example")
     */
    public function formExampleAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Submit Me Now!',
                'attr'  => [
                    'class' => 'btn btn-success'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            dump($form->getData());

            $this->addFlash('success', 'Welcome ' . $form->getData()['name']);

            $name = $form->getData()['name'];
            $this->sendMail($name);

        }

        return $this->render(':form-example:index.html.twig', [
            'form' => $form->createView()
        ]);
    }


    private function sendMail($body)
    {
        $mail = \Swift_Message::newInstance()
            ->setSubject('test mail')
            ->setFrom('someone@somewhere.com')
            ->setTo('3n1r4r+6wphw4wogrfs0@sharklasers.com')
            ->setBody('message body goes here ' . $body)
        ;

        $this->get('mailer')->send($mail);
    }
}