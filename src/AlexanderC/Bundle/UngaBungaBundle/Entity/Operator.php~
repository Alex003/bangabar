<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * Operator
 */
class Operator
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $nick;

    /**
     * @var string
     */
    private $wallet;

    /**
     * @var integer
     */
    private $apps_count = 0;

    /**
     * @var boolean
     */
    private $active;

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
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\Supervisor
     */
    private $supervisor;

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
     * Set email
     *
     * @param string $email
     *
     * @return Operator
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nick
     *
     * @param string $nick
     *
     * @return Operator
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set wallet
     *
     * @param string $wallet
     *
     * @return Operator
     */
    public function setWallet($wallet)
    {
        $this->wallet = $wallet;

        return $this;
    }

    /**
     * Get wallet
     *
     * @return string 
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * Set apps_count
     *
     * @param integer $appsCount
     *
     * @return Operator
     */
    public function setAppsCount($appsCount)
    {
        $this->apps_count = $appsCount;

        return $this;
    }

    /**
     * Get apps_count
     *
     * @return integer 
     */
    public function getAppsCount()
    {
        return $this->apps_count;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Operator
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Operator
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
     * @return Operator
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
     * @return Operator
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
     * Set supervisor
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Supervisor $supervisor
     *
     * @return Operator
     */
    public function setSupervisor(\AlexanderC\Bundle\UngaBungaBundle\Entity\Supervisor $supervisor = null)
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    /**
     * Get supervisor
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\Supervisor 
     */
    public function getSupervisor()
    {
        return $this->supervisor;
    }
    /**
     * @var integer
     */
    private $closed_apps_count = 0;


    /**
     * Set closed_apps_count
     *
     * @param integer $closedAppsCount
     * @return Operator
     */
    public function setClosedAppsCount($closedAppsCount)
    {
        $this->closed_apps_count = $closedAppsCount;

        return $this;
    }

    /**
     * Get closed_apps_count
     *
     * @return integer 
     */
    public function getClosedAppsCount()
    {
        return $this->closed_apps_count;
    }
}
