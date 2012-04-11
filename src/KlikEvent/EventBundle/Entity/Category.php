<?php
namespace KlikEvent\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $categoryName;

    /**
     * @ORM\Column(type="text")
     */
    protected $categoryDescription;

    /**
     * @ORM\ManyToMany(targetEntity="Event", mappedBy="eventCategories")
     */
    protected $events;

    public function __construct() {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set categoryName
     *
     * @param string $categoryName
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set categoryDescription
     *
     * @param text $categoryDescription
     */
    public function setCategoryDescription($categoryDescription)
    {
        $this->categoryDescription = $categoryDescription;
    }

    /**
     * Get categoryDescription
     *
     * @return text 
     */
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }

    /**
     * Add events
     *
     * @param KlikEvent\EventBundle\Entity\Event $events
     */
    public function addEvent(\KlikEvent\EventBundle\Entity\Event $events)
    {
        $this->events[] = $events;
    }

    /**
     * Get events
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }
}