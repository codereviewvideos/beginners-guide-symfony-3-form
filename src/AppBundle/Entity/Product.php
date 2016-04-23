<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="10", minMessage="this value was too short")
     */
    protected $title;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email()
     */
    protected $email;

//    /**
//     * @ORM\Column(type="datetime")
//     */
//    protected $availableFrom;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column(name="`integer`", type="integer")
     */
    protected $integer;

    /**
     * @ORM\Column(type="string")
     */
    protected $money;

    /**
     * @ORM\Column(type="integer")
     */
    protected $number;

    /**
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\Range(min=0, max=1)
     */
    protected $percent;

    /**
     * @ORM\Column(type="text")
     */
    protected $url;

    /**
     * @ORM\Column(name="`range`", type="integer")
     */
    protected $range;
    

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * @param mixed $availableFrom
     * @return Product
     */
    public function setAvailableFrom($availableFrom)
    {
        $this->availableFrom = $availableFrom;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Product
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSomeInteger()
    {
        return $this->someInteger;
    }

    /**
     * @param mixed $someInteger
     * @return Product
     */
    public function setSomeInteger($someInteger)
    {
        $this->someInteger = $someInteger;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     * @return Product
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return Product
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * @param mixed $percent
     * @return Product
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

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
     * @return Product
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param mixed $range
     * @return Product
     */
    public function setRange($range)
    {
        $this->range = $range;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInteger()
    {
        return $this->integer;
    }

    /**
     * @param mixed $integer
     * @return Product
     */
    public function setInteger($integer)
    {
        $this->integer = $integer;

        return $this;
    }







    

}