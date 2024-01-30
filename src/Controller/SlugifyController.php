<?php

namespace App\Controller;

use App\Form\SlugifyFormType;
use App\Service\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SlugifyController extends AbstractController
{
    #[Route('/slugify', name: 'app_slugify')]
    public function slugify(Request $request, Slugify $slugifyService): Response
    {
        $form = $this->createForm(SlugifyFormType::class);
        $form->handleRequest($request);

        $slug = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $phrase = $form->get('phrase')->getData();
            $slug = $slugifyService->slugify($phrase);
        }

        return $this->render('slugify/index.html.twig', [
            'form' => $form->createView(),
            'slug' => $slug,
        ]);
    }
}
