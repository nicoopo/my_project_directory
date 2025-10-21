<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PortfolioController extends AbstractController
{
    #[Route('/portfolio', name: 'app_projects')]
    public function index(): Response
    {
        // Exemple de données de projets (tu pourras plus tard les récupérer depuis ta BDD)
        $categories = [
            'Java & JavaFX' => [
                [
                    'titre' => 'Todolist avec et sans interface',
                    'description' => 'Application JavaFX permettant la gestion de tâches avec une base mysql.',
                    'tech' => 'JavaFX, MYSQL, MVC',
                    'image' => 'java/javafx_todo.gif',
                ],
                [
                    'titre' => 'Jeu du pendu',
                    'description' => 'Version terminal  .',
                    'tech' => 'Java',
                    'image' => 'java/pendu.png',
                ],
                [
                    'titre' => 'Poupée russe',
                    'description' => 'Version terminal  .',
                    'tech' => 'Java, POO',
                    'image' => 'java/poupee.png',
                ],
                [
                    'titre' => 'CRUD',
                    'description' => 'CRUD Utilisateur',
                    'tech' => 'Java, POO, MYSQL',
                    'image' => 'java/crud.png',
                ],
            ],
            'PHP / Symfony' => [
                
                [
                    'titre' => 'WEB consultation et collaboratif Encaissements',
                    'description' => 'Progiciel pour la gestion de portefeuilles clients et d’investissements.',
                    'tech' => 'Symfony, UX, MYSQL',
                    'image' => 'symfony/crm_finance.png',
                ],
                [
                    'titre' => 'Plateforme de QCM',
                    'description' => 'Application web de QCM pour les formations CCA, avec authentification et suivi des scores.',
                    'tech' => 'Symfony, Bootstrap, MySQL',
                    'image' => 'symfony/qcm_app.gif',
                ],
            ],
            'Réseau / Infra' => [
                [
                    'titre' => 'Topologie Cisco virtuelle',
                    'description' => 'Mise en place d’un réseau complet sous Cisco Packet Tracer avec routage dynamique.',
                    'tech' => 'Cisco, VLAN, OSPF',
                    'image' => 'reseau/cisco_network.png',
                ],
                [
                    'titre' => 'Serveur Web Debian',
                    'description' => 'Déploiement complet d’un serveur Apache/PHP sécurisé sous Debian.',
                    'tech' => 'Linux, Apache2, SSH',
                    'image' => 'reseau/debian_server.png',
                ],
            ],
        ];

        return $this->render('portfolio/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
