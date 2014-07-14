<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * Customer
 */
class Customer
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
    private $password;

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
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\PromoCode
     */
    private $promo_code;

    /**
     * @var string
     */
    protected $promo_code_text;

    /**
     * @param string $promo_code_text
     */
    public function setPromoCodeText($promo_code_text)
    {
        $this->promo_code_text = $promo_code_text;
    }

    /**
     * @return string
     */
    public function getPromoCodeText()
    {
        return $this->promo_code_text;
    }

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
     * @return Customer
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
     * Set password
     *
     * @param string $password
     *
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Customer
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
     * @return Customer
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
     * @return Customer
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
     * Set promo_code
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\PromoCode $promoCode
     *
     * @return Customer
     */
    public function setPromoCode(\AlexanderC\Bundle\UngaBungaBundle\Entity\PromoCode $promoCode = null)
    {
        $this->promo_code = $promoCode;

        return $this;
    }

    /**
     * Get promo_code
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\PromoCode 
     */
    public function getPromoCode()
    {
        return $this->promo_code;
    }

    /**
     * @return array
     */
    public function getArrayInfo()
    {
        return array(
            'id' => $this->id,
            'email' => $this->email,
        );
    }
    /**
     * @var boolean
     */
    private $confirmed = false;

    /**
     * @var string
     */
    private $token;


    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return Customer
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean 
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Customer
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }
}
