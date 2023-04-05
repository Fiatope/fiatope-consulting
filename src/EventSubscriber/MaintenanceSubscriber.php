<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

class MaintenanceSubscriber implements EventSubscriberInterface
{
    private const ROOT = __DIR__ . '/../../';

    /**
     * If the lock file exists, set the app in maintenance mode (503).
     *
     * @throws ServiceUnavailableHttpException
     */
    public function onKernelRequest(): void
    {
        if (!file_exists(self::ROOT . 'lock')) {
            return;
        }

        throw new ServiceUnavailableHttpException();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 512]
        ];
    }
}
