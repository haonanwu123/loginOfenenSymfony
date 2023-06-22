<?php

namespace App\Controller;

use App\Entity\Dier;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemberController extends AbstractController
{
    #[Route('/member', name: 'app_member')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $diers = $doctrine->getRepository(Dier::class)->findAll();

        return $this->render('member/index.html.twig',[
            'diers'=>$diers,
        ]);
    }
}
