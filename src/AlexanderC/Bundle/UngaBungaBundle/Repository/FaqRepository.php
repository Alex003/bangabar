<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;

use AlexanderC\Bundle\UngaBungaBundle\Entity\Faq;
use Doctrine\ORM\EntityRepository;

class FaqRepository extends EntityRepository
{
    /**
     * @return Faq
     */
    public function findFirst()
    {
        try {
            $qb = $this->createQueryBuilder('s');
            $qb->select('s');

            return $qb->getQuery()->getSingleResult();
        } catch(\Exception $e) {
            return new Faq();
        }
    }
} 