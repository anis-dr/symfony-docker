<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{

    /**
     * @Route("/job", name="index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
            'controller_name' => 'JobController',
        ]);
    }

    /**
     * @Route("/job/home", name="JobHome")
     * @return Response
     */
    public function home(): Response
    {
        return $this->render('job/home.html.twig', [
            'controller_name' => 'JobController',
            'route' => '/home',
        ]);
    }

    /**
     * @Route("/voir/{id}", name="voir", requirements={"id"= "\d+"})
     * @param $id
     * @return Response
     */
    public function voir($id): Response
    {
        return $this->render('job/voir.html.twig', [
            'controller_name' => 'JobController',
            'id' => $id,
        ]);
    }
}
