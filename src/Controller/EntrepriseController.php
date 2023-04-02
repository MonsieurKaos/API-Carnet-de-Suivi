<?php

namespace App\Controller;

use App\Entity\Eleve;
use App\Entity\Entreprise;
use App\Form\EntrepriseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

#[Route('/entreprise')]
class EntrepriseController extends AbstractController
{
    #[Route('/', name: 'app_entreprise_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, PersistenceManagerRegistry $doctrine): Response
    {
        $entreprises = $entityManager
            ->getRepository(Entreprise::class)
            ->findAll();
        foreach ($entreprises as $entreprise) {
            $this->completeEntreprise($doctrine, $entreprise);
        }
        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }

    #[Route('/new', name: 'app_entreprise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $entreprise = new Entreprise();
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!is_null($form->getData()->getEleve())) {
                $entreprise->setEleveId(
                    $form
                        ->getData()
                        ->getEleve()
                        ->getId(),
                );
            } else {
                $entreprise->setEleveId(0);
            }
            $entityManager->persist($entreprise);
            $entityManager->flush();

            return $this->redirectToRoute('app_entreprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entreprise/new.html.twig', [
            'entreprise' => $entreprise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_entreprise_show', methods: ['GET'])]
    public function show(Entreprise $entreprise, PersistenceManagerRegistry $doctrine): Response
    {
        $this->completeEntreprise($doctrine, $entreprise);

        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_entreprise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Entreprise $entreprise, EntityManagerInterface $entityManager, PersistenceManagerRegistry $doctrine): Response
    {
        $this->completeEntreprise($doctrine, $entreprise);
        $form = $this->createForm(EntrepriseType::class, $entreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!is_null($form->getData()->getEleve())) {
                $entreprise->setEleveId(
                    $form
                        ->getData()
                        ->getEleve()
                        ->getId(),
                );
            } else {
                $entreprise->setEleveId(0);
            }
            $entityManager->flush();

            return $this->redirectToRoute('app_entreprise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('entreprise/edit.html.twig', [
            'entreprise' => $entreprise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_entreprise_delete', methods: ['POST'])]
    public function delete(Request $request, Entreprise $entreprise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entreprise->getId(), $request->request->get('_token'))) {
            $entityManager->remove($entreprise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_entreprise_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @param PersistenceManagerRegistry $doctrine
     * @param Entreprise $entreprise
     * @return array
     */
    private function completeEntreprise(PersistenceManagerRegistry $doctrine, Entreprise $entreprise): array
    {
        $em2 = $doctrine->getManager();
        $queryBuilder2 = $em2->getRepository(Eleve::class)->createQueryBuilder('j');
        $queryBuilder2->andWhere('j.id =\'' . $entreprise->getEleveId() . '\'');
        $eleve = $queryBuilder2
            ->getQuery()
            ->getSingleResult();
        $entreprise->setEleve($eleve);
        return array($eleve);
    }

}
