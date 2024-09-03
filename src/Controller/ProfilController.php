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
    $user = $this->getUser();
    if ($user) {
        $identifiant = $user->getUserIdentifier();
        $info = $this->userRepo->findOneBy(["email" => $identifiant]);
    } else {
        // Handle the case where the user is not authenticated
        // For example, you could redirect them to the login page
        return $this->redirectToRoute('app_login');
    }

    return $this->render('profil/index.html.twig', [
        'informations' => $info
    ]);
}
}
