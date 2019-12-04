<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news", name="news_")
 */
class NewsController extends AbstractController
{
    /**
     * @Route("/", name="all")
     */
    public function index(EntityManagerInterface $entityManager)
    {


        $allNews = $this
            ->getDoctrine()
            ->getRepository(News::class)
            ->findBy(['visible'=>1], ['id' => 'DESC']);



        return $this->render('news/index.html.twig', [
            'allNews' => $allNews
        ]);
    }

    /**
     * @Route("/{id}", name="detail")
     */
    public function newsDetail(EntityManagerInterface $entityManager, $id)
    {
        $thisNews = $entityManager->getRepository(News::class)->find($id);

        return $this->render('news/detail.html.twig', [
            'thisNews' => $thisNews
        ]);
    }
}

