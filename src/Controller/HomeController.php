<?php

namespace App\Controller;


use App\Repository\MaintenanceRepository;
use App\Repository\ProjectRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ServiceRepository $service,
        MaintenanceRepository $maintenance,
        ProjectRepository $project
    ): Response {

        $maintenances = $maintenance->findAll();
        $services = $service->findAll();
        $projects = $project->findAll();

        return $this->render('pages/home.html.twig', [
            'services' => $services,
            'maintenance' => $maintenances,
            'projects' => $projects
        ]);
    }
}
