<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingleFrontController extends AbstractController
{
    /**
     * @Route("/single", name="single")
     */
    public function index(): Response
    {
        return $this->render('singleFront/index.html.twig', [
            'controller_name' => 'SingleController',
        ]);
    }
}
