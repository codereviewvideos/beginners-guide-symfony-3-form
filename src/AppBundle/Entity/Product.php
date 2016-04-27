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
     * @ORM\Column(name="`integer`", type="integer")
     */
    protected $integer;

    /**
     * @ORM\Column(type="decimal", scale=3)
     */
    protected $number;

    /**
     * @ORM\Column(type="decimal", scale=3)
     */
    protected $float;

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
    public function getFloat()
    {
        return $this->float;
    }

    /**
     * @param mixed $float
     * @return Product
     */
    public function setFloat($float)
    {
        $this->float = $float;

        return $this;
    }


}