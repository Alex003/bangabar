<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * ApplicationReplySubject
 */
class ApplicationReplySubject
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
    private $subject;

    /**
     * @var string
     */
    private $assigned_text;

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
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply
     */
    private $reply;


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
     * @return ApplicationReplySubject
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
     * Set subject
     *
     * @param string $subject
     *
     * @return ApplicationReplySubject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set assigned_text
     *
     * @param string $assignedText
     *
     * @return ApplicationReplySubject
     */
    public function setAssignedText($assignedText)
    {
        $this->assigned_text = $assignedText;

        return $this;
    }

    /**
     * Get assigned_text
     *
     * @return string 
     */
    public function getAssignedText()
    {
        return $this->assigned_text;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return ApplicationReplySubject
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
     * @return ApplicationReplySubject
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
     * @return ApplicationReplySubject
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
     * Set reply
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $reply
     *
     * @return ApplicationReplySubject
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $replies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->replies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add replies
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $replies
     * @return ApplicationReplySubject
     */
    public function addReply(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $replies)
    {
        $this->replies[] = $replies;

        return $this;
    }

    /**
     * Remove replies
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $replies
     */
    public function removeReply(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReply $replies)
    {
        $this->replies->removeElement($replies);
    }

    /**
     * Get replies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReplies()
    {
        return $this->replies;
    }
}
