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

        $diers = $doctrine->getRepository(Dier::class)->findBy(['user'=>$name]);

        return $this->render('admin/index.html.twig',[
            'diers'=>$diers,
        ]);
    }

    #[Route('/delete/{id}', name: 'app_delete')]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $dierDelete = $entityManager->getRepository(Dier::class)->find($id);

        if (!$dierDelete) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $entityManager->remove($dierDelete);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin', [
            'id' => $dierDelete->getId()
        ]);
    }
}
