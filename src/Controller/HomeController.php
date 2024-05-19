<?php

namespace App\Controller;

use App\Repository\MaintenanceRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ServiceRepository $service,
        MaintenanceRepository $maintenance
    ): Response {

        if ($maintenance->findOneBy(['switch' => true])) {
            return $this->redirectToRoute('app_maintenance');
        }

        $services = $service->findAll();
        return $this->render('pages/home.html.twig', [
            'services' => $services
        ]);
    }
}
