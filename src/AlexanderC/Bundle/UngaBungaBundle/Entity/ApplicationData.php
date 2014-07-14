<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * ApplicationData
 */
class ApplicationData
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\Application
     */
    private $application;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry
     */
    private $shop_entry;


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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return ApplicationData
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set application
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Application $application
     *
     * @return ApplicationData
     */
    public function setApplication(\AlexanderC\Bundle\UngaBungaBundle\Entity\Application $application = null)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\Application 
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Set shop_entry
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry $shopEntry
     *
     * @return ApplicationData
     */
    public function setShopEntry(\AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry $shopEntry = null)
    {
        $this->shop_entry = $shopEntry;

        return $this;
    }

    /**
     * Get shop_entry
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\ShopEntry 
     */
    public function getShopEntry()
    {
        return $this->shop_entry;
    }
}
