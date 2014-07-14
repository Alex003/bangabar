<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use AlexanderC\Bundle\UngaBungaBundle\Entity\Supervisor;
use Doctrine\ORM\EntityRepository;

class SupervisorRepository extends EntityRepository
{
    /**
     * @param Supervisor $supervisor
     * @return bool
     */
    public function safeRemove(Supervisor $supervisor)
    {
        try {
            $this->_em->beginTransaction();

            if($supervisor->getOperators()->count() > 0) {
                $newSupervisor = $this->createQueryBuilder('s')
                    ->select('s')
                    ->where('s.id != :supervisor')
                    ->setParameter('supervisor', $supervisor->getId())
                    ->getQuery()->setMaxResults(1)->getSingleResult()
                ;

                foreach($supervisor->getOperators() as $operator) {
                    $operator->setSupervisor($newSupervisor);
                    $this->_em->persist($operator);
                }
                $this->_em->flush();
            }

            $this->_em->refresh($supervisor);
            $this->_em->remove($supervisor);
            $this->_em->flush();

            $this->_em->commit();

            return true;
        } catch(\Exception $e) {
            $this->_em->rollback();
            return false;
        }
    }
} 