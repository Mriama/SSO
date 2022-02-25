<?php

namespace App\Repository;

use App\Entity\ApplicationUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ApplicationUserRepository extends ServiceEntityRepository{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ApplicationUser::class);
    }


    public function getProfil($idApplication){ 
        return $this->createQueryBuilder('au')
            ->select('u.idUtilisateur,u.ctremoteuser,u.ctln')
            ->innerJoin('au.user','u')
            ->where('au.application = :applicationId')
            ->setParameter('applicationId',$idApplication)
            ->getQuery()
            ->execute();

    }

}