<?php

namespace Scoreboard\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Scoreboard\UserBundle\Entityy\User;

/**
 * Score
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Scoreboard\AppBundle\Entity\ScoreRepository")
 */
class Score
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Scoreboard\UserBundle\Entity\User", inversedBy="givenScores")
     * @ORM\JoinColumn(name="given_by_id", referencedColumnName="id")
     */
    private $givenBy;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Scoreboard\UserBundle\Entity\User", inversedBy="receivedScores")
     * @ORM\JoinColumn(name="given_to_id", referencedColumnName="id")
     */
    private $givenTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="smallint")
     */
    private $points;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


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
     * Set givenBy
     *
     * @param integer $givenBy
     * @return Score
     */
    public function setGivenBy(User $givenBy)
    {
        $this->givenBy = $givenBy;
    
        return $this;
    }

    /**
     * Get givenBy
     *
     * @return integer 
     */
    public function getGivenBy()
    {
        return $this->givenBy;
    }

    /**
     * Set givenTo
     *
     * @param integer $givenTo
     * @return Score
     */
    public function setGivenTo(User $givenTo)
    {
        $this->givenTo = $givenTo;
    
        return $this;
    }

    /**
     * Get givenTo
     *
     * @return integer 
     */
    public function getGivenTo()
    {
        return $this->givenTo;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Score
     */
    public function setPoints($points)
    {
        $this->points = $points;
    
        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Score
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

    /**
     * Set comment
     *
     * @param string $comment
     * @return Score
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }
}
