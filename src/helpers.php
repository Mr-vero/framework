<?php

declare(strict_types=1);

if (!function_exists('env')) {
    /**
     * Get environment variable value.
     *
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? null;

        if ($value === null) {
            return $default;
        }

        switch (mb_strtolower($value)) {
            case 'true':
                return true;
            case 'false':
                return false;
            case 'null':
                return null;
        }

        return $value;
    }
}

if (!function_exists('kernel')) {
    /**
     * Get kernel instance.
     *
     * @return FondBot\Application\Kernel
     */
    function kernel(): FondBot\Application\Kernel
    {
        return FondBot\Application\Kernel::getInstance();
    }
}

if (!function_exists('resolve')) {
    /**
     * Resolve an alias from container.
     *
     * @param string $alias
     * @param array  $args
     *
     * @return mixed
     */
    function resolve(string $alias, array $args = [])
    {
        return kernel()->resolve($alias, $args);
    }
}

if (!function_exists('path')) {
    /**
     * Get path.
     *
     * @param string $postfix
     *
     * @return string
     */
    function path(string $postfix = ''): string
    {
        return resolve('base_path').'/'.$postfix;
    }
}

if (!function_exists('logger')) {
    /**
     * Get logger.
     *
     * @return Monolog\Logger|\Psr\Log\LoggerInterface
     */
    function logger(): Monolog\Logger
    {
        return resolve(Monolog\Logger::class);
    }
}
