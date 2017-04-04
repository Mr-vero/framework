<?php

declare(strict_types=1);

namespace FondBot\Drivers\Extensions;

/**
 * Driver supports automatic webhook installation.
 */
interface WebhookInstallation
{
    /**
     * Initialize webhook in the external service.
     *
     * @param string $url
     */
    public function installWebhook(string $url): void;
}
