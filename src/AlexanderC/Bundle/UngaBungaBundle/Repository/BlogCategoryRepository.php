<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use Doctrine\ORM\EntityRepository;

class BlogCategoryRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findNotHidden()
    {
        $qb = $this->createQueryBuilder('bc');
        $qb->select('bc')
            ->where('bc.hidden = 0');

        return $qb->getQuery()->getResult();
    }
} 