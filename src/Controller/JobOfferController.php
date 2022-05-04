<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobOfferController extends AbstractController
{
    #[Route('/job/offer', name: 'app_job_offer')]
    public function index(): Response
    {
        return $this->render('job_offer/index.html.twig', [
            'controller_name' => 'JobOfferController',
        ]);
    }

    #[Route('/job/offer/show', name: 'app_job_offer_show')]
    public function show()
    {
        return $this->render('job_offer/show.html.twig', [
            'controller_name' => 'JobOfferController',
        ]);
    }
}
