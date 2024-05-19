<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ServicesformType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(
        ServiceRepository $service,
        EntityManagerInterface $manager,
        Request $request
    ): Response {
        $services = $service->findAll();

        $form = $this->createForm(ServicesformType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $service = $form->getData();
            $service->setAffichage(false);
            if ($service->getImageName() == null) {
                echo 'no image';
            }
            $manager->persist($service);
            $manager->flush();

            $this->addFlash('success', 'Service ajouté avec succès');

            return $this->redirectToRoute('app_services');
        }

        // Check if the form has errors
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Le formulaire contient des erreurs. Veuillez le corriger.');
        }

        return $this->render('pages/services/g_services.html.twig', [
            'services' => $services,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/afficher_service/{id}', name: 'service_status')]
    public function afficher_service(
        ServiceRepository $service,
        EntityManagerInterface $manager,
        $id
    ): Response {
        $service = $service->find($id);

        if ($service->isAffichage()) {
            $service->setAffichage(false);
        } else {
            $service->setAffichage(true);
        }

        $manager->persist($service);
        $manager->flush();

        $this->addFlash('success', 'Service affiché avec succès');

        return $this->redirectToRoute('app_services');
    }

    #[Route('/modif_service/{id}', name: 'service_edit')]
    public function modif_service(
        ServiceRepository $service,
        EntityManagerInterface $manager,
        Request $request,
        $id
    ): Response {
        $service = $service->find($id);

        $form = $this->createForm(ServicesformType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($service);
            $manager->flush();

            $this->addFlash('success', 'Service modifié avec succès');

            return $this->redirectToRoute('app_services');
        }

        // Check if the form has errors
        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Le formulaire contient des erreurs. Veuillez le corriger.');
        }

        return $this->render('pages/services/g_services_edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/delete_service/{id}', name: 'service_delete')]
    public function delete_service(
        ServiceRepository $service,
        EntityManagerInterface $manager,
        $id
    ): Response {
        $service = $service->find($id);

        $manager->remove($service);
        $manager->flush();

        $this->addFlash('success', 'Service supprimé avec succès');

        return $this->redirectToRoute('app_services');
    }
}
