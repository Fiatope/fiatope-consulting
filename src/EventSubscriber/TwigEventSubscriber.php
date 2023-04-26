<?php

namespace App\EventSubscriber;

use App\Repository\AddressRepository;
use App\Repository\BusinessAreaRepository;
use App\Repository\SocialMediaRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly Environment $twig,
        private readonly BusinessAreaRepository $areaRepository,
        private readonly AddressRepository $addressRepository,
        private readonly SocialMediaRepository $socialMediaRepository
    ) {
    }

    public function onKernelController(): void
    {
        $this->twig->addGlobal('areas', $this->areaRepository->findAll());
        $this->twig->addGlobal('addresses', $this->addressRepository->findAll());
        $this->twig->addGlobal('socials', $this->socialMediaRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
