<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CampusFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $noms = ["CampusENI", "CampusToulouse", "CampusMarseille", "CampusBordeaux", "CampusParis"];
        $referencesCampus = [];
        foreach($noms as $nom){
            $campus = new Campus();
            $campus->setNom($nom);
            $manager->persist($campus);
        }

        $manager->flush();

        $this->addReference("CampusENI", $referencesCampus["CampusENI"]);
        $this->addReference("CampusToulouse", $referencesCampus["CampusToulouse"]);
        $this->addReference("CampusMarseille", $referencesCampus["CampusMarseille"]);
        $this->addReference("CampusBordeaux", $referencesCampus["CampusBordeaux"]);
        $this->addReference("CampusParis", $referencesCampus["CampusParis"]);
    }
}
