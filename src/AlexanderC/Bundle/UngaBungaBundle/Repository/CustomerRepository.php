<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use AlexanderC\Bundle\UngaBungaBundle\Entity\Customer;
use Doctrine\ORM\EntityRepository;

class CustomerRepository extends EntityRepository
{
    /**
     * @param Customer $customer
     * @return int
     */
    public function countActiveApplications(Customer $customer)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT COUNT(ap.id)
                FROM UngaBungaBundle:Application ap
                WHERE ap.reply IS NULL AND ap.customer = :customer"
            )->setParameter('customer', $customer)
            ->getSingleScalarResult();
    }

    /**
     * @param Customer $customer
     * @return int
     */
    public function countClosedApplications(Customer $customer)
    {
        return $this->getEntityManager()
            ->createQuery(
                "SELECT COUNT(ap.id)
                FROM UngaBungaBundle:Application ap
                WHERE ap.reply IS NOT NULL AND ap.customer = :customer"
            )->setParameter('customer', $customer)
            ->getSingleScalarResult();
    }

    /**
     * @return int
     */
    public function countAll()
    {
        return $this->getEntityManager()
            ->createQuery("SELECT COUNT(o.id) FROM UngaBungaBundle:Customer o")
            ->getSingleScalarResult();
    }
} 