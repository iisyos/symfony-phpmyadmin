<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HogeController extends AbstractController
{


    #[Route('/hoge', name: 'app_hoge')]
    public function index(): Response
    {
        return $this->render('hoge/index.html.twig', [
            'controller_name' => 'HogeController',
        ]);
    }

    #[Route('/create/{name}/{age}', name: 'create')]
    public function create(ManagerRegistry $doctrine, $name, $age): JsonResponse
    {
        $em = $doctrine->getManager();
        $User = new User();
        $User->setName($name)->setAge($age);
        $em->persist($User);
        $em->flush();

        return $this->json(['ok' => true]);;
    }
}
