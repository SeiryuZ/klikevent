<?php
namespace KlikEvent\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="feedback")
 */
class Feedback
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    protected $fromName;

    /**
    * @ORM\Column(type="string", length=255, nullable=true)
    */
    protected $fromEmail;

    /**
     * @ORM\Column(type="text")
     */    
    protected $content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */    
    protected $submittedAt;
    // IMPORTANT! THIS IS STILL MANUAL, ADD DEFAULT VALUE, before insert



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
     * Set fromName
     *
     * @param string $fromName
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
    }

    /**
     * Get fromName
     *
     * @return string 
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Set fromEmail
     *
     * @param string $fromEmail
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;
    }

    /**
     * Get fromEmail
     *
     * @return string 
     */
    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    /**
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set submittedAt
     *
     * @param datetime $submittedAt
     */
    public function setSubmittedAt($submittedAt)
    {
        $this->submittedAt = $submittedAt;
    }

    /**
     * Get submittedAt
     *
     * @return datetime 
     */
    public function getSubmittedAt()
    {
        return $this->submittedAt;
    }
}