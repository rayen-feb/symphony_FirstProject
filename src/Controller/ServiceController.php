<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse; // Correct import for RedirectResponse
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service{name}', name: 'show_service')]
    public function showService(string $name): Response
    {
        // You can use the $name variable here, for example:
        return $this->render('service/showService.html.twig', [
            'name' => $name,
        ]);
    }


    #[Route('/service/index', name: 'service_go_to_index')]
    public function goToIndex(): RedirectResponse
    {
        // Redirect to the index method in HomeController
        return $this->redirectToRoute('app_home'); // Match this route name with HomeController
    }
    


}
