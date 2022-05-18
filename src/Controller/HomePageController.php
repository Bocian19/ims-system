<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Delegation;
use App\Entity\Employee;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @return Response
     * @Route("/")
     */
    public function homepage(): Response
    {

        return $this->render('homepage.html.twig');
    }

    /**
     * @return Response
     * @Route("/menu", name="menu")
     */
    public function menu(): Response
    {
        return  $this->render('menu.html.twig');
    }

    /**
     * @param ManagerRegistry $doctrine
     * @return Response
     * @Route("/employees", name="employees")
     */
    public function employees(ManagerRegistry $doctrine): Response
    {
        $employees = $doctrine->getRepository(Employee::class)->findAll();

        return $this->render('employees.html.twig', ['employees' => $employees,] );
    }

    /**
     * @return Response
     * @Route("/invoices")
     */
    public function showInvoices(): Response
    {
        return $this->render('invoices.html.twig');

    }

    /**
     * @param ManagerRegistry $doctrine
     * @return Response
     * @Route("/delegations")
     */
    public function showDelegations(ManagerRegistry $doctrine): Response
    {
        $delegations = $doctrine->getRepository(Delegation::class)->findAll();
        return $this->render('delegations.html.twig', ['delegations' => $delegations, ]);
    }

    /**
     * @param ManagerRegistry $doctrine
     * @return Response
     * @Route("/clients", name="clients")
     */
    public function showClients(ManagerRegistry $doctrine): Response
    {
        $clients = $doctrine->getRepository(Client::class)->findAll();
        return $this->render('clients.html.twig', ['clients' => $clients, ]);
    }

}