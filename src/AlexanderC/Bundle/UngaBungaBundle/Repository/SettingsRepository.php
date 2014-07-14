<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use AlexanderC\Bundle\UngaBungaBundle\Entity\Settings;
use Doctrine\ORM\EntityRepository;

class SettingsRepository extends EntityRepository
{
    /**
     * @return Settings
     */
    public function findFirst()
    {
        try {
            $qb = $this->createQueryBuilder('s');
            $qb->select('s');

            return $qb->getQuery()->getSingleResult();
        } catch(\Exception $e) {
            return new Settings();
        }
    }
} 