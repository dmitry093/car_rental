<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * RentalHistory
 */
class RentalHistory
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date_start;

    /**
     * @var \DateTime
     */
    private $date_end;

    /**
     * @var string
     * @Assert\Length(min=3)
     */
    private $client_name;

    /**
     * @var \AppBundle\Entity\RentalPoint
     */
    private $RentalPointStart;

    /**
     * @var \AppBundle\Entity\RentalPoint
     */
    private $RentalPointEnd;

    /**
     * @var \AppBundle\Entity\Car
     */
    private $Car;


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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return RentalHistory
     */
    public function setDateStart($dateStart)
    {
        $this->date_start = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->date_start;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return RentalHistory
     */
    public function setDateEnd($dateEnd)
    {
        $this->date_end = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     *
     * @return RentalHistory
     */
    public function setClientName($clientName)
    {
        $this->client_name = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Set rentalPointStart
     *
     * @param \AppBundle\Entity\RentalPoint $rentalPointStart
     *
     * @return RentalHistory
     */
    public function setRentalPointStart(\AppBundle\Entity\RentalPoint $rentalPointStart = null)
    {
        $this->RentalPointStart = $rentalPointStart;

        return $this;
    }

    /**
     * Get rentalPointStart
     *
     * @return \AppBundle\Entity\RentalPoint
     */
    public function getRentalPointStart()
    {
        return $this->RentalPointStart;
    }

    /**
     * Set rentalPointEnd
     *
     * @param \AppBundle\Entity\RentalPoint $rentalPointEnd
     *
     * @return RentalHistory
     */
    public function setRentalPointEnd(\AppBundle\Entity\RentalPoint $rentalPointEnd = null)
    {
        $this->RentalPointEnd = $rentalPointEnd;

        return $this;
    }

    /**
     * Get rentalPointEnd
     *
     * @return \AppBundle\Entity\RentalPoint
     */
    public function getRentalPointEnd()
    {
        return $this->RentalPointEnd;
    }

    /**
     * Set car
     *
     * @param \AppBundle\Entity\Car $car
     *
     * @return RentalHistory
     */
    public function setCar(\AppBundle\Entity\Car $car = null)
    {
        $this->Car = $car;

        return $this;
    }

    /**
     * Get car
     *
     * @return \AppBundle\Entity\Car
     */
    public function getCar()
    {
        return $this->Car;
    }

    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if ($this->date_start->getTimestamp() > $this->date_end->getTimestamp()) {
            $context->buildViolation('Дата приемки авто не может быть раньше даты выдачи!')
                ->atPath('date_end')
                ->addViolation();
        }
    }

}
