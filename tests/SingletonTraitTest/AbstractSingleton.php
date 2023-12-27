<?php declare(strict_types=1);

namespace PetrKnap\Singleton\SingletonTraitTest;

use PetrKnap\Singleton\SingletonInterface;
use PetrKnap\Singleton\SingletonTrait;

/** @internal for testing purposes only - singleton must not be abstract */
abstract class AbstractSingleton implements SingletonInterface
{
    use SingletonTrait;
}
