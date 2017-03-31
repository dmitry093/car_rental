<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 30.03.2017
 * Time: 15:24
 */
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Car;


class LoadCarData extends AbstractFixture implements  OrderedFixtureInterface
{
    public function load(ObjectManager $om)
    {
        $carVWPassat = new Car();
        $carVWPassat->setModel("Volkswagen Passat");
        $carVWPassat->setLicensePlate("A001AA159");
        $carVWPassat->setPicture("passat.jpeg");

        $carVWJetta = new Car();
        $carVWJetta->setModel("Volkswagen Jetta");
        $carVWJetta->setLicensePlate("A002AA159");
        $carVWJetta->setPicture("jetta.jpeg");

        $carVWPolo = new Car();
        $carVWPolo->setModel("Volkswagen Polo");
        $carVWPolo->setLicensePlate("A003AA159");
        $carVWPolo->setPicture("polo.jpeg");

        $carSkodaSuperb = new Car();
        $carSkodaSuperb->setModel("Skoda Superb");
        $carSkodaSuperb->setLicensePlate("B001BB159");
        $carSkodaSuperb->setPicture("superb.jpeg");

        $carSkodaRapid = new Car();
        $carSkodaRapid->setModel("Skoda Rapid");
        $carSkodaRapid->setLicensePlate("B002BB159");
        $carSkodaRapid->setPicture("rapid.jpeg");

        $carKiaOptima = new Car();
        $carKiaOptima->setModel("Kia Optima");
        $carKiaOptima->setLicensePlate("E001EE159");
        $carKiaOptima->setPicture("optima.jpeg");

        $carKiaRio = new Car();
        $carKiaRio->setModel("Kia Rio");
        $carKiaRio->setLicensePlate("E002EE159");
        $carKiaRio->setPicture("rio.jpeg");

        $om->persist($carVWPassat);
        $om->persist($carVWJetta);
        $om->persist($carVWPolo);

        $om->persist($carSkodaSuperb);
        $om->persist($carSkodaRapid);

        $om->persist($carKiaOptima);
        $om->persist($carKiaRio);

        $om->flush();

        $this->addReference('car-vw-passat', $carVWPassat);
        $this->addReference('car-vw-jetta', $carVWJetta);
        $this->addReference('car-vw-polo', $carVWPolo);

        $this->addReference('car-skoda-superb', $carSkodaSuperb);
        $this->addReference('car-skoda-rapid', $carSkodaRapid);

        $this->addReference('car-kia-optima', $carKiaOptima);
        $this->addReference('car-kia-rio', $carKiaRio);

    }
    public function getOrder()
    {
        return 1;
    }

}