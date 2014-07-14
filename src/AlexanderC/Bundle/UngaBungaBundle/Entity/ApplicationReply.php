<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

/**
 * ApplicationReply
 */
class ApplicationReply
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReplySubject
     */
    private $subject;

    /**
     * @var \AlexanderC\Bundle\UngaBungaBundle\Entity\Application
     */
    private $application;


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
     * Set text
     *
     * @param string $text
     *
     * @return ApplicationReply
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return ApplicationReply
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
     * Set subject
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReplySubject $subject
     *
     * @return ApplicationReply
     */
    public function setSubject(\AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReplySubject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \AlexanderC\Bundle\UngaBungaBundle\Entity\ApplicationReplySubject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set application
     *
     * @param \AlexanderC\Bundle\UngaBungaBundle\Entity\Application $application
     *
     * @return ApplicationReply
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
}
