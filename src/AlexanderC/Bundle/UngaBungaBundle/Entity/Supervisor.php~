<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * Supervisor
 */
class Supervisor
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
    private $operators;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operators = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Supervisor
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
     * @return Supervisor
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Supervisor
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
     * @return Supervisor
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
     * Add operators
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Operator $operators
     *
     * @return Supervisor
     */
    public function addOperator(\AlexanderC\Bundle\UngaBungaBundle\Entity\Operator $operators)
    {
        $this->operators[] = $operators;

        return $this;
    }

    /**
     * Remove operators
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Operator $operators
     */
    public function removeOperator(\AlexanderC\Bundle\UngaBungaBundle\Entity\Operator $operators)
    {
        $this->operators->removeElement($operators);
    }

    /**
     * Get operators
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperators()
    {
        return $this->operators;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->nick;
    }
}
