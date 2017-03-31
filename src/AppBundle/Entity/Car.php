<?php

namespace AppBundle\Entity;

/**
 * Car
 */
class Car
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $license_plate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Cars;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Cars = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set model
     *
     * @param string $model
     *
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set licensePlate
     *
     * @param string $licensePlate
     *
     * @return Car
     */
    public function setLicensePlate($licensePlate)
    {
        $this->license_plate = $licensePlate;

        return $this;
    }

    /**
     * Get licensePlate
     *
     * @return string
     */
    public function getLicensePlate()
    {
        return $this->license_plate;
    }

    /**
     * Add car
     *
     * @param \AppBundle\Entity\RentalHistory $car
     *
     * @return Car
     */
    public function addCar(\AppBundle\Entity\RentalHistory $car)
    {
        $this->Cars[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \AppBundle\Entity\RentalHistory $car
     */
    public function removeCar(\AppBundle\Entity\RentalHistory $car)
    {
        $this->Cars->removeElement($car);
    }

    /**
     * Get cars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCars()
    {
        return $this->Cars;
    }
    /**
     * @var string
     */
    private $picture;


    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Car
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    public function __toString()
    {
        return $this->getModel();
    }
}
