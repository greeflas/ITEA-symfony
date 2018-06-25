<?php

namespace App\Controller;

use App\Model\ContactsPage;
use App\Service\MessageGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    private $messageGenerator;
    private $logger;

    public function __construct(MessageGenerator $messageGenerator, LoggerInterface $logger)
    {
        $this->messageGenerator = $messageGenerator;
        $this->logger = $logger;
    }

    public function index(): Response
    {
        return new Response('Symfony4 is great!');
    }

    public function contacts(): Response
    {
        $this->logger->info('User reached contacts page.');

        $model = new ContactsPage(
        'info@itea.ua',
            $this->messageGenerator->generate()
        );

        return $this->render('default/index.html.twig', [
            'contacts' => $model,
        ]);
    }
}
