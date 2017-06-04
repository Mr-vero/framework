<?php

declare(strict_types=1);

namespace FondBot\Queue\Adapters;

use FondBot\Queue\Job;
use FondBot\Queue\Adapter;
use FondBot\Drivers\Command;
use FondBot\Channels\Channel;
use FondBot\Drivers\AbstractDriver;

class SyncAdapter extends Adapter
{
    /**
     * Pull next job from the queue.
     *
     * @return Job
     */
    public function next(): ?Job
    {
        return null;
    }

    /**
     * Push command onto the queue.
     *
     * @param Channel        $channel
     * @param AbstractDriver $driver
     * @param Command        $command
     */
    public function push(Channel $channel, AbstractDriver $driver, Command $command): void
    {
        $driver->handle($command);
    }

    /**
     * Push command onto the queue with a delay.
     *
     * @param Channel        $channel
     * @param AbstractDriver $driver
     * @param Command        $command
     * @param int            $delay
     *
     * @return mixed|void
     */
    public function later(Channel $channel, AbstractDriver $driver, Command $command, int $delay): void
    {
        if ($delay > 0) {
            sleep($delay);
        }

        $this->push($channel, $driver, $command);
    }
}
