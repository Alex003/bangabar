<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * ShopEntry
 */
class ShopEntry
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var string
     */
    private $image_url;

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
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\BlogCategory
     */
    private $category;


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
     * Set title
     *
     * @param string $title
     *
     * @return ShopEntry
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return ShopEntry
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set image_url
     *
     * @param string $imageUrl
     *
     * @return ShopEntry
     */
    public function setImageUrl($imageUrl)
    {
        $this->image_url = $imageUrl;

        return $this;
    }

    /**
     * Get image_url
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ShopEntry
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
     * @return ShopEntry
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
     * @return ShopEntry
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
     * Set category
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\BlogCategory $category
     *
     * @return ShopEntry
     */
    public function setCategory(\AlexanderC\Bundle\UngaBungaBundle\Entity\BlogCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\BlogCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var boolean
     */
    private $sale = false;

    /**
     * @var boolean
     */
    private $bestseller = false;


    /**
     * Set sale
     *
     * @param boolean $sale
     * @return ShopEntry
     */
    public function setSale($sale)
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get sale
     *
     * @return boolean 
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set bestseller
     *
     * @param boolean $bestseller
     * @return ShopEntry
     */
    public function setBestseller($bestseller)
    {
        $this->bestseller = $bestseller;

        return $this;
    }

    /**
     * Get bestseller
     *
     * @return boolean 
     */
    public function getBestseller()
    {
        return $this->bestseller;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $delivery_points;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->delivery_points = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add delivery_points
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint $deliveryPoints
     * @return ShopEntry
     */
    public function addDeliveryPoint(\AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint $deliveryPoints)
    {
        $this->delivery_points[] = $deliveryPoints;

        return $this;
    }

    /**
     * Remove delivery_points
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint $deliveryPoints
     */
    public function removeDeliveryPoint(\AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint $deliveryPoints)
    {
        $this->delivery_points->removeElement($deliveryPoints);
    }

    /**
     * Get delivery_points
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeliveryPoints()
    {
        return $this->delivery_points;
    }
}
