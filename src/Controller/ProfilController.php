<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UtilisateurRepository;

class ProfilController extends AbstractController
{

    private $userRepo;
    public function __construct(UtilisateurRepository $userRepo){
        $this->userRepo = $userRepo;
    }

    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        $identifiant = $this->getUser()->getUserIdentifier();
        if($identifiant){
            $info = $this->userRepo->findOneBy(["email" => $identifiant]);
        }

        return $this->render('profil/index.html.twig', [
            'informations' => $info
        ]);
    }
}
