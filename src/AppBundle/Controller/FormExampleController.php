<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\Type\ProductType;
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
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        dump($form->createView());

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $product = $form->getData();

            $em->persist($product);
            $em->flush();

            $this->addFlash('success', 'We saved a product with id ' . $product->getId());

        }
        
        return $this->render(':form-example:index.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{product}", name="form_edit_example")
     */
    public function formEditExampleAction(Request $request, Product $product)
    {
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('info', 'We edited a product with id ' . $product->getId());

            return $this->redirectToRoute('form_add_example');

        }

        return $this->render(':form-example:index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}