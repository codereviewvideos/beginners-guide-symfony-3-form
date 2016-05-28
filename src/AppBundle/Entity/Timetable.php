<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Timetable
 * @ORM\Table(name="timetable")
 * @ORM\Entity()
 */
class Timetable
{
    /**
     * @Assert\Callback()
     */
    public function validate(ExecutionContextInterface $context)
    {
        if ($this->getPresetChoice() === null && $this->getManualEntry() === null) {
            $context->buildViolation('Either a preset, or a manual entry must be supplied')->addViolation();
        }

        if ($this->getPresetChoice() !== null && $this->getManualEntry() !== null) {
            $context->buildViolation('Cannot use both a preset and a manual entry')->addViolation();
        }
    }

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $presetChoice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $manualEntry;

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
    public function getPresetChoice()
    {
        return $this->presetChoice;
    }

    /**
     * @param mixed $presetChoice
     * @return Timetable
     */
    public function setPresetChoice($presetChoice)
    {
        $this->presetChoice = $presetChoice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getManualEntry()
    {
        return $this->manualEntry;
    }

    /**
     * @param mixed $manualEntry
     * @return Timetable
     */
    public function setManualEntry($manualEntry)
    {
        $this->manualEntry = $manualEntry;

        return $this;
    }


}