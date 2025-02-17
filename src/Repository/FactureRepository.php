<?php

namespace App\Repository;

use App\Entity\Facture;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Facture>
 *
 * @method Facture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facture[]    findAll()
 * @method Facture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facture::class);
    }
    public function findFacturesByClient(String $user)
    {
        return $this->createQueryBuilder('facture')
            ->andWhere('facture.client = :user')
            ->setParameter('user', $user)
            ->andWhere('facture.statut = :xx')
            ->setParameter('xx',true)
            ->orderBy('facture.id', 'DESC') 

            ->setMaxResults(100)

            ->getQuery()
            ->getResult();
    }
//    /**
//     * @return Facture[] Returns an array of Facture objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Facture
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function findAllOrderedByAsc(): array
{
    return $this->createQueryBuilder('f')
        ->orderBy('f.id', 'DESC') 
        ->setMaxResults(100)
        ->getQuery()
        ->getResult();
}
public function nom($searchQuery,$sort)
{
    $query = $this->createQueryBuilder('f')
    ->join('f.client', 'c')
    ->andWhere('c.email LIKE :searchQuery')
    ->setParameter('searchQuery', '%' . $searchQuery . '%');
if ($sort === 'asc') {
    $query->orderBy('f.totale', 'ASC');
} elseif ($sort === 'desc') {
    $query->orderBy('f.totale', 'DESC');
}

return $query->getQuery()->getResult();
}
}
