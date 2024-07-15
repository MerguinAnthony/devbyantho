<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    #[Route('/portfolio', name: 'app_project')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->render('pages/home.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[Route('/portfolio/{id}', name: 'app_project_show')]
    public function show(int $id, ProjectRepository $projectRepository): Response
    {
        $project = $projectRepository->find($id);

        if (!$project) {
            throw $this->createNotFoundException('The project does not exist');
        }

        return $this->render('pages/home.html.twig', [
            'project' => $project,
        ]);
    }
}
