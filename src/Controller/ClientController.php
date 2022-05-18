<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\Type\ClientType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    /**
     * @Route("/client/edit/{id}", methods={"GET"})
     */
    public function update(ManagerRegistry $doctrine, int $id, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $form = $this->createForm(ClientType::class, $client, array(
            'method' => 'GET',
        ));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $client = $form->getData();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('clients');
        }
        return $this->renderForm('client/new.html.twig', [
            'form' => $form,
        ]);

    }

    /**
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return Response
     * @Route("/add-client", name="add-client")
     */
    public function newClient(EntityManagerInterface $entityManager, Request $request): Response
    {
        $client = new Client();

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $client = $form->getData();
            $entityManager->persist($client);
            $entityManager->flush();

            return $this->redirectToRoute('clients');
        }

        return $this->renderForm('client/new.html.twig', [
            'form' => $form,
        ]);

    }

    /**
     * @Route("/client/delete/{id}")
     */
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $entityManager->remove($client);
        $entityManager->flush();

        return $this->redirectToRoute('clients');
    }

}