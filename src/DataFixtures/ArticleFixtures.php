<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ( $i = 1; $i<=3; $i++) {
            $category = new Category();
            $category->setName($faker->sentence());
            $manager->persist($category);

            for ($j = 1; $j <= 10; $j++) {
                $artcile = new Article();
                $content = '<p>' . join($faker->paragraphs(5), '</p ><p >') .'</p>';
            $artcile->setTitle($faker->sentence())
                ->setContent($content)
                ->setCategory($category);
            $manager->persist($artcile);
        }
        }
        $manager->flush();
    }
}
