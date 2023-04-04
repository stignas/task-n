<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{

    #[Route('/article/edit/{id}', name: 'article_edit')]
    public function edit(Request $request, Article $article, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($article);
            $manager->flush();

            $this->addFlash('success','Article updated');
            return $this->redirectToRoute('home');
        }

        return $this->render('pages/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }

}