<?php

namespace Scoreboard\AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Scoreboard\AppBundle\Exception\InvalidArgumentException;
use Scoreboard\UserBundle\Entity\User;

/**
 * Score
 *
 * @ORM\Table(name="score")
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Scoreboard\AppBundle\Entity\Dispute", mappedBy="score")
     * @ORM\OrderBy({"creationDate" = "DESC"})
     */
    private $disputes;

    public function __construct() 
    {
        $this->creationDate = new DateTime();
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
        if(! is_int($points) || $points < -3 || $points > 3 || $points == 0) {
            throw new InvalidArgumentException('Points out of range');
        }
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
    public function setCreationDate(DateTime $creationDate)
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
     * Set description
     *
     * @param string $description
     * @return Score
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set disputes
     *
     * @param Dispute $disputes
     * @return Score
     */
    public function addDispute(Dispute $dispute)
    {
        $this->disputes[] = $disputes;
    
        return $this;
    }

    /**
     * Get disputes
     *
     * @return Dispute
     */
    public function getdisputes()
    {
        return $this->disputes;
    }
}
