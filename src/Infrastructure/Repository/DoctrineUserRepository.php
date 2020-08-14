<?php

namespace App\Infrastructure\Repository;

use AGerault\DBlog\Security\Entity\User;
use AGerault\DBlog\Security\Exception\UserNotFoundException;
use AGerault\DBlog\Security\Gateway\UserGateway;
use App\Infrastructure\Entity\DoctrineUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DoctrineUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctrineUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctrineUser[]    findAll()
 * @method DoctrineUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineUserRepository extends ServiceEntityRepository implements UserGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineUser::class);
    }

    // /**
    //  * @return DoctrineUser[] Returns an array of DoctrineUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DoctrineUser
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param User $user
     * @param string $password
     * @return bool
     * @throws NonUniqueResultException
     */
    public function check(User $user, string $password): bool
    {
        /** @var DoctrineUser $doctrineUser */
        $doctrineUser = $this->createQueryBuilder('u')
            ->andWhere('u.username = :username')
            ->setParameter('username', $user->getUsername())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        return $doctrineUser->getPassword() === $password;
    }

    /**
     * @param string $login
     * @return User
     * @throws NonUniqueResultException|UserNotFoundException
     */
    public function get(string $login): User
    {
        /** @var DoctrineUser $doctrineUser */
        $doctrineUser = $this->createQueryBuilder('u')
            ->andWhere('u.username = :username')
            ->setParameter('username', $login)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
        ;

        if ($doctrineUser)
        {
            return new User($doctrineUser->getUsername());
        }
        throw new UserNotFoundException();
    }
}
