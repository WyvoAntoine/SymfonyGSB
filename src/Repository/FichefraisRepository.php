<?php

namespace App\Repository;

use App\Entity\Fichefrais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichefrais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichefrais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichefrais[]    findAll()
 * @method Fichefrais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichefraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichefrais::class);
    }

    // /**
    //  * @return Fichefrais[] Returns an array of Fichefrais objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fichefrais
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    public function fraisUtilissateur()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(" SELECT SUM(f.montantvalide), u.nom, u.prenom FROM App\Entity\Fichefrais f INNER JOIN App\Entity\Utilisateur u
            WITH u.id = f.idutilisateur WHERE f.montantvalide IS NOT NULL GROUP BY u.id ") ;
        $laListe = $query->getResult();
        return $laListe;        
    }
    
    public function sansFraisUtilissateur()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(" SELECT u.nom, u.prenom FROM App\Entity\Fichefrais f LEFT OUTER JOIN App\Entity\Utilisateur u
            WITH u.id = f.idutilisateur WHERE f.montantvalide IS NULL GROUP BY u.id ") ;
        $laListe = $query->getResult();
        return $laListe;        
    }
    
    public function nbFichesUtilissateur()
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery(" SELECT COUNT(*) FROM App\Entity\Fichefrais f LEFT OUTER JOIN App\Entity\Utilisateur u
            WITH u.id = f.idutilisateur GROUP BY u.id ") ;
        $laListe = $query->getResult();
        return $laListe;        
    }
}
