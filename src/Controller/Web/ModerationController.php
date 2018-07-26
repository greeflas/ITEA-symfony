<?php


namespace App\Controller\Web;

use App\Repository\BadWordApiRepository;
use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ModerationController extends AbstractController
{
    public function reject(Request $request, BadWordApiRepository $repository)
    {
        $badWords = $request->request->get('badWord');
        $repository->save($badWords);
    }
}
