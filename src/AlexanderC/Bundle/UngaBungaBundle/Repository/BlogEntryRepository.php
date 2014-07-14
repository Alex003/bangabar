<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 2/24/14
 * @time 8:01 PM
 */

namespace AlexanderC\Bundle\UngaBungaBundle\Repository;


use Doctrine\ORM\EntityRepository;

class BlogEntryRepository extends EntityRepository
{
    /**
     * @param string $slug
     * @param bool $allowHidden
     * @return array
     */
    public function findBlogEntriesByCategorySlug($slug, $allowHidden = false)
    {
        return $this->getBlogEntriesByCategorySlugQuery($slug, $allowHidden)->getResult();
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function getBlogEntriesOnHomepageQuery()
    {
        $qb = $this->createQueryBuilder('be');

        $qb->select('be')
            ->where('be.on_homepage = 1');

        return $qb->getQuery();
    }

    /**
     * @param string $slug
     * @param bool $allowHidden
     * @return \Doctrine\ORM\Query
     */
    public function getBlogEntriesByCategorySlugQuery($slug, $allowHidden = false)
    {
        $qb = $this->createQueryBuilder('be');

        $qb->select('be')
            ->join('be.category', 'bc')
            ->where('bc.slug = :slug')
            ->setParameter('slug', $slug);

        if(!$allowHidden) {
            $qb->andWhere('bc.hidden = 0');
        }

        return $qb->getQuery();
    }
} 