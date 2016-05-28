<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="datafeed")
 */
class DataFeed
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $url;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * @ORM\OneToOne(targetEntity="Timetable", cascade={"persist"})
     * @ORM\JoinColumn(name="timetable_id", referencedColumnName="id")
     * 
     * @Assert\Valid()
     */
    protected $timetable;

    /**
     * @ORM\OneToOne(targetEntity="Timetable", cascade={"persist"})
     * @ORM\JoinColumn(name="another_timetable_id", referencedColumnName="id")
     *
     * @Assert\Valid()
     */
    protected $anotherTimetable;
    

    public function __construct()
    {
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return DataFeed
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     * @return DataFeed
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     * @return DataFeed
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimetable()
    {
        return $this->timetable;
    }

    /**
     * @param mixed $timetable
     * @return DataFeed
     */
    public function setTimetable($timetable)
    {
        $this->timetable = $timetable;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAnotherTimetable()
    {
        return $this->anotherTimetable;
    }

    /**
     * @param mixed $anotherTimetable
     * @return DataFeed
     */
    public function setAnotherTimetable($anotherTimetable)
    {
        $this->anotherTimetable = $anotherTimetable;

        return $this;
    }
    
}