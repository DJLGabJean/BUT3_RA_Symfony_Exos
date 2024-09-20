<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BurgerController extends AbstractController
{
    #[Route('/burger', name: 'burger')]
    public function list(): Response
    {
        return $this->render('burger_list.html.twig');
    }

    #[Route('/burger/{id}', name: 'burger_id')]
    public function show(int $id): Response
    {
        $burgers = [
            1 => [
                'name' => 'Le Big Burger',
                'description' => 'Un burger classique avec du fromage, de la salade et des tomates.',
            ],
            2 => [
                'name' => 'Le Veggie Burger',
                'description' => 'Un burger végétarien avec des légumes grillés et une sauce spéciale.',
            ],
            // Ajouter d'autres burgers ici...
        ];
    
        if (!array_key_exists($id, $burgers)) {
            return $this->render('error.html.twig');
        }
    
        return $this->render('burger_show.html.twig', [
            'id' => $id,
            'name' => $burgers[$id]['name'],
            'description' => $burgers[$id]['description'],
        ]);
    }
}