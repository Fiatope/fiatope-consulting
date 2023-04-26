<?php

namespace App\EventSubscriber;

use App\Repository\AddressRepository;
use App\Repository\BusinessAreaRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly Environment $twig,
        private readonly BusinessAreaRepository $areaRepository,
        private readonly AddressRepository $addressRepository
    ) {
    }

    public function onKernelController(): void
    {
        $this->twig->addGlobal('areas', $this->areaRepository->findAll());
        $this->twig->addGlobal('addresses', $this->addressRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
