<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
class BlogController extends AbstractController
{

    /**
     * @route ("/blog", name="blog")
     *
     */
   public function index(){

       $repo = $this->getDoctrine()->getRepository(Category::class);
       $categories = $repo->findAll();

       return $this->render('blog/index.html.twig', [
           'categories'=> $categories]);
   }

    /**
     * @Route("/blog/show/{id}", name="blog_article")
     */
    public function show(ArticleRepository $articleRepository, $id)
    {
        if(empty($id))
            $article = null;
        elseif(!empty($id)) {
            $article = $articleRepository->find($id);
        }
        return $this->render('blog/show.html.twig', [
            'article' => $article
        ]);
    }
}
