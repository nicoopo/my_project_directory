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
                    'description' => 'Application JavaFX permettant la gestion de tâches avec une base SQLite.',
                    'tech' => 'JavaFX, SQLite, MVC',
                    'image' => 'java/javafx_todo.gif',
                ],
                [
                    'titre' => 'Jeu du Serpent',
                    'description' => 'Version modernisée du classique Snake en JavaFX avec animations.',
                    'tech' => 'Java, JavaFX, POO',
                    'image' => 'snake_java.jpg',
                ],
            ],
            'PHP / Symfony' => [
                [
                    'titre' => 'Plateforme de QCM',
                    'description' => 'Application web de QCM pour les formations CCA, avec authentification et suivi des scores.',
                    'tech' => 'Symfony, Bootstrap, MySQL',
                    'image' => 'qcm_app.jpg',
                ],
                [
                    'titre' => 'CRM Financier',
                    'description' => 'Progiciel pour la gestion de portefeuilles clients et d’investissements.',
                    'tech' => 'Symfony, Twig, Chart.js',
                    'image' => 'crm_finance.jpg',
                ],
            ],
            'Réseau / Infra' => [
                [
                    'titre' => 'Topologie Cisco virtuelle',
                    'description' => 'Mise en place d’un réseau complet sous Cisco Packet Tracer avec routage dynamique.',
                    'tech' => 'Cisco, VLAN, OSPF',
                    'image' => 'cisco_network.jpg',
                ],
                [
                    'titre' => 'Serveur Web Debian',
                    'description' => 'Déploiement complet d’un serveur Apache/PHP sécurisé sous Debian.',
                    'tech' => 'Linux, Apache2, SSH',
                    'image' => 'debian_server.jpg',
                ],
            ],
        ];

        return $this->render('portfolio/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
