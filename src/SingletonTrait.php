<?php

declare(strict_types=1);

namespace PetrKnap\Singleton;

trait SingletonTrait
{
    public static function getInstance(): static
    {
        static $instances;
        $instances ??= [];
        $instances[static::class] ??= new static();
        return $instances[static::class];
    }
}
