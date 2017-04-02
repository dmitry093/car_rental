<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * RentalPoint
 */
class RentalPoint
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     * @Assert\Length(min=3)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $StartPoints;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $EndPoints;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->StartPoints = new \Doctrine\Common\Collections\ArrayCollection();
        $this->EndPoints = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return RentalPoint
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add startPoint
     *
     * @param \AppBundle\Entity\RentalHistory $startPoint
     *
     * @return RentalPoint
     */
    public function addStartPoint(\AppBundle\Entity\RentalHistory $startPoint)
    {
        $this->StartPoints[] = $startPoint;

        return $this;
    }

    /**
     * Remove startPoint
     *
     * @param \AppBundle\Entity\RentalHistory $startPoint
     */
    public function removeStartPoint(\AppBundle\Entity\RentalHistory $startPoint)
    {
        $this->StartPoints->removeElement($startPoint);
    }

    /**
     * Get startPoints
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStartPoints()
    {
        return $this->StartPoints;
    }

    /**
     * Add endPoint
     *
     * @param \AppBundle\Entity\RentalHistory $endPoint
     *
     * @return RentalPoint
     */
    public function addEndPoint(\AppBundle\Entity\RentalHistory $endPoint)
    {
        $this->EndPoints[] = $endPoint;

        return $this;
    }

    /**
     * Remove endPoint
     *
     * @param \AppBundle\Entity\RentalHistory $endPoint
     */
    public function removeEndPoint(\AppBundle\Entity\RentalHistory $endPoint)
    {
        $this->EndPoints->removeElement($endPoint);
    }

    /**
     * Get endPoints
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEndPoints()
    {
        return $this->EndPoints;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
