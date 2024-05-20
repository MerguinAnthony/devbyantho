<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LegalController extends AbstractController
{
    #[Route('/politique-de-confidentialité', name: 'app_polConf')]
    public function index(): Response
    {
        return $this->render('pages/legal/polConf.html.twig', []);
    }

    #[Route('/conditions-générales-d\'utilisation', name: 'app_cgu')]
    public function cgu(): Response
    {
        return $this->render('pages/legal/cgu.html.twig', []);
    }
}
