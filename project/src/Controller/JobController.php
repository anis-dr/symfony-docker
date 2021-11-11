<?php

namespace App\Controller;

use App\Entity\Job;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * @Route("/list/{id}", name="listId", requirements={"id"= "\d+"})
     * @param $id
     * @return Response
     */
    public function listId($id): Response
    {
        return $this->render('job/list.html.twig', [
            'controller_name' => 'JobController',
            'id' => $id,
        ]);
    }

    /**
     * @Route("/list", name="list")
     * @return Response
     */
    public function list(): Response
    {
        $jobs = $this->getDoctrine()->getRepository(Job::class)->findAll();

        if (!$jobs) {
            throw $this->createNotFoundException('No jobs found.');
        }

        return $this->render('job/list.html.twig', array('jobs' => $jobs));
    }

    public function menu(): Response
    {
        $myMenu = array(
            ['route' => 'job', 'label' => 'Accueil'],
            ['route' => 'ajouter', 'label' => 'Ajouter un job'],
            ['route' => 'list', 'label' => 'Afficher tous les jobs']
        );
        return $this->render('job/menu.html.twig', [
            'menu' => $myMenu
        ]);
    }

    public function sidebar(): Response
    {
        $sideBar = array(
            ['id' => 1, 'job' => 'Developer web'],
            ['id' => 2, 'job' => 'Responsable marketing'],
            ['id' => 3, 'job' => 'Team Leader']
        );
        return $this->render('job/sidebar.html.twig', [
            'sidebar' => $sideBar
        ]);
    }

    /**
     * @Route("/ajouter", name="jouterJob")
     * @return Response
     */
    public function ajouter(): Response
    {
        $job = new Job();
        $job->setTitle('Developer Symphony');
        $job->setCompany('Sloth-Lab');
        $job->setDescription('Nous recherchons un Developper symphony expert...');
        $job->setIsActivated(1);
        $job->setExpireAt(new DateTimeImmutable());
        $job->setEmail('anis@gmail.com');

        $em = $this->getDoctrine()->getmanager();
        $em->persist($job);
        $em->flush();

        return $this->render('job/ajouter.html.twig');
    }
}
