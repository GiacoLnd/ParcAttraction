<?php

namespace App\Controller;

use App\Repository\AttractionRepository;
use App\Repository\AvisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttractionController extends AbstractController
{
    #[Route('/attraction', name: 'app_attraction')]
    public function index(AttractionRepository $attractionRepository, AvisRepository $avisRepository): Response
    {
        $attractions = $attractionRepository->findAll(); 
        $avis = $avisRepository->findAll();

        return $this->render('attraction/index.html.twig', [
            'controller_name' => 'AttractionController',
            'attractions' => $attractions,
            'avis' => $avis
        ]);
    }
}
