<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $marc = new Utilisateur();
        $marc->setTelephone('marc.brandt@gmail.com');
        $marc->setEmail('marc.brandt@gmail.com');
        $marc->setPassword($this->password->hashPassword($marc, 'marc'));
        $manager->persist($marc);

        $kevinBrave = new Utilisateur();
        $marc->setTelephone('kevin.brave@gmail.com');
        $kevinBrave->setEmail('kevin.brave@gmail.com');
        $kevinBrave->setPassword($this->password->hashPassword($kevinBrave, 'kevin'));
        $manager->persist($kevinBrave);

        $romainVictoire = new Utilisateur();
        $romainVictoire->setTelephone('romain.victoire@gmail.com');
        $romainVictoire->setEmail('romain.victoire@gmail.com');
        $romainVictoire->setPassword($this->password->hashPassword($romainVictoire, 'romain'));
        $manager->persist($romainVictoire);

        $manager->flush();

        $this->addReference('marc', $marc);
        $this->addReference('kevin_brave', $kevinBrave);
        $this->addReference('romain_victoire', $romainVictoire);
    }

    public function getDependencies()
    {
        return [
            CampusFixture::class,
        ];
    }
}
