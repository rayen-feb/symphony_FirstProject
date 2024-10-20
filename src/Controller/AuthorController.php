<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }
    #[Route('/lista', name: 'lista')]
    public function listAuth(ManagerRegistry $doctrine, Request $request): Response
    {
        $authorRepo=$doctrine->getRepository(Author::class);
        $authors=$authorRepo->findAll();

        $authorsCount = count($authors);
    dump($authorsCount);
        
        
        return $this->render('author/lista.html.twig', [
            'authors' => $authors
        ]);
    }
    #[Route('/show/{id}', name: 'showauth')]
    public function ShowAuth(ManagerRegistry $doctrine, $id): Response
    {
        $authorRepo=$doctrine->getRepository(Author::class);
        $author=$authorRepo->find($id);

        return $this->render('author/showA.html.twig', [
            'author' => $author,
        ]);
    }
    #[Route('/delete/{id}', name: 'deleteauth')]
    public function deleteAuth(ManagerRegistry $doctrine, $id): Response
    {
        $authorRepo=$doctrine->getRepository(Author::class);
        $author=$authorRepo->find($id);
        $em=$doctrine->getManager();
        $em->remove($author);
        $em->flush();
        return $this->redirectToRoute('lista');
    }
    #[Route('/addauthor', name: 'add_author')]
    public function addAuthor(ManagerRegistry $doctrine, Request $request): Response
    {
        $author= new Author(); // data init
        $form=$this->createForm(AuthorType::class,$author);//form create
        $form->add('Save',SubmitType::class);//import submit
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
        //// data persistence ///
        $em=$doctrine->getManager();
        $em->persist($author);
        $em->flush();
        return $this->redirectToRoute('lista');
        }
        return $this->render('author/addauthor.html.twig', [
            'authform' => $form->createView(),
        ]);
    }
    #[Route('/updateauth/{id}', name: 'update_author')]
    public function updateAuthor(ManagerRegistry $doctrine, Request $request, $id): Response
    {
        $authorRepo=$doctrine->getRepository(Author::class);
        $author=$authorRepo->find($id);
        $form=$this->createForm(AuthorType::class,$author);//form create
        $form->add('Update',SubmitType::class);//import submit
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
        //// data persistence ///
        $em=$doctrine->getManager();
        $em->persist($author);
        $em->flush();
        return $this->redirectToRoute('lista');
        }
        return $this->render('author/addauthor.html.twig', [
            'authform' => $form->createView(),
        ]);
    }
    
   }