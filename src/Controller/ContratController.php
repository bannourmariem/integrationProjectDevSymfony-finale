<?php

namespace App\Controller;

use App\Entity\Contrat;
use App\Entity\Offre;
use App\Form\Contratreponse;
use App\Form\ContratType;
use App\Form\ContratType2;
use App\Form\ContratTypeaffectation;
 use App\Form\ContratTypeEdit;

use App\Repository\ContratRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contrat')]
class ContratController extends AbstractController
{

    #[Route('/', name: 'app_contrat_index', methods: ['GET'])]
    public function index(ContratRepository $pr, Request $request, EntityManagerInterface $entityManager): Response
    {
        $currentDate = new \DateTimeImmutable();
        $currentDate->modify('-2 months');
        $searchQuery = $request->query->get('search');
        $sort = $request->query->get('sort', 'asc');
        $contrats = $pr->findAll();
 
        $co = []; 
        
        
        
        



        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->render('contrat/index.html.twig', [
                'contrats' => $contrats,
              ]);
         }
        else  {
            return $this->render('xfront_office/contrat/index.html.twig', [
                'contrats' => $contrats,
              ]);
           
        }
       
    }



    #[Route('/actif', name: 'app_contrat_actif', methods: ['GET'])]
    public function actif(ContratRepository $contratRepository, EntityManagerInterface $entityManagerInterface): Response
    {




        $queryBuilder = $entityManagerInterface->createQueryBuilder();
        $queryBuilder
            ->select('c')
            ->from(Contrat::class, 'c')
            ->where('c.statut = :statut')
            ->setParameter('statut', true);

        $actif = $queryBuilder->getQuery()->getResult();


        return $this->render('contrat/actif.html.twig', [
            'contrats' => $actif,


        ]);
    }

 



    #[Route('/new', name: 'app_contrat_new')]
    public function new(Offre $offre, Request $request, EntityManagerInterface $entityManager): Response
    {
            $contrat = new Contrat();

            $form = $this->createForm(ContratType::class, $contrat);
            $form->handleRequest($request);
        $msg = '';
            if ($form->isSubmitted() && $form->isValid()) {
                $debut = $contrat->getDebut();
                $engagement= $contrat->getEngagement();
               $contrat->setfin($debut->modify("+$engagement months"));
            
            $current = new DateTime('now') ;
                    if ($current > $debut) {
                $msg = 'La date actuelle doit etre sup a la date debut ';  
                return $this->render('contrat/new.html.twig', [
                    'contrat' => $contrat,
                    'form' => $form,
                    'msg' => $msg,

                ]);
                    }
                // $contrat->setSent(false);
              //  $contrat->setClient($this->getUser());
              //  $contrat->setOffre($offre);

                $entityManager->persist($contrat);
                $entityManager->flush();

                return $this->redirectToRoute('app_contrat_index', [], Response::HTTP_SEE_OTHER);
            }

   
            return $this->render('contrat/new.html.twig', [
                'contrat' => $contrat,
                'form' => $form,
                'msg' => $msg,

            ]);
        }

 




    #[Route('/{id}', name: 'app_contrat_show', methods: ['GET'])]
    public function show(Contrat $contrat): Response
    {

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->render('contrat/show.html.twig', [
                'contrat' => $contrat,
            ]);
         }
        else  {
            return $this->render('xfront_office/contrat/show.html.twig', [
                'contrat' => $contrat,
            ]);
           
        }

       
    }

    #[Route('/{id}/edit', name: 'app_contrat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contrat $contrat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContratTypeEdit::class, $contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contrat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('contrat/edit.html.twig', [
            'contrat' => $contrat,
            'form' => $form,
        ]);
    }

     
 


    
 
    #[Route('/{id}', name: 'app_contrat_delete', methods: ['POST'])]
    public function delete(Request $request, Contrat $contrat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contrat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contrat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat_index', [], Response::HTTP_SEE_OTHER);
    }
}
