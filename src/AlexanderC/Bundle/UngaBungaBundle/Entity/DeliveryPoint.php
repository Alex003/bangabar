<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * DeliveryPoint
 */
class DeliveryPoint
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $info;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $applications;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->applications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return DeliveryPoint
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return DeliveryPoint
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return DeliveryPoint
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return DeliveryPoint
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return DeliveryPoint
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add applications
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Application $applications
     *
     * @return DeliveryPoint
     */
    public function addApplication(\AlexanderC\Bundle\UngaBungaBundle\Entity\Application $applications)
    {
        $this->applications[] = $applications;

        return $this;
    }

    /**
     * Remove applications
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Application $applications
     */
    public function removeApplication(\AlexanderC\Bundle\UngaBungaBundle\Entity\Application $applications)
    {
        $this->applications->removeElement($applications);
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApplications()
    {
        return $this->applications;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $shop_entrys;


    /**
     * Add shop_entrys
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry $shopEntrys
     * @return DeliveryPoint
     */
    public function addShopEntry(\AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry $shopEntrys)
    {
        $this->shop_entrys[] = $shopEntrys;

        return $this;
    }

    /**
     * Remove shop_entrys
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry $shopEntrys
     */
    public function removeShopEntry(\AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry $shopEntrys)
    {
        $this->shop_entrys->removeElement($shopEntrys);
    }

    /**
     * Get shop_entrys
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getShopEntrys()
    {
        return $this->shop_entrys;
    }
}
