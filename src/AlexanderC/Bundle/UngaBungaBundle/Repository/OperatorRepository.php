<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class OperatorRepository extends EntityRepository
{
    /**
     * @return mixed
     */
    public function getNextOperator()
    {
        $qb = $this->createQueryBuilder('op');

        $qb->select('op')
            ->where("op.active = 1")
            ->orderBy("op.apps_count", "asc")
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
            ->createQuery("SELECT COUNT(o.id) FROM UngaBungaBundle:Operator o")
            ->getSingleScalarResult();
    }

    /**
     * @return int
     */
    public function countActive()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT COUNT(o.id) FROM UngaBungaBundle:Operator o WHERE o.active = 1")
            ->getSingleScalarResult();
    }
} 