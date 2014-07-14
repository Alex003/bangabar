<?php

namespace AlexanderC\Bundle\UngaBungaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settings
 */
class Settings
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $applicant_info;


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
     * Set applicant_info
     *
     * @param string $applicantInfo
     * @return Settings
     */
    public function setApplicantInfo($applicantInfo)
    {
        $this->applicant_info = $applicantInfo;

        return $this;
    }

    /**
     * Get applicant_info
     *
     * @return string 
     */
    public function getApplicantInfo()
    {
        return $this->applicant_info;
    }
    /**
     * @var array
     */
    private $slider_images = array();


    /**
     * Set slider_images
     *
     * @param array $sliderImages
     * @return Settings
     */
    public function setSliderImages($sliderImages)
    {
        $this->slider_images = $sliderImages;

        return $this;
    }

    /**
     * Get slider_images
     *
     * @return array 
     */
    public function getSliderImages()
    {
        return $this->slider_images ? : array();
    }

    /**
     * @return string
     */
    public function getSliderImagesText()
    {
        return implode("\n", $this->getSliderImages());
    }

    /**
     * @param string $text
     */
    public function setSliderImagesText($text)
    {
        $this->slider_images = array_map(function($v) {
                return trim($v);
            }, explode("\n", trim($text)));
    }
}
