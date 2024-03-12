<?php

declare(strict_types=1);

namespace PetrKnap\Singleton;

interface SingletonInterface
{
    public static function getInstance(): static;
}
