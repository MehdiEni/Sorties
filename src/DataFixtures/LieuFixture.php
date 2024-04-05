<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Self_;

class LieuFixture extends Fixture implements DependentFixtureInterface
{
    public const LIEU_TOULOUSE = 'toulouse';
    public const LIEU_MARSEILLE = 'marseille';
    public const LIEU_BORDEAUX = 'bordeaux';
    public const LIEU_PARIS = 'paris';

    public function load(ObjectManager $manager): void
    {
        $donneeslieux = [
            self::LIEU_TOULOUSE  => [
                'nom'       => 'matabiau',
                'rue'       => 'rue_matabiau',
                'latitude'  => 37.65,
                'longitude' => 10.47,
                'ville'     => VilleFixture::VILLE_TOULOUSE
            ],
            self::LIEU_MARSEILLE => [
                'nom'       => 'paradis',
                'rue'       => 'rue_paradis',
                'latitude'  => 45.08,
                'longitude' => 65.60,
                'ville'     => VilleFixture::VILLE_MARSEILLE
            ],
            self::LIEU_BORDEAUX  => [
                'nom'       => 'blaye',
                'rue'       => 'rue_blaye',
                'latitude'  => 72.50,
                'longitude' => 19.68,
                'ville'     => VilleFixture::VILLE_BORDEAUX
            ],
            self::LIEU_PARIS     => [
                'nom'       => 'rivoli',
                'rue'       => 'rue_rivoli',
                'latitude'  => 22.13,
                'longitude' => 9.05,
                'ville'     => VilleFixture::VILLE_PARIS
            ],
        ];
        $referencesLieu = [];
        foreach ($donneeslieux as $key => $donneeslieu) {
            $lieu = new Lieu();
            $lieu->setNom($donneeslieu['nom']);
            $lieu->setRue($donneeslieu['rue']);
            $lieu->setLatitude($donneeslieu['latitude']);
            $lieu->setLongitude($donneeslieu['longitude']);
            $manager->persist($lieu);
            $referenceLieu[$key] = $lieu;
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            VilleFixture::class,
        ];
    }

}
