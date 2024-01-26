<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CvController extends AbstractController
{
    #[Route('/', name: 'app_cv')]
    public function index(): Response
    {

        $projectDir = $this->getParameter('kernel.project_dir'); //on accède à la racine du projet, aux données du conteneur d'injections de dépendances dans lequel il y a l'accès aux paramètres
        //concrètement, on met ici à disposition le chemin absolu du répertoire
        $json = file_get_contents($projectDir. '/import/cv.json'); //chemin vers le fichier à lire 
        
        $cv= json_decode($json, true); // déserialisation du fichier pour une lecture lisible du document json

        return $this->render('cv/index.html.twig', [
            'cv' => $cv,
        ]);
    }
}
