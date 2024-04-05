<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Stmt\Foreach_;

class EtatFixture extends Fixture
{

    public const ETAT_OUVERTE = 'Ouverte';
    public const ETAT_CLOTUREE = 'Cloturee';
    public const ETAT_ENCOURS = 'En_cours';
    public const ETAT_TERMINEE = 'Terminee';
    public const ETAT_ANNULEE = 'Annulee';
    public const ETAT_HISTORISEE = 'Historisee';

    public function load(ObjectManager $manager): void
    {
        $libelles = [
            self::ETAT_OUVERTE    => "Ouverte",
            self::ETAT_CLOTUREE   => "Clôturée",
            self::ETAT_ENCOURS    => "En cours",
            self::ETAT_TERMINEE   => "Terminée",
            self::ETAT_ANNULEE    => "Annulée",
            self::ETAT_HISTORISEE => "Historisée"
        ];
        $referencesEtat = [];
        foreach ($libelles as $key => $libelle) {
            $etat = new Etat();
            $etat->setLibelle($libelle);
            $manager->persist($etat);
            $referenceEtat[$key] = $etat;
        }
        $manager->flush();

        $this->addReference(self::ETAT_OUVERTE, $referencesEtat[self::ETAT_OUVERTE]);
        $this->addReference(self::ETAT_CLOTUREE, $referencesEtat[self::ETAT_CLOTUREE]);
        $this->addReference(self::ETAT_ENCOURS, $referencesEtat[self::ETAT_ENCOURS]);
        $this->addReference(self::ETAT_TERMINEE, $referencesEtat[self::ETAT_TERMINEE]);
        $this->addReference(self::ETAT_ANNULEE, $referencesEtat[self::ETAT_ANNULEE]);
        $this->addReference(self::ETAT_HISTORISEE, $referencesEtat[self::ETAT_HISTORISEE]);
    }
}
