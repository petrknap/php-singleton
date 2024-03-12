<?php

declare(strict_types=1);

namespace PetrKnap\Singleton;

use PetrKnap\Shorts\ArrayShorts;

trait SingletonTrait
{
    public static function getInstance(): static
    {
        static $instances;
        $instances = ArrayShorts::keyMap(
            static fn ($instance) => $instance ?? new static(),
            $instances ?? [],
            static::class
        );
        return $instances[static::class];
    }
}
