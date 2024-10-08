<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HelloController extends AbstractController
{
    private array $messages = [
        "Hello",
        "Hi",
        "Bye!"
    ];

    #[Route('/{limit?3}', name: 'app_index')]
    public function index(int $limit): Response
    {
        return $this->render('hello/index.html.twig', [
            'messages' => implode(', ', array_slice($this->messages, 0, $limit))
        ]);
    }

    #[Route('/messages/{id}', name: 'app_show_one')]
    public function showOne($id): Response
    {
        return $this->render('hello/show_one.html.twig', [
            'message' => $this->messages[$id]
        ]);
        /* return new Response($this->messages[$id]); */
    }
}
