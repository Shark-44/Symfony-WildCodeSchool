<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    private const PROGRAMMES = [
        ['title' => "Walking dead", 'synopsis' => "Des zombies envahissent la terre.", 'category' => "Horreur"],
        ['title' => "Halo", 'synopsis' => "Guerre au XXVIe siecle entre des Nations unies et l'Allianxce Covenante", 'category' => "Science-Fiction"],
        ['title' => "Lupin", 'synopsis' => "L'histoire d'un gentleman cambrioleur", 'category' => "Aventure"],
        ['title' => "The Crown", 'synopsis' => "La vie de la souveraine du Royaume-Uni Elisatbeth 2", 'category' => "Aventure"],
        ['title' => "Lucifer", 'synopsis' => " le « Seigneur des Enfers », Lucifer Morningstar abandonne son royaume et s'en va à Los Angeles", 'category' => "Horreur"],
        ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROGRAMMES as $programName){
            $program = new Program();
            $program->setTitle($programName['title']);
            $program->setSynopsis($programName['synopsis']);
            $program->setCategory($this->getReference('category_' . $programName['category']));
            $manager->persist($program);
            $this->addReference('program_' .$programName['title'], $program);
            
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
          CategoryFixtures::class,
        ];
    }
}


