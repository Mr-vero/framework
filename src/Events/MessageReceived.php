<?php

declare(strict_types=1);

namespace FondBot\Events;

use FondBot\Channels\Chat;
use FondBot\Channels\User;
use FondBot\Contracts\Event;
use FondBot\Templates\Location;
use FondBot\Templates\Attachment;

class MessageReceived implements Event
{
    private $chat;
    private $from;
    private $text;
    private $location;
    private $attachment;
    private $data;

    public function __construct(Chat $chat, User $from, string $text, Location $location = null, Attachment $attachment = null, string $data = null)
    {
        $this->chat = $chat;
        $this->from = $from;
        $this->text = $text;
        $this->location = $location;
        $this->attachment = $attachment;
        $this->data = $data;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getAttachment(): ?Attachment
    {
        return $this->attachment;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function toResponse($request)
    {
        // TODO: Implement toResponse() method.
    }
}
