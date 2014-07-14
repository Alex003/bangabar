<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class ApplicationRepository extends EntityRepository
{
    /**
     * @param string $uniqueIdx
     * @return mixed
     */
    public function findNotRepliedByUniqueIdx($uniqueIdx)
    {
        $qb = $this->createQueryBuilder('ap');

        $qb->select('ap')
            ->where("ap.reply IS NULL")
            ->andWhere("ap.unique_idx = :uniqueIdx")
            ->setParameter('uniqueIdx', $uniqueIdx)
        ;

        try {
            return $qb->getQuery()->setMaxResults(1)->getSingleResult();
        } catch(NoResultException $e) {
            return false;
        }
    }

    /**
     * @return int
     */
    public function countAll()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT COUNT(ap.id) FROM UngaBungaBundle:Application ap")
            ->getSingleScalarResult();
    }

    /**
     * @return int
     */
    public function countActive()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT COUNT(ap.id) FROM UngaBungaBundle:Application ap WHERE ap.reply IS NULL")
            ->getSingleScalarResult();
    }

    /**
     * @return int
     */
    public function countClosed()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT COUNT(ap.id) FROM UngaBungaBundle:Application ap WHERE ap.reply IS NOT NULL")
            ->getSingleScalarResult();
    }
} 