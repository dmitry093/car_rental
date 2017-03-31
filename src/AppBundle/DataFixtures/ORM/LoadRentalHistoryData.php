<?php
/**
 * Created by PhpStorm.
 * User: Dmitry
 * Date: 30.03.2017
 * Time: 15:24
 */
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\RentalHistory;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;



class LoadRentalHistoryData extends AbstractFixture implements  OrderedFixtureInterface
{
    public function load(ObjectManager $om)
    {
        $trip1 = new RentalHistory();
        $trip1->setCar($om->merge($this->getReference('car-vw-passat')));
        $trip1->setClientName('Иванов Иван Иванович');

        $trip1->setRentalPointStart($om->merge($this->getReference('rentalpoint-lenina')));
        $trip1->setDateStart(new \DateTime('2017-03-30 15:00:00'));

        $trip1->setRentalPointEnd($om->merge($this->getReference('rentalpoint-lenina')));
        $trip1->setDateEnd(new \DateTime('2017-03-30 17:00:00'));

        $trip2 = new RentalHistory();
        $trip2->setCar($om->merge($this->getReference('car-vw-jetta')));
        $trip2->setClientName('Петров Петр Петрович');

        $trip2->setRentalPointStart($om->merge($this->getReference('rentalpoint-rybalko')));
        $trip2->setDateStart(new \DateTime('2017-03-30 16:00:00'));

        $trip2->setRentalPointEnd($om->merge($this->getReference('rentalpoint-lenina')));
        $trip2->setDateEnd(new \DateTime('2017-03-31 09:00:00'));

        $trip3 = new RentalHistory();
        $trip3->setCar($om->merge($this->getReference('car-kia-optima')));
        $trip3->setClientName('Сидоров Сидр Сидорович');

        $trip3->setRentalPointStart($om->merge($this->getReference('rentalpoint-parkovyi')));
        $trip3->setDateStart(new \DateTime('2017-03-30 18:00:00'));

        $trip3->setRentalPointEnd($om->merge($this->getReference('rentalpoint-kompros')));
        $trip3->setDateEnd(new \DateTime('2017-03-30 22:00:00'));

        $trip4 = new RentalHistory();
        $trip4->setCar($om->merge($this->getReference('car-skoda-superb')));
        $trip4->setClientName('Андреев Андрей Андреевич');

        $trip4->setRentalPointStart($om->merge($this->getReference('rentalpoint-sibirskaya')));
        $trip4->setDateStart(new \DateTime('2017-03-30 22:00:00'));

        $trip4->setRentalPointEnd($om->merge($this->getReference('rentalpoint-parkovyi')));
        $trip4->setDateEnd(new \DateTime('2017-03-31 21:00:00'));

        $om->persist($trip1);
        $om->persist($trip2);
        $om->persist($trip3);
        $om->persist($trip4);

        $om->flush();

    }
    public function getOrder()
    {
        return 3;
    }

}