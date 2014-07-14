<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * BlogEntry
 */
class BlogEntry
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
     * @var string
     */
    private $text;

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
     * @return BlogEntry
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
     * Set text
     *
     * @param string $text
     *
     * @return BlogEntry
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return BlogEntry
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
     * @return BlogEntry
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
     * @return BlogEntry
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
     * @return BlogEntry
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
    private $on_homepage;


    /**
     * Set on_homepage
     *
     * @param boolean $onHomepage
     * @return BlogEntry
     */
    public function setOnHomepage($onHomepage)
    {
        $this->on_homepage = $onHomepage;

        return $this;
    }

    /**
     * Get on_homepage
     *
     * @return boolean 
     */
    public function getOnHomepage()
    {
        return $this->on_homepage;
    }
    /**
     * @var string
     */
    private $image_url;


    /**
     * Set image_url
     *
     * @param string $imageUrl
     * @return BlogEntry
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
}
