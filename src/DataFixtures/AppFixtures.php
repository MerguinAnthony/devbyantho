<?php

namespace App\DataFixtures;

use App\Entity\Maintenance;
use App\Entity\User;
use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private PasswordHasherFactoryInterface $passwordHasherFactory,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('contact@devbyantho.fr');
        $user->setPassword($this->passwordHasherFactory->getPasswordHasher(User::class)->hash('password'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        $manager->flush();

        $service = new Service();
        $service->setNom('Développement Web');
        $service->setDescription('Je conçois et développe des sites web sur mesure, adaptés à vos besoins spécifiques. Que vous ayez besoin d\'un site vitrine, d\'une boutique en ligne performante ou d\'une plateforme web complexe, je suis là pour réaliser votre vision.');
        $service->setAffichage(true);
        $service->setAbrevDef('Je conçois et développe des sites web sur mesure.');
        $service->setImageName('code-6632b0ff86caf968855153.png');
        $manager->persist($service);

        $service = new Service();
        $service->setNom('Conception Graphique');
        $service->setDescription('L\'esthétique est essentielle dans le monde numérique d\'aujourd\'hui. Je crée des designs graphiques uniques et modernes pour vos projets web. Logos, chartes graphiques, maquettes... Je mets mon expertise à votre service pour vous démarquer.');
        $service->setAffichage(true);
        $service->setAbrevDef('Je crée des designs graphiques uniques et modernes.');
        $service->setImageName('conception-de-vecteur-6632b10d81fca252247087.png');
        $manager->persist($service);

        $service = new Service();
        $service->setNom('Optimisation SEO');
        $service->setDescription('Un site web bien conçu ne sert à rien s\'il n\'est pas visible sur les moteurs de recherche. Je vous aide à optimiser le référencement naturel de votre site pour améliorer sa visibilité et son positionnement sur Google.');
        $service->setAffichage(true);
        $service->setAbrevDef('Je vous aide à optimiser le référencement naturel de votre site.');
        $service->setImageName('e-commerce-6632b7daa063f207564225.png');
        $manager->persist($service);

        $service = new Service();
        $service->setNom('Maintenance et Support');
        $service->setDescription('Votre site web nécessite une maintenance régulière pour rester performant et sécurisé. Je vous propose un service de maintenance et de support technique pour vous accompagner dans la gestion de votre site à long terme.');
        $service->setAffichage(true);
        $service->setAbrevDef('Je vous propose un service de maintenance et de support technique.');
        $service->setImageName('support-informatique-6632b1223098a056645039.png');
        $manager->persist($service);

        $service = new Service();
        $service->setNom('Conseil et Stratégie');
        $service->setDescription('Vous avez un projet web en tête mais vous ne savez pas par où commencer ? Je vous accompagne dans la définition de votre stratégie digitale et vous conseille sur les meilleures solutions à mettre en place pour atteindre vos objectifs.');
        $service->setAffichage(true);
        $service->setAbrevDef('Je vous accompagne dans la définition de votre stratégie digitale.');
        $service->setImageName('conseils-6632b13385c1e262131701.png');
        $manager->persist($service);

        $service = new Service();
        $service->setNom('Intégration de Solutions E-Commerce');
        $service->setDescription('Vous souhaitez vendre vos produits en ligne ? Je vous aide à choisir et à intégrer la solution e-commerce la plus adaptée à vos besoins. Je vous accompagne dans la création de votre boutique en ligne pour vous permettre de développer votre activité sur internet.');
        $service->setAffichage(true);
        $service->setAbrevDef('Je vous aide à choisir et à intégrer la solution e-commerce la plus adaptée.');
        $service->setImageName('e-commerce-6632b7daa063f207564225.png');
        $manager->persist($service);
        $manager->flush();

        $maintenance = new Maintenance();
        $maintenance->setSwitch(true);
        $manager->persist($maintenance);

        $manager->flush();
    }
}
