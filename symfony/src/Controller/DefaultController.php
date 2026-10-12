<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DefaultController extends AbstractController {

    public function __construct(
        #[Autowire(param: 'my_secret')]
        private readonly string $mySercret,
    ) {}

    #[Route('/', name:'index', options:['methods' => ['GET']])]
    public function index(): Response {
        return new Response(sprintf("My secret is : %s", $this->mySercret));
    }
}