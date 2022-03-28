<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Validator\Constraints\NotBlank;


class presentationGSBController extends AbstractController
{
    /**
     * @Route("/sfGSB/accueil", name="accueil")
     */
       
    public function index(): Response
    {
        return $this->render('accueil/accueil.html.twig');
    }
    
    /**
     * @Route("/sfGSB/pageBienvenue", name="bienvenue")
     */
    public function bienvenue() : Response
    {
        return $this->render('bienvenue/bienvenue.html.twig');
    }
    
    /**
     * @Route("/sfGSB/sommaire", name="sommaire")
     */
    public function sommaire() : Response
    {
        return $this->render('sommaire/sommaire.html.twig');
    }
    
    /**
     * @Route("/sfGSB/SI/gsb", name="gsb")
     */
    public function gsb() : Response
    {
        return $this->render('gsb/gsb.html.twig');
    } 
    
    /**
     * @Route("/sfGSB/SI/gestionGsb", name="gestionGsb")
     */
    public function gestionGsb() : Response
    {
        return $this->render('gestionGsb/gestionGsb.html.twig');
    }  
    
    /**
     * @Route("/sfGSB/SI/equipementGsb", name="equipementGsb")
     */
    public function equipementGsb() : Response
    {
        return $this->render('equipementGsb/equipementGSB.html.twig');
    }  
    
    /**
     * @Route("/sfGSB/Reseau/repartitionGsb", name="repartitionGsb")
     */
    public function repartitionGsb() : Response
    {
        return $this->render('repartitionGsb/repartitionGsb.html.twig');
    }  
    
    /**
     * @Route("/sfGSB/Reseau/segmentationGsb", name="segmentationGsb")
     */
    public function segmentationGsb() : Response
    {
        return $this->render('segmentationGsb/segmentationGsb.html.twig');
    } 
    
    /**
     * @Route("/sfGSB/LesUtilisateurs/", name="lesUtilisateurs")
     */
    public function lesUtilisateurs() : Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
        $lesUtilisateurs = $repo->findAll();
        //$nbUtilisateurs = $repo->nbUtilisateur();
        return $this->render('lesUtilisateurs/lesUtilisateurs.html.twig',
                [
                    'listeUtilisateurs' => $lesUtilisateurs,
                    //'nbUtilisateurs' => $nbUtilisateurs
                    ]
                ); 
    } 

    
    /**
     * @Route("/sfGSB/LesUtilisateursByVille/ville/{ville}", name="lesUtilisateursByVille")
     */
    public function lesUtilisateursByVille($ville = null) : Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur::class);
        $lesUtilisateursByVille = $repo->findByville($ville);
        return $this->render('lesUtilisateurs/lesUtilisateursByVille.html.twig',
                [
                    'listeUtilisateursByVille' => $lesUtilisateursByVille,
                    ]
                ); 
    }
    
    /**
     * @Route("/sfGSB/LesUtilisateursByFrais/", name="lesUtilisateursByFrais")
     */    
    public function lesUtilisateursByFrais() : Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $lesUtilisateursByFrais = $repo->fraisUtilissateur();
        return $this->render('lesUtilisateurs/lesUtilisateursByFrais.html.twig',
                [
                    'listeUtilisateursByFrais' => $lesUtilisateursByFrais,
                    ]
                );         
    }
    
    /**
     * @Route("/sfGSB/LesUtilisateursBySansFrais/", name="lesUtilisateursBySansFrais")
     */    
    public function lesUtilisateursBySansFrais() : Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $lesUtilisateursBySansFrais = $repo->sansFraisUtilissateur();
        return $this->render('lesUtilisateurs/lesUtilisateursBySansFrais.html.twig',
                [
                    'listeUtilisateursBySansFrais' => $lesUtilisateursBySansFrais,
                    ]
                );         
    }
    
    /**
     * @Route("/sfGSB/LesUtilisateursByNbFiches/", name="lesUtilisateursByNbFiches")
     */    
    public function lesUtilisateursByNbFiches() : Response
    {
        $repo = $this->getDoctrine()->getRepository(\App\Entity\Fichefrais::class);
        $lesUtilisateursByNbFiches = $repo->nbFichesUtilissateur();
        return $this->render('lesUtilisateurs/lesUtilisateursBySNbFiches.html.twig',
                [
                    'listeUtilisateursByNbFiches' => $lesUtilisateursByNbFiches,
                    ]
                );         
    }
}
