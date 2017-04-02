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

        $trip5 = new RentalHistory();
        $trip5->setCar($om->merge($this->getReference('car-kia-rio')));
        $trip5->setClientName('Федоров Федор Федорович');

        $trip5->setRentalPointStart($om->merge($this->getReference('rentalpoint-lenina')));
        $trip5->setDateStart(new \DateTime('2017-03-31 08:00:00'));

        $trip5->setRentalPointEnd($om->merge($this->getReference('rentalpoint-kompros')));
        $trip5->setDateEnd(new \DateTime('2017-03-31 09:00:00'));

        $trip6 = new RentalHistory();
        $trip6->setCar($om->merge($this->getReference('car-kia-optima')));
        $trip6->setClientName('Дмитриев Дмитрий Дмитриевич');

        $trip6->setRentalPointStart($om->merge($this->getReference('rentalpoint-lenina')));
        $trip6->setDateStart(new \DateTime('2017-03-31 10:00:00'));

        $trip6->setRentalPointEnd($om->merge($this->getReference('rentalpoint-parkovyi')));
        $trip6->setDateEnd(new \DateTime('2017-03-31 13:00:00'));

        $trip7 = new RentalHistory();
        $trip7->setCar($om->merge($this->getReference('car-vw-passat')));
        $trip7->setClientName('Сергеев Сергей Сергеевич');

        $trip7->setRentalPointStart($om->merge($this->getReference('rentalpoint-lenina')));
        $trip7->setDateStart(new \DateTime('2017-03-31 11:00:00'));

        $trip7->setRentalPointEnd($om->merge($this->getReference('rentalpoint-lenina')));
        $trip7->setDateEnd(new \DateTime('2017-03-31 16:00:00'));

        $trip8 = new RentalHistory();
        $trip8->setCar($om->merge($this->getReference('car-skoda-rapid')));
        $trip8->setClientName('Максимов Максим Максимович');

        $trip8->setRentalPointStart($om->merge($this->getReference('rentalpoint-sibirskaya')));
        $trip8->setDateStart(new \DateTime('2017-03-31 12:00:00'));

        $trip8->setRentalPointEnd($om->merge($this->getReference('rentalpoint-sibirskaya')));
        $trip8->setDateEnd(new \DateTime('2017-03-31 21:00:00'));

        $trip9 = new RentalHistory();
        $trip9->setCar($om->merge($this->getReference('car-skoda-rapid')));
        $trip9->setClientName('Вячеславов Вячеслав Вячеславович');

        $trip9->setRentalPointStart($om->merge($this->getReference('rentalpoint-sibirskaya')));
        $trip9->setDateStart(new \DateTime('2017-03-31 22:00:00'));

        $trip9->setRentalPointEnd($om->merge($this->getReference('rentalpoint-lenina')));
        $trip9->setDateEnd(new \DateTime('2017-03-31 23:00:00'));

        $trip10 = new RentalHistory();
        $trip10->setCar($om->merge($this->getReference('car-skoda-rapid')));
        $trip10->setClientName('Виталиев Виталий Витальевич');

        $trip10->setRentalPointStart($om->merge($this->getReference('rentalpoint-lenina')));
        $trip10->setDateStart(new \DateTime('2017-03-31 23:00:00'));

        $trip10->setRentalPointEnd($om->merge($this->getReference('rentalpoint-kompros')));
        $trip10->setDateEnd(new \DateTime('2017-04-01 10:00:00'));

        $trip11 = new RentalHistory();
        $trip11->setCar($om->merge($this->getReference('car-toyota-corolla')));
        $trip11->setClientName('Антонов Антон Антонович');

        $trip11->setRentalPointStart($om->merge($this->getReference('rentalpoint-parkovyi')));
        $trip11->setDateStart(new \DateTime('2017-04-01 09:00:00'));

        $trip11->setRentalPointEnd($om->merge($this->getReference('rentalpoint-parkovyi')));
        $trip11->setDateEnd(new \DateTime('2017-04-01 10:00:00'));

        $trip12 = new RentalHistory();
        $trip12->setCar($om->merge($this->getReference('car-toyota-camry')));
        $trip12->setClientName('Алексеев Алексей Алексеевич');

        $trip12->setRentalPointStart($om->merge($this->getReference('rentalpoint-kompros')));
        $trip12->setDateStart(new \DateTime('2017-04-01 12:00:00'));

        $trip12->setRentalPointEnd($om->merge($this->getReference('rentalpoint-kompros')));
        $trip12->setDateEnd(new \DateTime('2017-04-01 21:00:00'));

        $om->persist($trip1);
        $om->persist($trip2);
        $om->persist($trip3);
        $om->persist($trip4);
        $om->persist($trip5);
        $om->persist($trip6);
        $om->persist($trip7);
        $om->persist($trip8);
        $om->persist($trip9);
        $om->persist($trip10);
        $om->persist($trip11);
        $om->persist($trip12);

        $om->flush();

    }
    public function getOrder()
    {
        return 3;
    }

}