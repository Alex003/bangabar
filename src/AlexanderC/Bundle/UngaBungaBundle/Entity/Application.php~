<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * Application
 */
class Application
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
    private $unique_idx;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply
     */
    private $reply;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $data;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\Operator
     */
    private $operator;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint
     */
    private $delivery_point;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Application
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
     * Set unique_idx
     *
     * @param string $uniqueIdx
     *
     * @return Application
     */
    public function setUniqueIdx($uniqueIdx)
    {
        $this->unique_idx = $uniqueIdx;

        return $this;
    }

    /**
     * Get unique_idx
     *
     * @return string 
     */
    public function getUniqueIdx()
    {
        return $this->unique_idx;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Application
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
     * Set reply
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $reply
     *
     * @return Application
     */
    public function setReply(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $reply = null)
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * Get reply
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply 
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Add data
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data
     *
     * @return Application
     */
    public function addData(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data)
    {
        $this->data[] = $data;

        return $this;
    }

    /**
     * Remove data
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data
     */
    public function removeData(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data)
    {
        $this->data->removeElement($data);
    }

    /**
     * Get data
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set customer
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Customer $customer
     *
     * @return Application
     */
    public function setCustomer(\AlexanderC\Bundle\UngaBungaBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set operator
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Operator $operator
     *
     * @return Application
     */
    public function setOperator(\AlexanderC\Bundle\UngaBungaBundle\Entity\Operator $operator = null)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\Operator 
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set delivery_point
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint $deliveryPoint
     *
     * @return Application
     */
    public function setDeliveryPoint(\AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint $deliveryPoint = null)
    {
        $this->delivery_point = $deliveryPoint;

        return $this;
    }

    /**
     * Get delivery_point
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\DeliveryPoint 
     */
    public function getDeliveryPoint()
    {
        return $this->delivery_point;
    }

    /**
     * Add data
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data
     * @return Application
     */
    public function addDatum(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data)
    {
        $this->data[] = $data;

        return $this;
    }

    /**
     * Remove data
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data
     */
    public function removeDatum(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationData $data)
    {
        $this->data->removeElement($data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'email' => $this->email,
            'uniqueIdx' => $this->unique_idx,
            'wallet' => $this->operator->getWallet(),
            'deliveryPointId' => $this->delivery_point->getId(),
            'deliveryPointName' => $this->delivery_point->getName(),
            'deliveryPointDescription' => $this->delivery_point->getInfo()
        );
    }
}
