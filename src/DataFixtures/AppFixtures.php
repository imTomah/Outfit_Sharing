<?php

namespace App\DataFixtures;

use DateTimeZone;
use App\Entity\Clothes;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = ['Sweat', 'Tee-Shirt', 'Veste', 'Pantalon', 'Chaussure','Accessoires'];
        $tabObj = [];
        foreach ($categories as $cat) {
            $category = new Category();
            $category->setName($cat);
            $tabObj[] = $category;
            $manager->persist($category);
        }

        // Création d'une variable date 
        $dateNow = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        // Création d'un produit
        $product = new Clothes();
        $product 
            ->setName('Box Logo')
            ->setPrice(450)
            ->setBrand('Supreme')
            ->setYear(\DateTime::createFromFormat('Y','2019'))
            ->setLink('https://www.supremenewyork.com/')
            ->setNovelty(false)
            ->setCategory($tabObj[0])
            ->setUpdateTime($dateNow);

        $manager->persist($product);
        
        $manager->flush();
    }
}
