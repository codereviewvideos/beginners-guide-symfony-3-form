<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="battles")
 */
class Battle
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Fighter")
     * @ORM\JoinColumn(name="fighter_id", referencedColumnName="id")
     * @Assert\Count(min="2", max="2")
     */
    protected $fighters;


    public function __construct()
    {
        $this->fighters = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFighters()
    {
        return $this->fighters;
    }

    /**
     * @param mixed $fighters
     * @return Battle
     */
    public function setFighters($fighters)
    {
        $this->fighters = $fighters;

        return $this;
    }

}