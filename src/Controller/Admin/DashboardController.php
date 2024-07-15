<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Benefit;
use App\Entity\Service;
use App\Entity\Messages;
use App\Entity\ContactCompany;
use Symfony\Component\Mime\Message;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use App\Controller\Admin\ContactCompanyCrudController;
use App\Entity\Maintenance;
use App\Entity\Project;
use App\Entity\Technology;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    // Injection de dépendance
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    // Configuration de la page d'accueil
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(ContactCompanyCrudController::class)
            ->generateUrl();


        return $this->redirect($url);
    }

    // Configuration du tableau de bord
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dev by Antho')
            ->setFaviconPath('assets/png/HD_LOGO-DEV-BY-ANTHO_FAVICON.png');
    }


    // Configuration du menu de gauche
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_home');
        yield MenuItem::section('Gestion entreprise');
        yield MenuItem::subMenu('Gestion des clients', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Ajouter un client', 'fas fa-plus', ContactCompany::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Liste des clients', 'fas fa-eye', ContactCompany::class),
            ]);
        yield MenuItem::subMenu('Gestion des tarifs', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Ajouter un tarif', 'fas fa-plus', Benefit::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Liste des tarifs', 'fas fa-eye', Benefit::class),
            ]);
        yield MenuItem::subMenu('Messagerie', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Liste des messages', 'fas fa-eye', Messages::class),
            ]);
        yield MenuItem::section('Gestion site');
        yield MenuItem::subMenu('Gestion des services', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Ajouter un service', 'fas fa-plus', Service::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Liste des services', 'fas fa-eye', Service::class),
            ]);
        yield MenuItem::subMenu('Gestion des utilisateurs', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Ajouter un utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Liste des Utilisateurs', 'fas fa-eye', User::class),
            ]);
        yield MenuItem::subMenu('Gestion Projet', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Ajouter un projet', 'fas fa-plus', Project::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Liste des projets', 'fas fa-eye', Project::class),
            ]);
        yield MenuItem::subMenu('Gestion Technologie', 'fas fa-bars')
            ->setSubItems([
                MenuItem::linkToCrud('Ajouter une technologie', 'fas fa-plus', Technology::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Liste des technologies', 'fas fa-eye', Technology::class),
            ]);
    }
}
