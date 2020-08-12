<?php

namespace App\Infrastructure\Repository;

use AGerault\DBlog\Blog\Entity\Article;
use AGerault\DBlog\Blog\Exception\ArticleNotFoundException;
use AGerault\DBlog\Blog\Gateway\ArticlesGateway;
use App\Infrastructure\Entity\DoctrineArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DoctrineArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctrineArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctrineArticle[]    findAll()
 * @method DoctrineArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineArticleRepository extends ServiceEntityRepository implements ArticlesGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineArticle::class);
    }

    // /**
    //  * @return DoctrineArticle[] Returns an array of DoctrineArticle objects
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
    public function findOneBySomeField($value): ?DoctrineArticle
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function all(): array
    {
        return $this->findAll();
    }

    /**
     * @return Article
     * @throws ArticleNotFoundException
     * @throws NonUniqueResultException
     */
    public function last(): Article
    {
        /**
         * @var DoctrineArticle
         */
        $doctrineArticle = $this->createQueryBuilder('a')
            ->addOrderBy('a.publishedAt', 'DESC')
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult();

        if ($doctrineArticle) {
            return new Article(
                $doctrineArticle->getTitle(),
                $doctrineArticle->getContent(),
                $doctrineArticle->getPublishedAt(),
                $doctrineArticle->getUpdatedAt(),
                true
            );
        } else {
            throw new ArticleNotFoundException("No last article found.");
        }
    }
}
