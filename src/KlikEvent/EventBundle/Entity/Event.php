<?php
namespace KlikEvent\EventBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="events")
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $eventTitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $eventLocation1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $eventLocation2;

    /**
     * @ORM\Column(type="text")
     */
    protected $eventShortDescription;

    /**
     * @ORM\Column(type="text")
     */
    protected $eventDescription;

    /**
     * @ORM\Column(type="text")
     */
    protected $eventFurtherDescription;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="events")
     * @ORM\JoinTable(name="events_categories")
     */
    protected $eventCategories;

    public function __construct() {
        $this->eventCategories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="datetime")
     */
    protected $eventDateTimeBegin;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $eventDateTimeEnd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $eventCoverImage;

    /**
     * @ORM\Column(type="text")
     */
    protected $eventImages;

    /**
     * @ORM\Column(type="text")
     */
    protected $eventVideos;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isHot;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isPublished;

    /**
     * @ORM\Column(type="bigint")
     */
    protected $viewCount;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $timestamp;


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
     * Set eventTitle
     *
     * @param string $eventTitle
     */
    public function setEventTitle($eventTitle)
    {
        $this->eventTitle = $eventTitle;
    }

    /**
     * Get eventTitle
     *
     * @return string 
     */
    public function getEventTitle()
    {
        return $this->eventTitle;
    }

    /**
     * Set eventLocation1
     *
     * @param string $eventLocation1
     */
    public function setEventLocation1($eventLocation1)
    {
        $this->eventLocation1 = $eventLocation1;
    }

    /**
     * Get eventLocation1
     *
     * @return string 
     */
    public function getEventLocation1()
    {
        return $this->eventLocation1;
    }

    /**
     * Set eventLocation2
     *
     * @param string $eventLocation2
     */
    public function setEventLocation2($eventLocation2)
    {
        $this->eventLocation2 = $eventLocation2;
    }

    /**
     * Get eventLocation2
     *
     * @return string 
     */
    public function getEventLocation2()
    {
        return $this->eventLocation2;
    }

    /**
     * Set eventShortDescription
     *
     * @param text $eventShortDescription
     */
    public function setEventShortDescription($eventShortDescription)
    {
        $this->eventShortDescription = $eventShortDescription;
    }

    /**
     * Get eventShortDescription
     *
     * @return text 
     */
    public function getEventShortDescription()
    {
        return $this->eventShortDescription;
    }

    /**
     * Set eventDescription
     *
     * @param text $eventDescription
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;
    }

    /**
     * Get eventDescription
     *
     * @return text 
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * Set eventFurtherDescription
     *
     * @param text $eventFurtherDescription
     */
    public function setEventFurtherDescription($eventFurtherDescription)
    {
        $this->eventFurtherDescription = $eventFurtherDescription;
    }

    /**
     * Get eventFurtherDescription
     *
     * @return text 
     */
    public function getEventFurtherDescription()
    {
        return $this->eventFurtherDescription;
    }

    /**
     * Set eventDateTimeBegin
     *
     * @param datetime $eventDateTimeBegin
     */
    public function setEventDateTimeBegin($eventDateTimeBegin)
    {
        $this->eventDateTimeBegin = $eventDateTimeBegin;
    }

    /**
     * Get eventDateTimeBegin
     *
     * @return datetime 
     */
    public function getEventDateTimeBegin()
    {
        return $this->eventDateTimeBegin;
    }

    /**
     * Set eventDateTimeEnd
     *
     * @param datetime $eventDateTimeEnd
     */
    public function setEventDateTimeEnd($eventDateTimeEnd)
    {
        $this->eventDateTimeEnd = $eventDateTimeEnd;
    }

    /**
     * Get eventDateTimeEnd
     *
     * @return datetime 
     */
    public function getEventDateTimeEnd()
    {
        return $this->eventDateTimeEnd;
    }

    /**
     * Set eventCoverImage
     *
     * @param string $eventCoverImage
     */
    public function setEventCoverImage($eventCoverImage)
    {
        $this->eventCoverImage = $eventCoverImage;
    }

    /**
     * Get eventCoverImage
     *
     * @return string 
     */
    public function getEventCoverImage()
    {
        return $this->eventCoverImage;
    }

    /**
     * Set eventImages
     *
     * @param text $eventImages
     */
    public function setEventImages($eventImages)
    {
        $this->eventImages = $eventImages;
    }

    /**
     * Get eventImages
     *
     * @return text 
     */
    public function getEventImages()
    {
        return $this->eventImages;
    }

    /**
     * Set isHot
     *
     * @param boolean $isHot
     */
    public function setIsHot($isHot)
    {
        $this->isHot = $isHot;
    }

    /**
     * Get isHot
     *
     * @return boolean 
     */
    public function getIsHot()
    {
        return $this->isHot;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Get isPublished
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set viewCount
     *
     * @param bigint $viewCount
     */
    public function setViewCount($viewCount)
    {
        $this->viewCount = $viewCount;
    }

    /**
     * Get viewCount
     *
     * @return bigint 
     */
    public function getViewCount()
    {
        return $this->viewCount;
    }

    /**
     * Set timestamp
     *
     * @param datetime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * Get timestamp
     *
     * @return datetime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Add eventCategories
     *
     * @param KlikEvent\EventBundle\Entity\Category $eventCategories
     */
    public function addCategory(\KlikEvent\EventBundle\Entity\Category $eventCategories)
    {
        $this->eventCategories[] = $eventCategories;
    }

    /**
     * Get eventCategories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEventCategories()
    {
        return $this->eventCategories;
    }
}