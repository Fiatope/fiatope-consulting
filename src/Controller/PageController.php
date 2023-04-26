<?php

namespace App\Controller;

use App\Entity\ContactMessage;
use App\Form\ContactMessageType;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(priority: 1)]
class PageController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $em)
    {
    }

    #[Route('/', name: 'home')]
    public function home(CustomerRepository $customerRepository): Response
    {
        $customers = $customerRepository->findAll();

        return $this->render('page/home.html.twig', [
            'customers' => $customers
        ]);
    }

    #[Route('/nous-contacter', name: 'contact')]
    public function contact(Request $request): Response
    {
        $msg = new ContactMessage();

        $form = $this->createForm(ContactMessageType::class, $msg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ContactMessage $msg */
            $msg = $form->getData();
            $msg->setReceivedAt(new \DateTime());
            $this->em->persist($msg);
            $this->em->flush();
            $this->addFlash('success', 'Le message a bien été envoyé.');
            return $this->redirectToRoute('contact');
            // TODO : $this->bus->dispatch()
        }

        return $this->render('page/contact.html.twig', [
            'form' => $form
        ]);
    }
}
