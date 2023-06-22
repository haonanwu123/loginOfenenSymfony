<?php

namespace App\Controller;

use App\Entity\Dier;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $name = $this->getUser();

        $diers = $doctrine->getRepository(Dier::class)->findBy(['admin'])

        return $this->render('admin/index.html.twig',[
            'diers'=>$diers,
        ]);
    }
}
