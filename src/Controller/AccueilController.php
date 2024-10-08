<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\DiscRepository;
/*use Doctrine\ORM\EntityManagerInterface;*/
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/*Le EntityManagerInterface $em n'est pas utilisé pour le moment. C'est sensé afficher seulement les artistes contenant "Neil", mais je n'en ai pas inclus dans
 la base de données pour le moment*/

class AccueilController extends AbstractController
{

    //On va avoir souvent besoin d'injecter les respositories de nos entités dans les contrôleurs et les services
    //Pour ne pas les injecter dans chaque fonction, on va les instancier UNE SEULE fois dans le constructeur de notre contrôleur:
    //N'oubliez pas d'importer vos respositories (les lignes "use..." en haut de la page)

    private $artistRepo;
    private $discRepo;
    /*private $em;*/

    public function __construct(ArtistRepository $artistRepo, DiscRepository $discRepo, /*EntityManagerInterface $em*/)
    {
        $this->artistRepo = $artistRepo;
        $this->discRepo = $discRepo;
        /*$this->em = $em;*/
    }

    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {

         //on appelle la fonction `findAll()` du repository de la classe `Artist` afin de récupérer tous les artists de la base de données;
        $artistes = $this->artistRepo->findAll();
        
        //$artistes = $this->artistRepo->getSomeArtists("Neil"); /* //on appelle le repository pour accéder à la fonction */
        //dd($artistes); /* on teste le contenu de la variable $artistes : dd() veut dire Dump and Die (ça permet d'afficher du texte à l'écran et de terminer l'exécution du programme.) */

        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            //on va envoyer à la vue notre variable qui stocke un tableau d'objets $artistes (c'est-à-dire tous les artistes trouvés dans la base de données)
            'artistes' => $artistes
        ]);
    }
}
