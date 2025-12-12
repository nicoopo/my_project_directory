<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CVController extends AbstractController
{
    #[Route('/CV', name: 'app_cv')]
    public function index(): Response
    {
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CVController',
        ]);
    }

    #[Route('/CV/download', name: 'app_cv_download')]
    public function download(Request $request): Response
    {
        // Récupérer le thème depuis la requête (clair ou sombre)
        $theme = $request->query->get('theme', 'dark');
        
        // Options pour Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');
        
        // Créer l'instance Dompdf
        $dompdf = new Dompdf($options);
        
        // Rendre le template avec le thème approprié
        $html = $this->renderView('cv/pdf.html.twig', [
            'theme' => $theme,
        ]);
        
        // Charger le HTML dans Dompdf
        $dompdf->loadHtml($html);
        
        // Définir le format de papier A4 portrait
        $dompdf->setPaper('A4', 'portrait');
        
        // Rendre le PDF
        $dompdf->render();
        
        // Générer le nom du fichier
        $themeLabel = $theme === 'dark' ? 'sombre' : 'clair';
        $filename = 'CV_Nicolas_Cataluna_' . $themeLabel . '.pdf';
        
        // Retourner la réponse PDF
        return new Response(
            $dompdf->output(),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }
}
