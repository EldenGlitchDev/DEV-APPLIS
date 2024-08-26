<?php

namespace App\Repository;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artist>
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }

//    /**
//     * @return Artist[] Returns an array of Artist objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }


// Version avec le DQL

/*public function getSomeArtists($name)
{
    $entityManager = $this->getEntityManager();

    $query = $entityManager->createQuery(
        'SELECT a 
        FROM App\Entity\Artist a
        WHERE a.name LIKE :name'
    )->setParameter('name', '%'.$name.'%');

    return $query->getResult();
}*/

// Version avec le QueryBuilder :

public function getSomeArtists($name)
{
    $qb = $this->createQueryBuilder('a'); /* $this->createQueryBuilder est une méthode qui crée une nouvelle instance d'un objet Doctrine QueryBuilder. */
                                          /* L'argument « a » est un alias pour l'entité interrogée, qui est une entité Artist. */
                                          /*L'objet QueryBuilder est stocké dans la variable $qb.*/
    $qb                                   
        ->andWhere('a.name like :name')             /* andWhere est une méthode qui ajoute une clause conditionnelle à la requête. */
                                                    /* La clause est a.name comme :name, ce qui signifie "trouver les artistes dont la colonne name contient la valeur du paramètre :name". */
                                                    /* Le paramètre :name est un placeholder qui sera remplacé par la valeur réelle transmise à la méthode. */
        ->setParameter('name', '%'.$name.'%')       /* setParameter est une méthode qui définit la valeur d'un paramètre dans la requête. */
                                                    /* Le paramètre :name est défini sur la valeur de l'argument $name, entouré de caractères génériques %. Cela permet à la requête d'effectuer une recherche LIKE, faisant correspondre les artistes dont les noms contiennent la valeur spécifiée. */
        ->orderBy('a.id', 'ASC')                    /* orderBy est une méthode qui spécifie l'ordre de tri des résultats. */
                                                    /* La requête triera les résultats par la colonne id de l'entité Artist par ordre croissant (ASC). */
        ->setMaxResults(10);                        /* setMaxResults est une méthode qui limite le nombre de résultats renvoyés par la requête. Dans ce cas, la requête renverra au maximum 10 résultats. */

    $query = $qb->getQuery();                       /* getQuery est une méthode qui renvoie l'objet Query construit à partir de QueryBuilder. */
    $artists = $query->getResult();                 /* getResult est une méthode qui exécute la requête et renvoie les résultats sous forme de tableau d'objets. */
     return $artists;                               /* La méthode renvoie le tableau d'objets Artist qui correspondent au nom spécifié. */
}

//    public function findOneBySomeField($value): ?Artist
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
