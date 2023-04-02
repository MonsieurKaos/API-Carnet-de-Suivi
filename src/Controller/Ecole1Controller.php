<?php

namespace App\Controller;

use App\Entity\Ecole1;
use App\Form\Ecole1Type;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ecole1')]
class Ecole1Controller extends AbstractController
{
    #[Route('/', name: 'app_ecole1_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ecole1s = $entityManager
            ->getRepository(Ecole1::class)
            ->findAll();
        return $this->render('ecole1/index.html.twig', [
            'ecole1s' => $ecole1s,
        ]);
    }

    #[Route('/new', name: 'app_ecole1_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $ecole1 = new Ecole1();
        $logger->critical("ICI");
        $form = $this->createForm(Ecole1Type::class, $ecole1);
        $form->handleRequest($request);

        $logger->critical("là");
        if ($form->isSubmitted() && $form->isValid()) {
            $logger->critical("là2");
            if (!is_null($form->getData()->getEleveId())) {
                $ecole1->setEleveId(
                    $form
                        ->getData()
                        ->getEleveId()
                        ->getId(),
                );
            } else {
                $ecole1->setEleveId(0);
            }
            $entityManager->persist($ecole1);
            $entityManager->flush();

            return $this->redirectToRoute('app_ecole1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ecole1/new.html.twig', [
            'ecole1' => $ecole1,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ecole1_show', methods: ['GET'])]
    public function show(Ecole1 $ecole1): Response
    {
        return $this->render('ecole1/show.html.twig', [
            'ecole1' => $ecole1,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ecole1_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ecole1 $ecole1, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Ecole1Type::class, $ecole1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ecole1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ecole1/edit.html.twig', [
            'ecole1' => $ecole1,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ecole1_delete', methods: ['POST'])]
    public function delete(Request $request, Ecole1 $ecole1, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ecole1->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ecole1);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ecole1_index', [], Response::HTTP_SEE_OTHER);
    }
}
