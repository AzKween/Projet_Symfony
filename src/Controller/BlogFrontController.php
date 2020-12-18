<?php

namespace App\Controller;

use App\Entity\Blog;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogFrontController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository(Blog::class)->findAll();

        $pagination = $paginator->paginate(
            $entities, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            4 /*limit per page*/
        );


        return $this->render('blogFront/index.html.twig', [
            "pagination" => $pagination
        ]);
    }
}
