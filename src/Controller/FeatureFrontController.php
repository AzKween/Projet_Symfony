<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeatureFrontController extends AbstractController
{
    /**
     * @Route("/feature", name="feature")
     */
    public function index()
    {
        return $this->render('featureFront/index.html.twig', [
            'controller_name' => 'FeatureController',
        ]);
    }
}
