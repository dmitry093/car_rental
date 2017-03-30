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
use AppBundle\Entity\RentalPoint;


class LoadRentalPointData extends AbstractFixture implements  OrderedFixtureInterface
{
    public function load(ObjectManager $om)
    {
        $rp_lenina = new RentalPoint();
        $rp_lenina->setName("Ленина, 50");

        $rp_kp = new RentalPoint();
        $rp_kp->setName("Комсомольский пр-т, 40");

        $rp_parkovyi = new RentalPoint();
        $rp_parkovyi->setName("Парковый пр-т, 1");

        $rp_sibirskaya = new RentalPoint();
        $rp_sibirskaya->setName("Сибирская, 22");

        $rp_rybalko = new RentalPoint();
        $rp_rybalko->setName("Маршала Рыбалко, 15");

        $om->persist($rp_lenina);
        $om->persist($rp_kp);
        $om->persist($rp_parkovyi);
        $om->persist($rp_sibirskaya);
        $om->persist($rp_rybalko);

        $this->addReference('rentalpoint-lenina', $rp_lenina);
        $this->addReference('rentalpoint-kompros', $rp_kp);
        $this->addReference('rentalpoint-parkovyi', $rp_parkovyi);
        $this->addReference('rentalpoint-sibirskaya', $rp_sibirskaya);
        $this->addReference('rentalpoint-rybalko', $rp_rybalko);

    }
    public function getOrder()
    {
        return 2;
    }

}