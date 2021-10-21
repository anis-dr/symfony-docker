<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{

    /**
     * @Route("/job" name="index")
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
}
