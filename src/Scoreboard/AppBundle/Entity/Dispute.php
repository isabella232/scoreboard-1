<?php

namespace Scoreboard\AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dispute
 *
 * @ORM\Table(name="dispute")
 * @ORM\Entity(repositoryClass="Scoreboard\AppBundle\Entity\DisputeRepository")
 */
class Dispute
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Score
     *
     * @ORM\ManyToOne(targetEntity="Scoreboard\AppBundle\Entity\Score", inversedBy="disputes")
     * @ORM\JoinColumn(name="score_id", referencedColumnName="id")
     */
    private $score;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Scoreboard\UserBundle\Entity\User", inversedBy="disputes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expirationDate", type="datetime")
     */
    private $expirationDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="success", type="boolean")
     */
    private $success = FALSE;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="successDate", type="datetime", nullable=TRUE)
     */
    private $successDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    public function __construct() 
    {
        $this->creationDate = new DateTime();
        $this->expirationDate = new DateTime('+1 day');
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
     * Set score
     *
     * @param integer $score
     * @return Dispute
     */
    public function setScore($score)
    {
        $this->score = $score;
    
        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Dispute
     */
    public function setUser($user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set expirationDate
     *
     * @param \DateTime $expirationDate
     * @return Dispute
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;
    
        return $this;
    }

    /**
     * Get expirationDate
     *
     * @return \DateTime 
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set success
     *
     * @param boolean $success
     * @return Dispute
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    
        return $this;
    }

    /**
     * Get success
     *
     * @return boolean 
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set successDate
     *
     * @param \DateTime $successDate
     * @return Dispute
     */
    public function setSuccessDate($successDate)
    {
        $this->successDate = $successDate;
    
        return $this;
    }

    /**
     * Get successDate
     *
     * @return \DateTime 
     */
    public function getSuccessDate()
    {
        return $this->successDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Dispute
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }
}
