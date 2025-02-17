<?php

namespace App\Controller;

use App\Entity\Assurance;
use App\Form\AssuranceType;
use App\Repository\AssuranceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/assurance')]
class AssuranceController extends AbstractController
{
    #[Route('/', name: 'app_assurance_index', methods: ['GET'])]
    public function index( Request $request ,AssuranceRepository $assuranceRepository): Response
    {
        $user = $this->getUser(); //utilisateur connecté
        $searchTerm = $request->query->get('search');
        $assurances = [];
    
            if ($searchTerm) {
                // Perform a search in the repository based on the search term
                $assurances = $assuranceRepository->findBySearchTerm($searchTerm);
            } else {
                // If no search term, retrieve all assurances
                $assurances = $assuranceRepository->findAll();
            }

            if ($this->isGranted("ROLE_ADMIN")) {
                return $this->render('assurance/index.html.twig', [
                    'assurances' => $assuranceRepository->findAll(),
                ]);
            }else {
                return $this->render('assurance/indexClient.html.twig', [
                    'assurances' => $assuranceRepository->findAll(),
                ]);       
             }

    
        return $this->render('assurance/index.html.twig', [
            'assurances' => $assurances,
            'searchTerm' => $searchTerm,
        ]);
    }






    #[Route('/new', name: 'app_assurance_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $assurance = new Assurance();
        $form = $this->createForm(AssuranceType::class, $assurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getUser(); //utilisateur connecté
          //  $assurance->setCreatedby($user);

            $entityManager->persist($assurance);
            $entityManager->flush();

            return $this->redirectToRoute('app_assurance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('assurance/new.html.twig', [
            'assurance' => $assurance,
            'form' => $form->createView(),
        ]);
    }



    #[Route('/{id}', name: 'app_assurance_show', methods: ['GET'])]
    public function show(Assurance $assurance): Response
    { 
         if ($this->isGranted("ROLE_ADMIN")) {
        return $this->render('constat/show.html.twig', [
            'assurance' => $assurance,
        ]);
    } else {
        return $this->render('assurance/showClient.html.twig', [
            'assurance' => $assurance,
        ]);
    }
    }



    #[Route('/{id}/edit', name: 'app_assurance_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Assurance $assurance, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AssuranceType::class, $assurance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_assurance_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($this->isGranted("ROLE_ADMIN")) {
            return $this->render('assurance/edit.html.twig', [
                'assurance' => $assurance,
                'form' => $form->createView(),
            ]);
        } else {
            return $this->render('assurance/editClient.html.twig', [
                'assurance' => $assurance,
                'form' => $form,
            ]);
        }
    
    }

    #[Route('/{id}', name: 'app_assurance_delete', methods: ['POST'])]
    public function delete(Request $request, Assurance $assurance, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assurance->getId(), $request->request->get('_token'))) {
            $entityManager->remove($assurance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_assurance_index', [], Response::HTTP_SEE_OTHER);
    }


    
}
