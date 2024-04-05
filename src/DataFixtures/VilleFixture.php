<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixture extends Fixture
{

    public const VILLE_TOULOUSE = 'toulouse';
    public const VILLE_MARSEILLE = 'marseille';
    public const VILLE_BORDEAUX = 'bordeaux';
    public const VILLE_PARIS = 'paris';
    public function load(ObjectManager $manager): void
    {
        $toulouse = new Ville();
        $toulouse->setNom('Toulouse');
        $toulouse->setCodePostal('31000');
        $manager->persist($toulouse);

        $marseille = new Ville();
        $marseille->setNom('Marseille');
        $marseille->setCodePostal('13000');
        $manager->persist($marseille);

        $bordeaux = new Ville();
        $bordeaux->setNom('Bordeaux');
        $bordeaux->setCodePostal('33000');
        $manager->persist($bordeaux);

        $paris = new Ville();
        $paris->setNom('Paris');
        $paris->setCodePostal('75000');
        $manager->persist($paris);

        $manager->flush();

        $this->addReference('toulouse', $toulouse);
        $this->addReference('marseille', $marseille);
        $this->addReference('bordeaux', $bordeaux);
        $this->addReference('paris', $paris);
    }
}
