<?php

namespace App\Controller;

use App\Entity\News;
use App\Form\NewsAddType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="app_admin_")
 * @IsGranted("ROLE_USER")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $allNews = $entityManager->getRepository(News::class)->findAll();
        return $this->render('admin/index.html.twig', [
            'allNews' => $allNews
        ]);
    }

    /**
     * @Route("/add", name="add_news")
     * @Route("/edit/{news}", name="edit_news")
     */
    public function adminAddNews(Request $request, EntityManagerInterface $entityManager, News $news = null)
    {
        if (!$news) {
            $news = new News();
        }
        $newsform = $this->createForm(NewsAddType::class, $news);

        $newsform->handleRequest($request);
        if ($newsform->isSubmitted() && $newsform->isValid()) {

            $entityManager->persist($news);
            $entityManager->flush();

            $this->addFlash("success", "Sikeres hozzáadás");
            return $this->redirectToRoute("app_admin_index");
        }

        return $this->render('admin/form.html.twig', [
            'newsform' => $newsform->createView()
        ]);
    }
    /**
     * @Route("/delete/{news}", name="delete_news")
     */
    public function newsDelete(EntityManagerInterface $entityManager, News $news)
    {
        $entityManager->remove($news);
        $entityManager->flush();
        return $this->redirectToRoute("app_admin_index");
    }
}



