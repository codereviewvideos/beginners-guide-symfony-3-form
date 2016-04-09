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
     * @Route("/", name="form_example")
     */
    public function formExampleAction(Request $request)
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $product = $form->getData();

            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('form_example');

        }

        return $this->render(':form-example:index.html.twig', [
            'productForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/{product}", name="form_edit_example")
     */
    public function formEditExampleAction(Request $request, Product $product)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('form_edit_example', ['product'=>$product->getId()]);

        }

        return $this->render(':form-example:index.html.twig', [
            'productForm' => $form->createView()
        ]);
    }

}