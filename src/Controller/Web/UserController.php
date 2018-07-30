<?php

namespace App\Controller\Web;

use App\Entity\User;
use App\Form\UserType;
use App\Service\Filesystem\FileManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    public function create(Request $request, FileManager $fileManager): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($fileName = $fileManager->upload($user->getAvatar())) {
                $user->setAvatar($fileName);

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('user_info', [
                    'id' => $user->getId(),
                ]);
            }
        }

        return $this->render('user/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function info(int $id): Response
    {
        return new Response(\sprintf('User with ID %d was created successfully!', $id));
    }
}
