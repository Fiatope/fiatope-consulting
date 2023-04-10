<?php

namespace App\EventSubscriber;

use App\Repository\BusinessAreaRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly Environment $twig, private readonly BusinessAreaRepository $areaRepository)
    {
    }

    public function onKernelController(): void
    {
        $this->twig->addGlobal('areas', $this->areaRepository->findAll());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
